<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Brochures\BrochureStoreRequest;
use App\Http\Resources\BrochureLargeResource;
use App\Http\Resources\BrochureSmallCollection;
use App\Http\Resources\BrochureSmallResource;
use App\Models\Brochure;
use App\Traits\ApiResponder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BrochureController extends Controller
{
    use ApiResponder;

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

        return $this->respondWithCollection(new BrochureSmallCollection($brochures));
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
        $provider_id = Auth::user()->id;
        $brochure = Brochure::create(array_merge($request->all(), ['provider_id' => $provider_id]));
        storeMedia($image, $brochure->id, 'App\Models\Brochure');

        return $this->respondCreated(new BrochureSmallResource($brochure));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Brochure $brochure)
    {
        return $this->respondWithMessage(new BrochureLargeResource($brochure));
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

        return $this->respondWithCollection(new BrochureSmallCollection($brochures));
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
