<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\BusinessDeals\BusinessDealFilterRequest;
use App\Http\Requests\BusinessDeals\BusinessDealStoreRequest;
use App\Http\Resources\BusinessDealLargeResource;
use App\Http\Resources\BusinessDealCollection;
use App\Http\Resources\BusinessDealTinyResource;
use App\Models\BusinessDeal;
use App\Traits\ApiResponder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BusinessDealController extends Controller
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
        $businessDeals = BusinessDeal::active()->priority()->prioritySorted()->paginate(10);

        return $this->respondWithCollection(new BusinessDealCollection($businessDeals));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BusinessDealStoreRequest $request)
    {
        $image = upload($request->image, 'businessDeals');
        $provider_id = Auth::user()->provider->id;
        $businessDeal = BusinessDeal::create(array_merge($request->all(), ['provider_id' => $provider_id]));
        storeMedia($image, $businessDeal->id, 'App\Models\BusinessDeal');

        return $this->respondCreated(new BusinessDealTinyResource($businessDeal));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(BusinessDeal $businessDeal)
    {
        return $this->respondWithMessage(new BusinessDealLargeResource($businessDeal));
    }

    /**
     * Filter a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filter(BusinessDealFilterRequest $request)
    {
        $input = $request->all();
        if ($request->has('sort_type') && $input['sort_type'] === 'a') {
            $sort_type =  'ASC';
        } else {
            $sort_type =  'DESC';
        }

        $events = BusinessDeal::where('provider_id', $input['user_id'])
            ->where('type', $input['type'])
            ->orderBy("created_at", $sort_type)
            ->paginate(10);

        return $this->respondWithCollection(new BusinessDealCollection($events));
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
