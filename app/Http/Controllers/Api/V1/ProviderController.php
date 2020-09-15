<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Provider\FilterProviderRequest;
use App\Http\Requests\Provider\StoreProviderRequest;
use App\Http\Requests\Provider\UpdateProviderRequest;
use App\Http\Resources\ProviderCollection;
use App\Http\Resources\ProviderLargeResource;
use App\Http\Resources\ProviderTinyResource;
use App\Models\Ads;
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
        $Ad = Ads::Location('upNewsReports')->first();
        return $this->respondWithItem([
            'provider' => new ProviderLargeResource(Auth::user()->provider),
            'Ad' => $Ad
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProviderRequest $request)
    {

        $user = Auth::user();

        if ($user->provider != null) return $this->errorForbidden();
        // dd($request->all());

        $user->update(['type' => 'provider']);

        $provider = Provider::create(array_merge($request->all(),['user_id' => $user->id]) );
        $provider->categories()->attach($request->categories_ids);
        $provider->countries()->attach($request->countries_ids);

        if($request->logo){
            $logo = upload($request->logo, 'providers');
            $provider->update(['logo' => $logo]);
        }
         if($request->video){
            $video = upload($request->video, 'providers');
            $provider->update(['video' => $video]);
        }

        return $this->respondWithItem(new ProviderLargeResource($provider), 'provider created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Provider $provider)
    {
        $Ad = Ads::Location('upNewsReports')->first();

        return $this->respondWithItem(['provider' => new ProviderLargeResource($provider), 'Ad' => $Ad]);

    }

    /**
     * Filter a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filter(FilterProviderRequest $request)
    {
        $sort_type = 'DESC';
        if ($request->has('sort_type') && $request['sort_type'] == 'a') {
            $sort_type = 'ASC';
        }

        $providers = Provider::Active();
        if ($request->has('categories')) {
            $providers->where('type', $request['type']);
        }
        if ($request->has('countries')) {
            $providers->where('country', $request['country']);
        }
        $Ad = Ads::Location('upNewsReports')->first();

        return  [
            'providers' => new ProviderCollection(
                $providers->orderBy("created_at", $sort_type)->paginate(10)
            ),
            'Ad' => $Ad
        ];

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

        $provider->update($request->all());
        $provider->user->update(array_merge($request->except('type'), ['password' => Hash::make($request->password)]));

        return $this->respondWithItem(new ProviderLargeResource($provider), 'provider Updated');
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
