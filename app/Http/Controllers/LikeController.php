<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;

class LikeController extends Controller
{

    public function like(Request $request)
    {

        $like_s = $request->like_s;
        $post_id = $request->post_id;

        $like = DB::table('likes')->
        where('post_id', $post_id)->
        where('user_id', Auth::user()->id)->
        first();

        if (!$like) {

            $new_like = new like;
            $new_like->post_id = $post_id;
            $new_like->user_id = Auth::user()->id;
            $new_like->like = 1;
            $new_like->save();
            $is_like=1;

        } elseif ($like->like == 1) {

            DB::table('likes')->
            where('post_id', $post_id)->
            where('user_id', Auth::user()->id)->
            delete();
            $is_like=0;

        } elseif ($like->like == 0) {

            DB::table('likes')
                ->where('post_id', $post_id)
                ->where('user_id', Auth::user()->id)
                ->update(['like'=>1]);
            $is_like=1;
        }

        $respone =array(

            'is_like' => $is_like,
        );

        return response()->json($respone,200);

      //  return view('posts.show',compact($post));
      //  return view('posts.like');
    }
    //
}
