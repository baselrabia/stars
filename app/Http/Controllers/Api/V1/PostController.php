<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Posts\LikeDislikePostRequest;
use App\Http\Requests\Posts\StoreCommentRequest;
use App\Http\Requests\Posts\StorePostRequest;
use App\Http\Resources\CommentResource;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Posts = Post::OrderBy('created_at','DESC')->paginate(10);

        return new PostCollection($Posts);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        if(!Auth::user())return $this->errorUnauthorized();

        $user_id = Auth::user()->id;
        $image = upload($request->image, 'posts');
        $post = Post::create(array_merge($request->all(), ['user_id' => $user_id,'image' => $image]));

        return $this->respondCreated(new PostResource($post));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return $this->respondWithItem(new PostResource($post));
    }


    /**
     * LikeDislike the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function LikeDislike(LikeDislikePostRequest $request)
    {
        if (!Auth::user()) return $this->errorUnauthorized();
        
        $user = Auth::user();
        $post = Post::find($request->post_id);
        $userLikes = $user->likes->pluck('post_id')->toArray();

        if(in_array($post->id, $userLikes)){
            $like = Like::where('user_id', $user->id)->where('post_id', $post->id)->first();
            if($like->like == '0'){
                $like->update(['like'=> 1]);
                $post->like++;
            }else {
                $like->update(['like' => 0]);
                $post->like--;
            }
            $post->save();
        }else{
            Like::create([
                'user_id'=>$user->id,
                'post_id' => $post->id,
                'like'=> 1
            ]);
            $post->like++;
            $post->save();
        }

        return $this->respondWithMessage('Status change successfully.');
    }


    public function storeComment(StoreCommentRequest $request)
    {
        if (!Auth::user()) return $this->errorUnauthorized();

        $user_id = Auth::user()->id;
        $image = null;
        if($request->image){
            $image = upload($request->image, 'posts/comments');
        }
        $Comment = Comment::create(array_merge($request->all(), ['user_id' => $user_id, 'image' => $image]));

        return $this->respondCreated(new CommentResource($Comment));
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
