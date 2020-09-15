<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Carts\StoreCartRequest;
use App\Http\Resources\CartCollection;
use App\Http\Resources\CartTinyResource;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::user()){
            return 123;
        }

        return new CartCollection(
            Auth::user()->provider->carts
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCartRequest $request)
    {
        $provider = Auth::user()->provider;
        $carts = $provider->carts->pluck('product_id')->toArray();

        if (in_array($request->product_id, $carts)) {
            $cart = cart::where('provider_id', $provider->id)->where('product_id', $request->product_id)->first();
            if ($request->has('quantity')) {
                $cart->update(['quantity' =>$cart->quantity + $request->quantity]);
            } else {
                $cart->update(['quantity' => $cart->quantity + 1]);
            }
            $cart->save();
        } else {
            $cart = Cart::create(array_merge($request->all(), ['provider_id' => $provider->id,]));
        }

        return $this->respondCreated(new CartTinyResource($cart));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        return $this->respondWithItem(new CartTinyResource($cart));
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
    public function destroy(Cart $cart)
    {
        $cart->delete();
        return $this->respondWithMessage("item Deleted");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyAll()
    {
        $cartIds = Auth::user()->provider->carts->pluck('id')->toArray();
        foreach ($cartIds as $id ) {
           Cart::whereId($id)->first()->delete();
        }
        return $this->respondWithMessage("cart Deleted");
    }

}
