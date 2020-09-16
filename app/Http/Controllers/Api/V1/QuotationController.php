<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Quotation\StoreQuotationRequest;
use App\Http\Resources\QuotationLargeResource;
use App\Models\Quotation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuotationRequest $request)
    {
        if (!(Auth::user())) return $this->errorUnauthorized();
        if (Auth::user()->provider == null) return $this->errorForbidden();
        $provider_id = Auth::user()->provider->id;


        $quotation = Quotation::create(array_merge($request->all(), ['provider_id' => $provider_id]));
        if ($request->attachment) {
            $attachment = upload($request->attachment, 'quotations');
            $quotation->update(['attachment' => $attachment]);
        }

        //    Attach     providers ['providers','products']
        $quotation->providers()->attach($request->providers_ids);

        //Attach  Quantity - Product
        $quotation->products()->attach($request->products_ids);

        // after insert product id update row and insert quantities values
        foreach ($quotation->products as $key =>  $product) {
            $quotation->products()->updateExistingPivot($product->id, [
                'quantities'   => $request['quantities'][$key],
            ]);
        }

        ##
            // Send Email To the Providers Which Chosen In Quotation
        ##

        return $this->respondCreated(new QuotationLargeResource($quotation));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Quotation $quotation)
    {
        return $this->respondWithItem(new QuotationLargeResource($quotation));
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
