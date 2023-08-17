<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct()
        {
            $this->middleware('auth');
        }
    public function index()
        {
            $tags= Tag::orderBy('updated_at' , 'desc')->get();
            return view('tags.index')->with('tags',$tags);
        }
    public function store(Request $request)
        {
            $this->validate($request,['tag' => 'required']);
            $tag= $request->tag;
            $tag = Tag::create([ 'tag' => $request->tag ]);
            return redirect()->back();
        }
    public function update(Request $request, $id)
        {
            $tag=Tag::find($id);
            $this->validate($request,['tag' => 'required']);
            $tag->tag=$request->tag;
            $tag->save();
            return redirect()->back();
        }
    public function destroy($id)
        {
            $tag=Tag::find($id);
            $tag->destroy($id);
            return redirect()->back();
        }
}
