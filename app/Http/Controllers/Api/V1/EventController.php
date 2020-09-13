<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Events\EventFilterRequest;
use App\Http\Requests\Events\EventStoreRequest;
use App\Http\Resources\EventLargeResource;
use App\Http\Resources\EventCollection;
use App\Http\Resources\EventTinyResource;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function __constract()
    {
        // $this->middleware('auth:api')->only('store');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::active()->prioritySorted()->paginate(3);

        return $this->respondWithCollection(new EventCollection($events));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventStoreRequest $request)
    {
        $provider_id = Auth::user()->provider->id;
        $image = upload($request->image, 'events');
        $event = Event::create(array_merge($request->all(), ['provider_id' => $provider_id]));
        storeMedia($image, $event->id, 'App\Models\Event');
        return $this->respondCreated(new EventTinyResource($event));
    }

    /**
     * Filter a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filter(EventFilterRequest $request)
    {
        $input = $request->all();
        $sort_type =  'DESC';
        if ($request->has('sort_type') && $input['sort_type'] === 'a') {
            $sort_type =  'ASC';
        }

        $events = Event::active();
        if ($request->has('user_id')) {
            $events->where('provider_id', $input['user_id']);
        }
        if ($request->has('type')) {
            $events->where('type', $input['type']);
        }

        return  new EventCollection(
            $events->orderBy("created_at", $sort_type)
                ->paginate(10)
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {

        return $this->respondWithItem(new EventLargeResource($event));
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
