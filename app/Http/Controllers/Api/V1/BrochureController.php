<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\BrochureLargeResource;
use App\Http\Resources\BrochureSmallCollection;
use App\Http\Resources\BrochureSmallResource;
use App\Models\Brochure;
use Illuminate\Http\Request;

class BrochureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brochures = Brochure::active()->priority()->prioritySorted()->paginate(10);

        return new BrochureSmallCollection($brochures);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $provider_id =  Auth::user()->provider->id;
        $brochure = Brochure::create(array_merge($request->all(), ['provider_id' => $request->provider_id]));
        return new BrochureSmallResource($brochure);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Brochure $brochure)
    {
        return new BrochureLargeResource($brochure);
    }

    /**
     * Filter a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        $input = $request->all();
        if ($input['sort_type'] === 'a') {
            $input['sort_type'] =  'ASC';
        } else {
            $input['sort_type'] =  'DESC';
        }

        // $provider_id =  Auth::user()->provider->id;

        $brochures = Brochure::where('provider_id', $input['user_id'])
            ->orderBy("created_at", $input['sort_type'])->paginate(10);

        return new BrochureSmallCollection($brochures);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
