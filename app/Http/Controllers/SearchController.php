<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Tag;

class SearchController extends Controller
{
    public function __construct()
        {
            $this->middleware('auth');
        }
    public function search(Request $request)
        {
            $keyword = $request->input('keyword');
            // قم بتنفيذ عملية البحث واسترجاع النتائج
            $tags=Tag::all();
            $results=Post::where('title','LIKE','%'.$keyword.'%')->get();
            $results2=Post::where('content','LIKE','%'.$keyword.'%')->get();
            $results3=User::where('name','LIKE','%'.$keyword.'%')->get();
            if ($results3)
            {
                return view('search_results', [ 'resultsPostT' => $results ,'resultsPostC' => $results2,'resultsUser' => $results3])->with('tags',$tags);
            }
        }
}
