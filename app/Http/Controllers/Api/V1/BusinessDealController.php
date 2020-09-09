<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\BusinessDealSmallCollection;
use App\Http\Resources\BusinessDealSmallResource;
use App\Models\BusinessDeal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BusinessDealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $businessDeals = BusinessDeal::active()->priority()->prioritySorted()->paginate(10);

        return new BusinessDealSmallCollection($businessDeals);
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
        $businessDeal = BusinessDeal::create(array_merge($request->all(), ['provider_id' => $request->provider_id]));
        return new BusinessDealSmallResource($businessDeal);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(BusinessDeal $businessDeal)
    {
        return new BusinessDealSmallResource($businessDeal);

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

        $events = BusinessDeal::where('provider_id', $input['user_id'])
        ->where('type', $input['type_business_deal'])
        ->orderBy("created_at", $input['sort_type'])->paginate(3);

        return new BusinessDealSmallCollection($events);
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
