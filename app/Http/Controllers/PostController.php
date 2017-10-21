<?php

namespace App\Http\Controllers;

use App\Comment;
use App\like;
use App\Notifications\show_notification;
use App\Rate;
use App\Regular;
use App\User;
use File;
use Image;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function newsfeed()
    {
        $comments = Comment::orderBy('created_at', 'desc')->get();
        $regular = Regular::all();
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        $likes = like::all();
        return view('frontend.layouts.user_login_layout',compact('posts','comments','regular','likes'));
    }

    public function allposts()
    {
        $userid = Auth::user()->id;
        $comments = Comment::orderBy('created_at', 'desc')->get();
        $regular = Regular::all();
        $posts = Post::where('user_id',$userid)->orderBy('created_at', 'desc')->paginate(5);
        $likes = like::all();
        return view('frontend.layouts.yourposts',compact('posts','comments','regular','likes'));
    }

    public function displayPost($post_id)
    {
        $comments = Comment::all();
        $regular = Regular::all();
        $post = Post::where('id',$post_id)->first();
        $likes = like::all();
        return view('frontend.layouts.show_post', compact('post', 'comments', 'regular', 'likes'));

    }


    public function CreatePost(Request $request)
    {
            $this->validate($request, [
                'body' => 'required|max:1000',
                'title' => 'required',
                'path' => 'required'
            ]);


        $post = new Post();
        $post->body = $request['body'];
        $post->title = $request['title'];
        $post->category = $request['category'];

        //save image
        if ($request->hasFile('path')) {
            $image = $request->file('path');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/post/' . $filename);
            Image::make($image)->save($location);

            $post->path = $filename;
        }
        $message = 'Not posted successfully, Try Again!';
        if ($request->user()->posts()->save($post)) {
            $message = 'Post Created Successfully!';

        }
        $posts = Post::all();
        return redirect()->route('news-feed')->with(['message' => $message]);
    }

    public function EditPost(Request $request,$id)
    {
        $post = Post::where('id',$id)->first();
        $post->body = $request['body'];
        $post->category = $request['category'];
        $delete = $request['delete'];
        $match = "yes";

        //save image
        if ($request->hasFile('path')) {
            if ( $delete == $match )
            {
                return "reached";
                $post->path = null;
            }else{
                $image = $request->file('path');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('images/post/' . $filename);
                Image::make($image)->save($location);
                $post->path = $filename;
            }

        }

        $post->update();
        $message = 'Post updated Successfully!';
        return redirect()->route('news-feed')->with(['message' => $message]);
        
    }

    public function getPostDelete($post_id)
    {
        $post = Post::where('id', $post_id)->first();
        if (Auth::user() != $post->user) {
            return redirect()->back();
        }
//        dd($post);
        $post->delete();
        $comments = Comment::where('post_id',$post_id);
        $comments->delete();

        $likes_of_user = like::where('post_id',$post->id);
        $likes_of_user->delete();

        $message = 'post deleted successfully';
        return redirect()->route('news-feed');
    }

    public function search(Request $request)
    {
        $category = $request['category'];
        $comments = Comment::all();
        $likes = like::all();
        if ($category == "All") {
            $posts = Post::orderBy('id','DESC')->paginate(5);
        } else {
            $posts = Post:: where('category', $category)->orderBy('id', 'DESC')->paginate(5);
        }
        return view('frontend.layouts.user_login_layout', compact('posts', 'comments', 'likes'));


    }




    public function like($post_id)
    {
        $user_id = Auth::user()->id;
//        $likes = like::where('post_id',$post_id)->first();
        $likes = like::where(['post_id' => $post_id, 'user_id' => $user_id])->first();

        if ($likes == null) {
            $user_id = Auth::user()->id;
            $likes = new like();
            $likes->user_id = $user_id;
            $likes->post_id = $post_id;
            $likes->like = 1;
            $likes->save();
            $post = Post::where('id', $post_id)->first();
            $post->rate = $post->rate + 10;
            $post->update();

            //notification
            $id = $likes->post_id;
            $getuser = Post::where('id',$id)->first();
            $userid = $getuser->user_id;
            if ($userid != $user_id ){
                $user = User::where('id',$userid)->first();
                $user->notify(new show_notification(null ,$likes));
            }
            return redirect()->route('news-feed');

        } elseif ($likes->like == 0) {
            $likes->like = 1;
            $likes->update();
            $post = Post::where('id', $post_id)->first();
            $count = Like::where('post_id', $post_id)->count();
            $post->rate = $post->rate + ((5 * $count) / $count);
            $post->update();
            return redirect()->route('news-feed');
        } elseif ($likes->like == 1) {
            $likes->like = 1;
            $likes->update();
            $post = Post::where('id', $post_id)->first();
            $count = Like::where('post_id', $post_id)->count();
            $post->rate = $post->rate + ((5 * $count) / $count);
            $post->update();
            return redirect()->route('news-feed');
        }

    }
    
    

    public function dislike($post_id)
    {
        $user_id = Auth::user()->id;
        $dislikes = like::where(['post_id' => $post_id, 'user_id' => $user_id])->first();
        if ($dislikes == null) {
            $user_id = Auth::user()->id;
            $likes = new like();
            $likes->user_id = $user_id;
            $likes->post_id = $post_id;
            $likes->like = 0;
            $likes->save();
            $post = Post::where('id', $post_id)->first();
            $count = Like::where('post_id', $post_id)->count();
            $post->rate = $post->rate - ((5 * $count) / $count);
            $post->update();
            return redirect()->route('news-feed');
        } elseif ($dislikes->like == 1)
            $dislikes->like = 0;
        $dislikes->update();
        $post = Post::where('id', $post_id)->first();
        $count = Like::where('post_id', $post_id)->count();
        $post->rate = $post->rate - ((5 * $count) / $count);
        $post->rate = $post->rate - 10;
        $post->update();
        return redirect()->route('news-feed');

    }

    public function getusersoflike($post_id)
    {
     $likes = Like ::where('post_id',$post_id)->get();
        return view('frontend.layouts.likes',compact('likes'));
    }

}