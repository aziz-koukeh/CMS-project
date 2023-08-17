@extends('layouts.app')

    @section('content')
        <h1 class="text-center text-light  wow fadeInUp btn-theme ">Show Room</h1><br>
        <div class="container">
            <div class=" wow fadeInUp">
                <div class="card" >
                    <a href="{{route('post.show',['slug'=>$post->slug])}}">
                        <div class="img-place">
                            <img src="{{URL::asset($post->photo)}}" alt="">
                        </div>
                        <div style="margin: 0 3%">
                            <br>
                            <a href="{{route('user.show',['id'=>$post->user_id])}}"> <img src="{{URL::asset($post->user->profile->photo)}}" alt="{{$post->user->profile->photo}}" class="rounded-circle" width="30px" height="30px" > <strong>   {{$post->user->name}}</strong>
                            </a>
                            <div class="caption text-dark">
                                <h4 class="post-category">{{$post->title}}</h4>
                                <p><small><strong>{{$post->content}}</strong></small></p>
                                @if ($post->created_at == $post->updated_at)
                                    <p class="card-text"><small class="text-muted">Last updated : {{$post->updated_at->diffForhumans()}}</small></p>
                                @else
                                    <p class="card-text"><small class="text-muted">Created at : {{$post->created_at->diffForhumans()}}</small></p>
                                @endif
                                @foreach ($tags as $item1)
                                    @foreach ($post->tag as $item2)
                                        @if ($item2->id == $item1->id)
                                            <button class="btn btn-theme btn-sm"   style="float:center;border-radius:20px;font-size:75%;padding:2% 4%" disabled>{{$item1->tag}}</button>
                                        @endif
                                    @endforeach
                                @endforeach<hr>

                                <h4>comments :</h4>
                                    <hr>
                                <ul class="theme-list">
                                    @foreach ($post->comments as $item)
                                        @if ($item->parent_id == null)

                                            <li class="fg-dark">
                                                <div class="card wow fadeInUp border-dark" style='padding:2%;color:rgb(30, 0, 255);'>

                                                    <strong><img src="{{URL::asset($item->user->profile->photo)}}" alt=""  class="rounded-circle" width="30px" height="30px">   <div style="font-size:x-large;display:inline">{{$item->user->name}}</div>
                                                        @if (Auth::user()->id == $item->user->id || Auth::user()->level ==1 )
                                                        <a style="float:right;color:rgb(255, 0, 0);" href="{{route('comments.destroy',['id'=>$item->id] )}}"><i class="fa fa-times"></i></a>
                                                    @endif
                                                </strong><b> <p style="padding: 2%"> " &nbsp;  {{$item->description}}   &nbsp; "  </p></b>
                                                @include('posts.comments',['comments'=>$item->replies])<br>
                                                    <form method="post" action="{{route('comments.store')}}">
                                                        @csrf
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" name="description" required>
                                                                <input type="hidden" class="form-control" name="post_id" value="{{$post->id}}">
                                                                <input type="hidden" class="form-control" name="parent_id" value="{{$item->id}}">
                                                            </div>
                                                            <button type="submit" class="btn btn-theme text-light btn-sm">Reply</button>
                                                            <small>{{$item->created_at->diffForhumans()}} </small>
                                                        </form>


                                                </div>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul> <br>
                                <form method="post" action="{{route('comments.store')}}">
                                    @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="description" required>
                                            <input type="hidden" class="form-control" name="post_id" value="{{$post->id}}">
                                        </div>
                                        <button type="submit" id="" class="btn btn-theme text-light btn-sm" >Add comment</button>
                                </form><br>
                            </div>
                        </div>
                     </a>
                </div>

            </div>
        </div><br><br>
    @endsection
