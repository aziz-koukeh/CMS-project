@extends('layouts.app')

    @section('content')

        <div class="container">

            <!-- Page Contact -->
            <div class="vg-page page-contact" id="contact">
                @if (count($errors)>0)
                    @foreach ($errors->all() as $item)
                        <div class="alert alert-secondary" role="alert">
                            {{$item}}
                        </div>
                    @endforeach
                @endif
                <h1 class="text-center text-light  wow fadeInUp btn-theme ">Edit Post</h1>
                <div class="container-fluid">
                    <div class="row py-5">
                        <div class="col-lg-7"><br><br>
                            <div class=" wow fadeInUp">
                                <div class="card" >
                                    <a href="{{route('post.show',['slug'=>$post->slug])}}">
                                        <div class="img-place">
                                            <img src="{{URL::asset($post->photo)}}" alt="">
                                        </div>
                                        <div style="margin: 0 3%"><br>
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
                                                    @endforeach<br><br>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <form class="vg-contact-form" method="POST" action="{{route('post.update',['id'=>$post->id])}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="col-12 wow fadeInUp">
                                        <label for="exampleInputEmail1">Title</label>
                                        <input class="form-control" type="text" name="title" value="{{$post->title}}" >
                                    </div>
                                    <div class="col-12 wow fadeInUp">
                                        <label for="exampleInputEmail1">About</label>
                                        <div class=" form-check form-check-inline card" style="text-align: center;display:block" >
                                            @foreach ($tags as $item)
                                                <div class="col-3 wow fadeInUp form-check-inline" >
                                                    <input class="form-check-input" type="checkbox" value="{{$item->id}}" name="tag[]" autofocus @foreach ($post->tag as $item1)@if ($item->id == $item1->id )checked @endif @endforeach >
                                                    <label class="form-check-label" >
                                                    {{$item->tag}}
                                                    </label>&nbsp;
                                                </div >
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-12 wow fadeInUp">
                                        <label for="exampleFormControlTextarea1">Content</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="content" >{{$post->content}}</textarea>
                                    </div>
                                    <div class="col-12 wow fadeInUp">
                                        <label for="exampleFormControlInput1">photo</label>
                                        <input type="file" class="form-control" name="photo" id="display" value="{{$post->photo}}" >
                                    </div>
                                    <button type="submit" class="btn btn-theme mt-3 wow fadeInUp ml-1" > Edit Post </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> <!-- End page contact -->

        </div>
    @endsection
