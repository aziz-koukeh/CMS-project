<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
        {
            $this->validate($request,[
                'description' => 'required',
            ]);
            $input= $request->all();
            $input['user_id'] =auth()->user()->id;
            Comment::create( $input);
            return  redirect()->back();
        }

    public function destroy($id)
        {
            $comment1=Comment::where('id',$id)->first();
            $comment1->Delete();
            $comment2=Comment::where('parent_id',$id)->first();
            $comment2->Delete();
            return redirect()->back();
        }
}
