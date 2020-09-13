<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Brochures\BrochureFilterRequest;
use App\Http\Requests\Brochures\BrochureStoreRequest;
use App\Http\Resources\BrochureLargeResource;
use App\Http\Resources\BrochureCollection;
use App\Models\Brochure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BrochureController extends Controller
{

    public function __constract()
    {
        $this->middleware('auth:api')->only(['store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brochures = Brochure::active()->priority()->prioritySorted()->paginate(10);

        return $this->respondWithCollection(new BrochureCollection($brochures));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrochureStoreRequest $request)
    {
        $image = upload($request->image, 'brochures');
        $provider_id = Auth::user()->provider->id;
        $brochure = Brochure::create(array_merge($request->all(), ['provider_id' => $provider_id]));
        storeMedia($image, $brochure->id, 'App\Models\Brochure');

        return $this->respondCreated(new BrochureLargeResource($brochure));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Brochure $brochure)
    {
        return $this->respondWithItem(new BrochureLargeResource($brochure));
    }

    /**
     * Filter a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filter(BrochureFilterRequest $request)
    {
        $input = $request->all();
        $sort_type =  'DESC';
        if ($request->has('sort_type') && $input['sort_type'] === 'a') {
            $sort_type =  'ASC';
        }

        $brochures = Brochure::active();
        if ($request->has('user_id')) {
            $brochures->where('provider_id', $input['user_id']);
        }

        return  new BrochureCollection(
            $brochures->orderBy("created_at", $sort_type)
                ->paginate(10)
        );

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
