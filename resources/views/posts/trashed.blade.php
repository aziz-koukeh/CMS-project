@extends('layouts.app')

    @section('content')

        <div class="container">
            <!-- Page Blog -->
            <div class="vg-page page-blog" id="blog">
                <h1 class="text-center text-light  wow fadeInUp btn-theme ">Latest Post</h1>
                <div class="container">
                    <div class="row post-grid">
                        @if (count($posts)>0)
                            @foreach ($posts as $post)
                                <div class="col-md-6 col-lg-4 wow fadeInUp">
                                    <div class="card">
                                        <div class="btn-group dropright">
                                            <button type="button" class="btn  bg-theme text-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="ti-menu icon ti-arrow-right"></span>
                                            </button>
                                            <div class="dropdown-menu " style="text-align:center;">
                                                <a class=" btn bg-theme-green border-dark text-light " style="border-radius:10px;font-size:100%;margin:2% 0 ;padding:2% 4%;width: 90%" href="{{route('post.restore',['id'=>$post->id])}}"><i class="fa fa-undo" aria-hidden="true"></i> Restore </a>
                                                <a  class="btn bg-theme-red border-dark text-light " style="border-radius:10px;font-size:100%;margin:2% 0 ;padding:2% 4%;width: 90%" href="{{route('post.destroy',['id'=>$post->id])}}"> <i class="fa fa-times" aria-hidden="true"></i> Destroy </a>
                                            </div>
                                            <div class="img-place">
                                                <img src="{{URL::asset($post->photo)}}" alt="">
                                            </div>
                                        </div>
                                        <div class="caption text-dark">
                                            <h4 class="post-category">{{$post->title}}</h4>
                                            <p><small><strong>{{$post->content}}</strong></small></p>
                                            @foreach ($tags as $item1)
                                                @foreach ($post->tag as $item2)
                                                    @if ($item2->id == $item1->id)
                                                    <button class="btn btn-theme btn-sm"   style="float:center;border-radius:20px;font-size:75%;padding:2% 4%" disabled>{{$item1->tag}}</button>
                                                    @endif
                                                @endforeach
                                            @endforeach<hr>
                                            @if ($post->created_at == $post->updated_at)
                                                <p class="card-text"><small class="text-muted">Last updated : {{$post->updated_at->diffForhumans()}}</small></p>
                                            @else
                                                <p class="card-text"><small class="text-muted">Created at : {{$post->created_at->diffForhumans()}}</small></p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Opps !</strong>Trash Empty
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
            </div> <!-- End page blog -->

            <div class="row post-grid">
                <div class="col-md-6 col-lg-4 wow fadeInUp" >{{  $posts->links()  }}</div>
            </div>
        </div>
    @endsection
