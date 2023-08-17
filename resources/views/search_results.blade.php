@extends('layouts.app')

    @section('content')
        <!-- Main Wrapper -->
        <div class="vg-main-wrapper">
            <div class="vg-page page-blog">
                <div class="container">
                    <div class="row widget-grid">
                        <div class="col-lg-2" >
                        </div>
                        <div class="col-lg-8" style="text-align:center">
                            <div class="input-group py-2">
                                <form style="width: 100%" action="{{ route('search') }}" method="GET">
                                    <input type="Search" name="keyword" class="form-control" placeholder="Search">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row post-grid">
                        @if ( count($resultsPostT)>0)
                            @foreach ($resultsPostT as $item)
                                <div class="col-md-6 col-lg-4 wow fadeInUp">
                                    <div class="card">
                                        <a href="{{route('post.show',['slug'=>$item->slug])}}" class="post-category">
                                            <div class="img-place">
                                                <img src="{{URL::asset($item->photo)}}" alt="">
                                            </div>
                                            <div class="caption">
                                                <a href="{{route('user.show',['id'=>$item->user_id])}}"> <img src="{{URL::asset($item->user->profile->photo)}}" alt="{{$item->user->profile->photo}}" class="rounded-circle" width="30px" height="30px" > <strong>   {{$item->user->name}}</strong>
                                                </a><br>
                                                <h6>{{$item->title}}</h6>
                                                @foreach ($tags as $item1)
                                                    @foreach ($item->tag as $item2)
                                                        @if ($item2->id == $item1->id)
                                                            <button disabled="disabled" class="btn btn-theme btn-sm" style="border-radius:20px;font-size:75%;padding:2% ">{{$item1->tag}}</button>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                                <hr>
                                                @if ($item->created_at == $item->updated_at)
                                                    <p class="card-text"><small class="text-muted">Last updated : {{$item->updated_at->diffForhumans()}}</small></p>
                                                @else
                                                    <p class="card-text"><small class="text-muted">Created at : {{$item->created_at->diffForhumans()}}</small></p>
                                                @endif
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        @elseif ( count($resultsPostC)>0)
                            @foreach ($resultsPostC as $item)
                                <div class="col-md-6 col-lg-4 wow fadeInUp">
                                    <div class="card">
                                        <a href="{{route('post.show',['slug'=>$item->slug])}}" class="post-category">
                                            <div class="img-place">
                                                <img src="{{URL::asset($item->photo)}}" alt="">
                                            </div>
                                            <div class="caption">
                                                <a href="{{route('user.show',['id'=>$item->user_id])}}"> <img src="{{URL::asset($item->user->profile->photo)}}" alt="{{$item->user->profile->photo}}" class="rounded-circle" width="30px" height="30px" > <strong>   {{$item->user->name}}</strong>
                                                </a><br>
                                                <h6>{{$item->title}}</h6>
                                                @foreach ($tags as $item1)
                                                    @foreach ($item->tag as $item2)
                                                        @if ($item2->id == $item1->id)
                                                            <button disabled="disabled" class="btn btn-theme btn-sm" style="border-radius:20px;font-size:75%;padding:2% ">{{$item1->tag}}</button>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                                <hr>
                                                @if ($item->created_at == $item->updated_at)
                                                    <p class="card-text"><small class="text-muted">Last updated : {{$item->updated_at->diffForhumans()}}</small></p>
                                                @else
                                                    <p class="card-text"><small class="text-muted">Created at : {{$item->created_at->diffForhumans()}}</small></p>
                                                @endif
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        @elseif ( count($resultsUser)>0)
                            @foreach ($resultsUser as $item)
                                <div class="col-md-6 col-lg-4 wow fadeInUp">
                                    <div class="card"><a href="{{route('user.show',['id'=>$item->id])}}">
                                        <div class="img-place">
                                            <img  src="{{URL::asset($item->profile->photo)}}" alt="{{URL::asset($item->profile->photo)}}">
                                        </div>
                                        <div class="caption">
                                            <h3><strong> {{$item->name}}</strong></h3>
                                            <h6><strong>{{$item->profile->bio}}</strong></h6>
                                            <hr>
                                            @if ($item->created_at == $item->updated_at)
                                                <p class="card-text"><small class="text-muted">Last updated : {{$item->updated_at->diffForhumans()}}</small></p>
                                            @else
                                                <p class="card-text"><small class="text-muted">Created at : {{$item->created_at->diffForhumans()}}</small></p>
                                            @endif
                                        </div></a>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                                <strong>Opps ! </strong>ON Result !!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endsection
