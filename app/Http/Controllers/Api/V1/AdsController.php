<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ads\AdStoreRequest;
use App\Http\Resources\AdsResource;
use App\Models\Ads;
use App\Traits\ApiResponder;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    use ApiResponder;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Ads::paginate(10);

        return $this->respondCreated(new AdsResource($ads));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdStoreRequest $request)
    {
        $image = upload($request->image, 'ads');
        $ad = Ads::create($request->all());
        storeMedia($image, $ad->id, 'App\Models\Ads');

        return $this->respondCreated(new AdsResource($ad));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ads $ad)
    {
        return $this->respondCreated(new AdsResource($ad));

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
