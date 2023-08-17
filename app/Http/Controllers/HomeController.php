<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth ;
use App\Profile;
use App\Post;
use App\User;
use App\Tag;
use App\Comment;

class HomeController extends Controller
{
    public function index()
    {
        $user=Auth::user();
        $id=Auth::id();
        if ($user->profile == null)
            {
                $profile=Profile::create([
                    'country'=>'Syria',
                    'user_id'	=>$id,
                    'gender'	=>'Male',
                    'bio'	=>'hi !! I am new in this BLOGTEST',
                    'facebook'	=>'https://www.facebook.com',
                    'phone' =>'+963',
                    'photo'=>'uploads/home/2.jpg'
                ]);
            }
        return redirect()->route('welcome');
    }
    public function welcome()
    {
        $users=User::all();
        $post=Post::orderBy('updated_at' , 'desc' )->limit(3) ->get();
        $posts=Post::all();
        $tags=Tag::all();
        $Comments=Comment::all();
        return view('welcome')->with('users',$users)->with('posts',$posts)->with('Comments',$Comments)->with('post',$post)->with('tags',$tags);
    }
}
