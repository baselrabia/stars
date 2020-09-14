<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\WishLists\StoreWishListRequest;
use App\Http\Resources\WishListCollection;
use App\Http\Resources\WishListResource;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new WishListCollection(
            Auth::user()->wishlist
        );
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWishlistRequest $request)
    {
        $user = Auth::user();
        $wishlists = $user->wishlist->pluck('product_id')->toArray();

        if (in_array($request->product_id, $wishlists)) {
            $wishlist = Wishlist::where('user_id', $user->id)->where('product_id', $request->product_id)->first();
        } else {
            $wishlist = Wishlist::create(array_merge($request->all(), ['user_id' => $user->id,]));
        }

        return $this->respondCreated(new WishlistResource($wishlist));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Wishlist $wishlist)
    {
        return new WishlistResource($wishlist);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $wishList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Wishlist $wishList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $wishList
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wishlist $wishlist)
    {
        $wishlist->delete();
        return $this->respondWithMessage("wishList item Deleted");
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyAll()
    {
        $wishlistIds = Auth::user()->wishlist->pluck('id')->toArray();
        foreach ($wishlistIds as $id) {
            Wishlist::whereId($id)->first()->delete();
        }
        return $this->respondWithMessage("Wishlist Deleted");
    }
}
