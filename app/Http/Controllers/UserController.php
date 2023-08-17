<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User ;
use App\Profile;
use App\Post;
use App\Tag;
use Auth;
use App\Comment;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct()
        {
            $this->middleware('auth');
        }
    public function index()
        {
            $users= User::all();
            if (Auth::user()->level != 1)
                {
                    return redirect()->back();
                }
            return view('users.index')->with('users',$users);
        }
    public function dashboard()
        {
            if (Auth::user()->level != 1)
             {
                return redirect()->back();
            }
            $users= User::all();
            $tags= Tag::all();
            $posts= Post::all();
            $profiles= Profile::all();
            $comments=Comment::all();
            $trasheds = Post::onlyTrashed()->get();
            return view('users.dashboard')->with('users',$users)->with('tags',$tags)->with('posts',$posts)->with('comments',$comments)->with('profiles',$profiles)->with('trasheds',$trasheds);
        }
    public function store(Request $request)
        {
            $this->validate($request,[
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
            $user= User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            $profile=Profile::create([
                'country'=>'Syria',
                'level'=>1,
                'user_id'	=>$user->id,
                'gender'	=>'Male',
                'bio'	=>'hi !! I am new in this blog',
                'facebook'	=>'https://www.facebook.com',
                'phone' =>'+963',
                'photo'=>'uploads/home/2.jpg'
            ]);
            return redirect()->back();
        }
    public function admin_user(Request $request, $id)
        {
            $this->validate($request, [
                'level'=>'required'
            ]);
            $user = User::where('id', $id )->first();
            $user->level = $request->level;
            $user->save();
            return redirect()->back();
        }
    public function show( $id)
        {
            $tags=Tag::all();
            $posts=Post::where('user_id', $id )->latest()->paginate(3);
            $user = User::where('id', $id )->first();
            return view('users.show')->with('user', $user )->with('posts', $posts )->with('tags', $tags );
        }
    public function destroy($id)
        {
            $user=User::find($id);
            $user->profile->delete($id);
            $user->delete($id);
            return redirect()->back();
        }
}
