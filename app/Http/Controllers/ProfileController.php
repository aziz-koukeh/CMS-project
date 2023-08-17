<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth ;
use App\User ;
use App\Profile;
use App\Post;
use App\Tag;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct() 
        {
            $this->middleware('auth');
        }
    public function index()
        {
            $user=Auth::user();
            return view('users.profile')->with('user',$user);
        }
    public function update(Request $request ,$id)
        {
            $this->validate($request, [
                'name'=>'required',
                'email'=>'required',
                'country'=>'required',
                'bio'=>'required',
                'gender'=>'required',
                'phone'=>'required',
                'facebook'=>'required'
            ]);
            $user=User::find($id);
            if ($request->name != null) 
                {
                    $user->name = $request->name;
                }
            if ($request->email != null)
                {
                    $user->email = $request->email;
                }
            $user->profile->country = $request->country;
            $user->profile->bio = $request->bio;
            $user->profile->gender = $request->gender;
            $user->profile->phone = $request->phone;
            $user->profile->facebook = $request->facebook;
            if ($request->password != null) 
                {
                    $user->password = Hash::make($request->password);
                }
            if ($request->has('photo')) 
                {
                    $photo = $request->photo;
                    $newphoto ='IMG_320_Prf'.time().'.jpg';
                    $photo->move('uploads/profiles',$newphoto);
                    $user->profile ->photo= 'uploads/profiles/'.$newphoto ;
                }
            $user->save();
            $user->profile->save();
            $tags=Tag::all();
            $posts=Post::where('user_id', $user->id )->latest()->paginate(3);
            $user = User::where('id', $user->id )->first();
            return redirect()->back();
        }

}
