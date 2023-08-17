@extends('layouts.app')

    @section('content')

        <div class="container">
            <!-- Page About -->
            <div class="vg-page page-about" id="about">
                <!-- Profile -->
                <h1 class="text-center text-light  wow fadeInUp btn-theme ">User Info</h1><br>
                <div class="container py-3">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="img-place wow zoomIn">
                            <img src="{{URL::asset($user->profile->photo)}}" alt="Photo Profile">
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="caption wow fadeInRight">
                                <h2  class="fg-theme ">{{$user->name}}</h2>
                                <p class="fg-theme fw-medium">{{$user->email}}</p>
                                <p style="color:black"><strong>{{$user->profile->bio}}</strong></p>
                                <ul class="theme-list">
                                    <li ><b class="fg-theme">From:</b> <strong style="color:black">{{$user->profile->country}}</strong></li>
                                    @if ($user->profile->phone != +963)
                                    <li ><b class="fg-theme">Phone:</b><strong style="color:black">{{$user->profile->phone}}</strong> </li>
                                        @endif
                                    @if ($user->profile->facebook != 'https://www.facebook.com')
                                    <li ><b class="fg-theme">Facebook:</b> <a href="{{$user->profile->facebook}}"><strong style="color:black">{{$user->profile->facebook}}</strong></a></li>
                                        @endif
                                    <li><b class="fg-theme">Gender:</b> <strong style="color:black">{{$user->profile->gender}}</strong></li>
                                    <li ><b class="fg-theme">Created at:</b><strong style="color:black">{{$user->profile->created_at}}</strong> </li>
                                </ul>
                                @if ($user->id == Auth::User()->id)
                                    <a href="{{route('profile')}}" class="btn btn-theme btn-rounded"> Edit my Account </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div> <!-- End profile -->
            </div> <!-- End page about -->
            <!-- Page Blog -->
            <div class="vg-page page-blog" id="blog">
                <h1 class="text-center text-light  wow fadeInUp btn-theme ">Latest Posts</h1>
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
                                                @if ($post->user_id == Auth::id() || Auth::user()->level == 1)
                                                <a class="btn bg-theme  border-dark text-light " style="border-radius:10px;font-size:100%;margin:2% 0 ; padding:2% 4%;width: 90%"  href="{{route('post.show',['slug'=>$post->slug])}}"><i class="fas fa-eye"></i> Show </a>
                                                <a class=" btn bg-theme border-dark text-light " style="border-radius:10px;font-size:100%;margin:2% 0 ;padding:2% 4%;width: 90%" href="{{route('post.edit',['id'=>$post->id])}}"><i class="fas fa-edit"></i> Edit </a>
                                                <a  class="btn bg-theme border-dark text-light " style="border-radius:10px;font-size:100%;margin:2% 0 ;padding:2% 4%;width: 90%" href="{{route('post.softDeletes',['id'=>$post->id])}}"><i class="fa fa-times"></i> Delete </a>
                                                @else
                                                <a class="btn bg-theme  border-dark text-light " style="border-radius:10px;font-size:100%;margin:2% 0 ; padding:2% 4%;width: 90%"  href="{{route('post.show',['slug'=>$post->slug])}}"><i class="fas fa-eye"></i> Show </a>
                                                <a  class="btn bg-theme border-dark text-light " style="border-radius:10px;font-size:100%;margin:2% 0 ;padding:2% 4%;width: 90%" href="{{route('post.softDeletes',['id'=>$post->id])}}"><i class="fa fa-times"></i> Don't see this </a>
                                                @endif
                                            </div>
                                            <div class="img-place">
                                                <img src="{{URL::asset($post->photo)}}" alt="">
                                            </div>
                                        </div>
                                        <a style="padding: 3%" href="{{route('user.show',['id'=>$post->user_id])}}"> <img src="{{URL::asset($post->user->profile->photo)}}" alt="{{$post->user->profile->photo}}" class="rounded-circle" width="30px" height="30px" > <strong>   {{$post->user->name}}</strong>
                                        </a>
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
                            <div class="alert btn-theme text-light alert-dismissible fade show" role="alert">
                                <strong>Opps !</strong>On Posts
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
            </div><!-- End page blog -->
            <div class="row post-grid">
                <div class="col-md-6 col-lg-4 wow fadeInUp" >{{  $posts->links()  }}</div>
            </div>
        </div>

    @endsection
