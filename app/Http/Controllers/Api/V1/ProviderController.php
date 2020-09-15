<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Provider\UpdateProviderRequest;
use App\Http\Resources\ProviderTinyResource;
use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::user()->provider) return $this->errorUnauthorized();

        return $this->respondWithItem(
            new ProviderTinyResource(Auth::user()->provider)
        );
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
    public function show(Provider $provider)
    {
        return $this->respondWithItem(new ProviderTinyResource($provider));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProviderRequest $request, Provider $provider)
    {
        if ($provider->id == null) {
            $provider = Auth::user()->provider;
        }

        $provider->update(array_merge($request->all(), ['password' => Hash::make($request->password)]));
        $provider->user->update(array_merge($request->all(), ['password' => Hash::make($request->password)]));

        return $this->respondWithItem(new ProviderTinyResource($provider), 'provider Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provider $provider)
    {
        $provider->delete();
        return $this->respondWithMessage("item Deleted");
    }
}
