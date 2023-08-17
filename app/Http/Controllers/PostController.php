<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use App\Comment;

use Illuminate\Http\Request;
use Auth;

class PostController extends Controller
{
    public function __construct() 
        {
            $this->middleware('auth');
        }
    public function index()
        {
            $tags = Tag::all()  ;
            $comments = Comment::all()  ;
            $user=Auth::user();
            $posts = Post::latest()->paginate(3);
            return view('posts.index')->with('posts',$posts)->with('user',$user)->with('tags', $tags )->with('comments', $comments ) ;
        }
    public function trashed()
        {
            $tags = Tag::all()  ;
            $user=Auth::user();
            $posts = Post::onlyTrashed()->where('user_id', Auth::id())->latest()->paginate(3);
            if ($posts === null )
            {
                return redirect()->back();
            }
            return view('posts.trashed')->with('posts',$posts)->with('tags', $tags );
        }
    public function create()
        {
            $tags = Tag::all()  ;
                if ( $tags->count() ==  0 ) {
                    return    redirect()->route('tags.create');
                }
                return view('posts.create')->with('tags', $tags ) ;
        }
    public function store(Request $request)
        {
            $this->validate($request,[
                'title' => 'required',
                'content'=> 'required',
                'photo'=> 'required|image', 
                'tag'=> 'required'
            ]);
            $photo= $request->photo;
            $newPhoto ='IMG_320_'.time().'.jpg';
            $photo->move('uploads/posts', $newPhoto);
            $post = Post::create([
                'user_id' => Auth::id(), 
                'title' => $request->title ,
                'content'=> $request->content ,
                'photo'=> 'uploads/posts/'.$newPhoto,
                'slug'=> str_slug($request->title)
            ]);
            $post->tag()->attach($request->tag);
            $tags = Tag::all()  ;
            $posts = Post::orderBy('updated_at' , 'desc')->get();
            return redirect('posts')->with('posts',$posts)->with('tags',$tags);
        }
    public function show( $slug)
        {
            $tags = Tag::all()  ;
            $post = Post::where('slug', $slug )->first(); // كلمة فيرست اي أحضر الأول
            return view('posts.show')->with('post', $post  )->with('tags', $tags);
        }
    public function edit( $id)
        {
            $tags = Tag::all()  ;
            $user=Auth::user();
            $post = Post::where('id', $id )->where('user_id', Auth::id())->first();
                if ($post === null )
                {
                    return redirect()->back();
                }
            return view('posts.edit')->with('post', $post)->with('user',$user)->with('tags',$tags);
        }
    public function update(Request $request,  $id)
        {
            $post = Post::find( $id );
            $this->validate( $request ,[
                'title'=>'required',
                'content'=>'required',
                'tag'=>'required',
            ]);
            if ($request->has('photo'))
                {
                    $photo = $request->photo;
                    $newphoto ='IMG_320_'.time().'.jpg';
                    $photo->move('uploads/posts',$newphoto);
                    $post ->photo= 'uploads/posts/'.$newphoto ;
                }
            $post->title=$request->title;
            $post->slug=str_slug($request->title);
            $post->content=$request->content;
            $post->save();
            $post->tag()->sync($request->tag); 
            return redirect()->back();
        }
    public function destroy( $id)
        {
            $post = Post::onlyTrashed()-> where('id',$id )->first();
            if ($post === null )
                {
                    return redirect()->back();
                }
            $post->forceDelete();
            return redirect()->back();
        }
    public function restore( $id)
        {
            $post = Post::onlyTrashed()-> where('id',$id )->first();
            $post->restore();
            return redirect()->back();
        }
    public function softDeletes( $id)
        {
            $post = Post::find( $id );
            $post->delete($id);
            return redirect()->back();
        }
}
