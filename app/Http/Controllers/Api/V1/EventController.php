<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Events\EventStoreRequest;
use App\Http\Resources\EventLargeResource;
use App\Http\Resources\EventSmallCollection;
use App\Http\Resources\EventSmallResource;
use App\Models\Event;
use App\Traits\ApiResponder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    use ApiResponder;

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

        return $this->respondWithCollection(new EventSmallCollection($events));
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
            $event = Event::create( array_merge($request->all(),['provider_id' => $provider_id] ) );
            storeMedia($image , $event->id ,'App\Models\Event');
            return $this->respondCreated(new EventSmallResource($event));
    }

    /**
     * Filter a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        $input = $request->all();
        if($input['sort_type'] === 'a'){
            $input['sort_type']=  'ASC';
        }else{
            $input['sort_type'] =  'DESC';
        }

        // $provider_id =  Auth::user()->provider->id;

        $events = Event::where('provider_id', $input['user_id'] )
                        ->where('type', $input['event_type'] )
                        ->orderBy("created_at", $input['sort_type'])->paginate(3);

        return $this->respondWithCollection(new EventSmallCollection($events));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {

        return $this->respondWithMessage(new EventLargeResource($event));

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
