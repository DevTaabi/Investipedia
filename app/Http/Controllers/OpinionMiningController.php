<?php

namespace App\Http\Controllers;

use App\Notifications\show_notification;
use Illuminate\Http\Request;
use App\Comment;
use App\like;
use App\Rate;
use App\User;
use App\Regular;
use File;
use Image;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class OpinionMiningController extends Controller
{
    public function Opinionmining($cmnt)
    {
        $parse = explode(' ',$cmnt);
        $parse = array_unique($parse);
        $keyword = Rate::whereIn('keyword',$parse)->first();
        if($keyword != null){
            $value =  $keyword->weight;
        }else {
            $value = 0;
        }
        switch ($value)
        {
            case 0:{
                $rate = 0;
                break;
            }
            case 1:{
                $rate = 60;
                break;
            }
            case 2:{
                $rate = 70;
                break;
            }
            case 3:{
                $rate = 80;
                break;
            }
            case 4:{
                $rate = 90;
                break;
            }
            case 5:{
                $rate = 100;
                break;
            }
            case -1:{
                $rate = 50;
                break;
            }
            case -2:{
                $rate = 40;
                break;
            }
            case -3:{
                $rate = 30;
                break;
            }
            case -4:{
                $rate = 20;
                break;}
            case -5:{
                $rate = 10;
                break;
            }
        }
        return $rate;


    }
    public function Addcomment(Request $request,$post_id)
    {
        $this->validate($request, [
            'comment' => 'required',
        ]);

        $user_id = Auth::user()->id;
        $comment = new Comment();
        $comment->comment = $request['comment'];
        $comment->user_id = $user_id;
        $comment->post_id = $post_id;

        $post_userid = Post::where('id',$post_id)->first();
        $id = $post_userid['user_id'];

        if($user_id == $id)
        {
            $comment->commment_rate = 0;
            $comment->save();
            $message = "You are the owner of the post , Your comment will not consider in opinion mining";
            return redirect()->route('news-feed')->with('message',$message);

        }else{
            $cmnt = $request['comment'];
            $rate = $this->Opinionmining($cmnt);
            if($rate == 0)
            {
                $message = "Invalid comment ! Try Again with sentiments";
                return redirect()->route('news-feed')->with('message',$message);
            }

            $post = Post::where('id',$post_id)->first();
            $comment->commment_rate = $rate;
            $comment->save();

            $whereData = [
                ['post_id', $post_id],
                ['user_id', '<>', $id]
            ];
            $comments_avg = Comment::where($whereData)->avg('commment_rate');
            $post->rate = $comments_avg;
            $post->update();

        }




        $id = $comment->post_id;
        $getuser = Post::where('id',$id)->first();
        $userid = $getuser->user_id;
        if ($userid != $user_id ){
            $user = User::where('id',$userid)->first();
            $user->notify(new show_notification($comment, null));
        }
        return redirect()->route('news-feed');

    }

    public function Editcomment(Request $request,$comment_id)
    {
       $comment = Comment::where('id',$comment_id)->first();
        $comment->comment = $request->comment;
        $post_id = $comment['post_id'];

        $cmnt = $request['comment'];
        $rate = $this->Opinionmining($cmnt);

        $post = Post::where('id',$post_id)->first();
        $comment->commment_rate = $rate;
        $comment->update();

        $comments_avg = Comment::where('post_id',$post->id)->avg('commment_rate');
        $post->rate = $comments_avg;
        $post->update();

        return redirect()->route('news-feed');


    }
    public function getcommentDelete($comment_id)
    {
        $comment = Comment::where('id', $comment_id)->first();
        $comment->delete();
        $message = 'comment deleted successfully';
        return redirect()->route('news-feed');

    }
}
