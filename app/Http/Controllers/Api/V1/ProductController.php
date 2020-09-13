<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompareProductCollection;
use App\Http\Resources\CompareProductResource;
use App\Http\Resources\ProductCollection;
use App\Models\Product;
use App\Traits\ApiResponder;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use ApiResponder;

    public function compare(Request $request)
    {
        if(!$request->has('product')) return $this->errorNotFound();

        $productArray = $request->all()['product'];
        foreach ($productArray as $id) {
            $product = Product::where('id', $id)->first();
            if (!$product) {
                return $this->errorNotFound();
            }
            $products[] = $product;
        }

        return new CompareProductCollection($products);
    }


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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
