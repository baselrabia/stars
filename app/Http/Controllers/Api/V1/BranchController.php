<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Branches\StoreBranchRequest;
use App\Http\Resources\BranchResource;
use App\Models\Branche;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BranchController extends Controller
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
    public function store(StoreBranchRequest $request)
    {
        if (!Auth::user()) return $this->errorForbidden();
        if (!Auth::user()->provider) return $this->errorUnauthorized();
        $provider = Auth::user()->provider;

        $branche = Branche::create(array_merge($request->all(), ['provider_id' => $provider->id]));
        return $this->respondCreated(new BranchResource($branche));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Branche $branch)
    {
        return $this->respondWithItem(new BranchResource($branch));

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
    public function destroy(Branche $branch)
    {
        $branch->delete();
        return $this->respondWithMessage("item Deleted");
    }
}
