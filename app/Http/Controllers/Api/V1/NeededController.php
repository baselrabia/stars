<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Neededs\NeededFilterRequest;
use App\Http\Requests\Neededs\NeededStoreRequest;
use App\Http\Resources\NeededCollection;
use App\Http\Resources\NeededLargeResource;
use App\Http\Resources\NeededTinyResource;
use App\Models\Needed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NeededController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $types = ['distributers', 'brokers', 'agents'];

        if (!in_array($request->type, $types) ){
            return $this->errorNotFound();
        }

        $neededs = Needed::where('type', $request->type)->active()->prioritySorted()->paginate(10);

        return new NeededCollection($neededs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NeededStoreRequest $request)
    {
        $image = upload($request->image, 'neededs');

        $provider_id = Auth::user()->provider->id;
        $needed = Needed::create(array_merge($request->all(), ['provider_id' => $provider_id, 'image' => $image]));

        return $this->respondCreated(new NeededTinyResource($needed));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Needed $needed)
    {
        return $this->respondWithItem(new NeededLargeResource($needed));
    }

    /**
     * Filter a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filter(NeededFilterRequest $request)
    {
        $input = $request->all();
        if ($request->has('sort_type') && $input['sort_type'] === 'a') {
            $sort_type =  'ASC';
        } else {
            $sort_type =  'DESC';
        }

        $neededs = Needed::active();
        if ($request->has('user_id')){
            $neededs->where('provider_id', $input['user_id']);
        }
        if ($request->has('type')) {
            $neededs->where('type', $input['type']);
        }


        return  new NeededCollection(
            $neededs->orderBy("created_at", $sort_type)
            ->paginate(10)
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
