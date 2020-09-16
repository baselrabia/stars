<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\BidManagements\StoreBidManagementRequest;
use App\Http\Resources\BidManagementCollection;
use App\Http\Resources\BidManagementLargeResource;
use App\Http\Resources\QuotationCollection;
use App\Models\BidManagement;
use App\Models\Quotation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BidManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!(Auth::user())) return $this->errorUnauthorized();
        if (Auth::user()->provider == null) return $this->errorForbidden();

        $types = ['quotation', 'price', 'sample'];
        $type = $types[1];
        if (in_array(request()->type, $types)) {
            $type = request()->type;
        }

        $quotations = Auth::user()->provider->quotations->where('type', $type)->all();

        return new QuotationCollection($quotations);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBidManagementRequest $request)
    {
        if (!(Auth::user())) return $this->errorUnauthorized();
        if (Auth::user()->provider == null) return $this->errorForbidden();

        if (count(Auth::user()->provider->quotations) == 0) return $this->errorForbidden();
        $provider_id = Auth::user()->provider->id;

        $quotation = Quotation::whereId($request->quotation_id)->first();

        $bidmanagement = BidManagement::create([
            'provider_id' => $provider_id,
            'type' => $request->type,
            'quotation_id' => $request->quotation_id,
            'status' => $request->status,
            'payment_term' => $request->payment_term ?? $quotation->payment_term,
            'delivery_term' => $request->delivery_term ?? $quotation->delivery_term,
            'delivery_date' => $request->delivery_date ?? $quotation->delivery_date,
            'delivery_location' => $request->delivery_location ?? $quotation->delivery_location,
            'note' => $request->note ?? null,
            ]);

        $products = $quotation->products->pluck('id')->toArray();
        //Attach  Quantity - Product
        $bidmanagement->products()->attach($products);


        // after insert product id update row and insert quantities values
        foreach ($quotation->products as $key =>  $product) {
            $bidmanagement->products()->updateExistingPivot($product->id, [
                'quantities'   => $request['quantities'][$key] ?? $product->pivot->quantities,
                'price'   => $request['price_per_item'][$key] ?? $product->price_per_item,
            ]);
        }

        // ##
        // // Send Email To the Providers Which Chosen In Quotation
        // ##

        return $this->respondCreated(new BidManagementLargeResource($bidmanagement));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(BidManagement $bidmanagement)
    {
        return $this->respondWithItem(new BidManagementLargeResource($bidmanagement));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function compare()
    {
        if (!(Auth::user())) return $this->errorUnauthorized();
        if (Auth::user()->provider == null) return $this->errorForbidden();
        if (count(Auth::user()->provider->quotation) == 0) return $this->errorForbidden();

        $bidManagements = Auth::user()->provider->quotation;
        $bidcollection = $bidManagements->first()->BidManagement;

        $arrayOfBidIds = $bidManagements->pluck('id')->toArray();
        if(in_array(request('quotation_id'), $arrayOfBidIds)){
            $bidcollection = $bidManagements->where('id', request('quotation_id'))->first()->BidManagement;
        }

        return new BidManagementCollection($bidcollection);
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
