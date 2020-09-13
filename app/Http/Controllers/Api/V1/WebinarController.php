<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Webinars\WebinarFilterRequest;
use App\Http\Requests\Webinars\WebinarStoreRequest;
use App\Http\Resources\WebinarCollection;
use App\Http\Resources\WebinarLargeResource;
use App\Http\Resources\WebinarTinyResource;
use App\Models\Webinar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebinarController extends Controller
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
    public function store(WebinarStoreRequest $request)
    {
        $provider_id = Auth::user()->provider->id;
        $logo = upload($request->logo, 'webinars');
        $webinar = Webinar::create(array_merge($request->all(), ['provider_id' => $provider_id, 'logo' => $logo]));

        return $this->respondCreated(new WebinarTinyResource($webinar));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Webinar $webinar)
    {
        return $this->respondWithItem(new WebinarLargeResource($webinar));

    }

    /**
     * Filter a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filter(WebinarFilterRequest $request)
    {
        $sort_type = 'DESC';
        if ($request->has('sort_type') && $request['sort_type'] == 'a') {
            $sort_type = 'ASC';
        }

        $webinars = Webinar::orderBy("created_at", $sort_type);
        if ($request->has('date')) {
            $webinars->where('date', $request['date']);
        }
        if ($request->has('type')) {
            $webinars->where('type', $request['type']);
        }
        if ($request->has('country')) {
            $webinars->where('country', $request['country']);
        }

        return  new WebinarCollection(
            $webinars->paginate(10)
        );
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
