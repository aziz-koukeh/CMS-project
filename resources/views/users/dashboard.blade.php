@extends('layouts.app')

@section('content')

    @if (count($errors)>0)
        @foreach ($errors->all() as $error)
            <div class="alert alert-secondary" role="alert">
                {{$error}}
            </div>
        @endforeach
    @endif

    <section class="dashboard">
        <div class="dash-content ">
            <div class="overview main-menu">

                {{-- section Dashboard --}}
                <div class="title wow fadeInDown">
                    <i class="bg-theme uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard</span>
                </div> {{--End  section Dashboard --}}
                        {{-- boxes  --}}
                <div class="boxes wow fadeInUp menu-item" >
                    <a href="#users"class="box box1 menu-link"  style="padding:2%;height: 165px; ">
                        <i class="text-warning uil ti-user"></i>
                        <span class="text">Total Users</span>
                            @php
                                $usercount= count($users)
                            @endphp
                        <span class="number">{{$usercount}}</span>
                    </a>
                    <a href="#posts" class="box box2 menu-link" style="padding:2%;height: 165px; ">
                        <i class="text-success uil uil-comments"></i>
                        <span class="text">Total Posts</span>
                            @php
                               $post=count($posts);
                            @endphp
                        <span class="number">{{$post}}</span>
                    </a>
                    <a href=""class=" box box3 menu-link" style="padding:2%;height: 165px; " data-toggle="modal" data-target="#Trashed">
                        <i class="text-danger fas fa-trash"></i>
                        <span class="text">Total Trashed</span>
                            @php
                                $trashcount= count($trasheds);
                            @endphp
                        <span class="number">{{$trashcount}}</span>
                    </a>
                    <div class="modal fade" id="Trashed" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" >
                            <div class="modal-content" style="width: 1000px">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    @php
                                    $t = 0
                                    @endphp

                                    <table class="table">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">User</th>
                                                <th scope="col">Post</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($trasheds as $trashed)
                                                <tr>
                                                    <th scope="row">{{++$t}}</th>
                                                    <td><strong>{{$trashed->user->name}}</strong></td>
                                                    <td><p><strong><img src="{{URL::asset($trashed->photo)}}" class="rounded" width="40px" height="40px" > &nbsp;{{$trashed->title}}</strong></p></td>
                                                    <td  style="display:flex ">
                                                        <a class=" btn bg-theme-green border-dark text-light "  href="{{route('post.restore',['id'=>$trashed->id])}}"><i class="fa fa-undo" ></i></a>
                                                        <a  class="btn bg-theme-red border-dark text-light "  href="{{route('post.destroy',['id'=>$trashed->id])}}"><i class="fa fa-times"></i></a>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>{{--End boxes  --}}
            </div><hr>

                {{-- Users controller --}}
            <div class="card activity wow fadeInUp border-dark ">
                <div class="title card-header" id="users">
                    <i class="bg-theme uil uil-clock-three"></i>
                    <span class="text">Users Activity</span>
                </div>
                <div class="dropdown" style="float: center">
                    &nbsp;&nbsp;<button class="btn btn-primary " type="button" data-toggle="dropdown" >
                        Create user <span class="spinner-grow text-light spinner-grow-sm" role="status" aria-hidden="true"></span>
                        <span class="sr-only">Loading...</span>
                    </button>
                    <div class="dropdown-menu border-dark" style="border-radius: 8px ;text-align:center">
                        <form class=" p-4" method="post" action="{{route('user.store')}}">
                            @csrf
                            <div class="card-header">Create User</div>
                            <div class="form-group">
                                <label for="exampleDropdownFormEmail2">Full name</label>
                                <input type="text" class="form-control border-dark @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus >
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleDropdownFormEmail2">Email</label>
                                <input type="email" class="form-control border-dark  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" >
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleDropdownFormEmail2">Password</label>
                                <input id="password" type="password" class="form-control border-dark @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" >
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleDropdownFormEmail2">Confirm Password</label>
                                <input type="password" class="form-control border-dark" name="password_confirmation"  required autocomplete="new-password">
                            </div>
                            <button type="submit" class="btn btn-primary">Save </button>
                        </form>
                    </div>
                </div>
                @php
                    $i = 0
                @endphp <br>
                <table class="table " >
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" >&nbsp;&nbsp;&nbsp;Users </th>
                        <th scope="col">Type </th>
                        <th scope="col">Email </th>
                        <th scope="col">Actions</th>
                        <th scope="col">Posts/Comments</th>
                        <th scope="col">Modifier</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                        <tr>
                            <th scope="row"><b>{{++$i}}</b>
                            </th>
                            <td>
                                <a class="text-dark" href="{{route('user.show',['id'=>$item->id])}}" data-toggle=" tooltip"  data-placement="top" title="Show {{$item->name}} Profile"><strong>
                                <img src="{{URL::asset($item->profile->photo)}}" class="rounded-circle" width="40px" height="40px" >
                                {{$item->name}}
                                </strong></a>
                            </td>
                            <td><strong>
                                @if ($item->level == 1)
                                <span class="text-warning wow fadeInUp icon ti-crown "> </span><strong> Admin </strong>
                                @elseif ($item->level == 2)
                                <span class="text-success wow fadeInUp icon ti-user"> </span><strong> User </strong>
                                @endif</strong>
                            </td>
                            <td>
                                <strong>{{$item->email}}</strong>
                            </td>
                            <td>
                                <div style="display:flex ">
                                    <a class="text-success" type="button" data-toggle="modal" data-target="#{{'Modal'.$i}}" data-toggle=" tooltip"  data-placement="top" title="Edit Profile">
                                        <i class="text-success  icon fas fa-edit"></i>
                                    </a>&nbsp; &nbsp; &nbsp; &nbsp;
                                    <div class="modal fade" id="{{'Modal'.$i}}" tabindex="-1" aria-labelledby="{{$i}}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                            <div class="modal-content" style=" width: 1000px; text-align:center" >
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="{{$i}}"><img src="{{URL::asset($item->profile->photo)}}" class="rounded-circle" width="40px" height="40px" >
                                                        <strong style="text-transform:capitalize;">{{$item->name}}</strong> Profile &nbsp;&nbsp; @if ($item->level == 1)
                                                        <i class="text-warning icon ti-crown "> </i>
                                                        @elseif ($item->level == 2)
                                                        <i class="text-success icon ti-user"> </i>
                                                        @endif
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" >
                                                    <div class="row ">
                                                        <div class="col-md-6">
                                                            <div class="img-place "><br><br><br><br><br>
                                                            <img src="{{URL::asset($item->profile->photo)}}" alt="Photo Profile">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 ">
                                                            <form class="vg-contact-form" method="POST" action="{{route('profile.update',['id'=>$item->id])}}" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('put')
                                                                <div class="form-row">
                                                                    <div class="col-12  ">
                                                                        <label for="exampleInputEmail1">Name</label>
                                                                        <input class="form-control" type="text" name="name" value="{{$item->name}}">
                                                                    </div>
                                                                    <div class="col-12  ">
                                                                        <label for="exampleInputEmail1">Email address</label>
                                                                        <input class="form-control" type="email" name="email" value="{{$item->email}}">
                                                                    </div>
                                                                    <div class="col-6  ">
                                                                        <label for="exampleFormControlTextarea1">Country</label>
                                                                        <input type="text" class="form-control" name="country" value="{{$item->profile->country}}">
                                                                    </div>
                                                                    <div class="col-6  ">
                                                                        <label for="exampleInputEmail1">Phone</label>
                                                                        <input type="text" class="form-control" name="phone" value="{{$item->profile->phone}}">
                                                                    </div>
                                                                    <div class="col-6  ">
                                                                        @php
                                                                            $gender=['Male','Female']
                                                                        @endphp
                                                                            <label for="exampleFormControlSelect2">Gender</label>
                                                                            <select  class="form-control"name="gender">
                                                                                @foreach ($gender as $item1)
                                                                            <option value="{{$item1}}" {{($item->profile->gender == $item ) ? 'selected' : ''}}>{{$item1}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                    </div>
                                                                    <div class="col-6  ">
                                                                        <label for="exampleInputEmail1">photo</label>
                                                                        <input type="file" class="form-control" name="photo" value="{{$item->profile->photo}}">
                                                                    </div>
                                                                    <div class="col-12  ">
                                                                        <label for="exampleFormControlTextarea1">Bio</label>
                                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1" name="bio">{{$item->profile->bio}}</textarea>
                                                                    </div>
                                                                    <div class="col-12  ">
                                                                        <label for="exampleFormControlTextarea1">facebook</label>
                                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1" name="facebook">{{$item->profile->facebook}}</textarea>
                                                                    </div>
                                                                    <div class="col-6  ">
                                                                        <label for="exampleInputPassword1">Password</label>
                                                                        <input type="password" class="form-control" name="password">
                                                                    </div>
                                                                    <div class="col-6  ">
                                                                        <label for="exampleInputPassword1">Confirm Password</label>
                                                                        <input type="password" class="form-control" name="c_password" >
                                                                    </div>
                                                                    <small class="col-6   text-muted">
                                                                        &nbsp;  Last Update :{{$item->profile->updated_at->diffForhumans()}}
                                                                    </small>
                                                                </div>
                                                            </div>

                                                    </div>
                                                </div>
                                                <div class="modal-footer" style="padding-right: 10%">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <a class="text-warning" type="button" data-toggle="dropdown"  data-toggle=" tooltip" data-placement="top" title="User level">
                                            <i class="text-warning  icon ti-crown"></i>
                                        </a>&nbsp; &nbsp; &nbsp; &nbsp;
                                        <a class="text-danger" type="button"  href="{{route('user.destroy',['id'=>$item->id])}}" data-toggle=" tooltip" data-placement="top" title="Delete User">
                                            <i class="fas fa-trash" ></i>
                                        </a>
                                        <div class="dropdown-menu  border-dark"  style="border-radius: 8px ;text-align:center">
                                            <form method="POST" action="{{route('user.admin_user',['id'=>$item->id])}}">
                                                @csrf
                                                <div class="form-group container">
                                                    <label for="exampleFormControlSelect1">Level</label>
                                                    <select class="form-control" id="exampleFormControlSelect1" name="level">
                                                        @if ($item->level == 1)
                                                        <option class="text-success " value="1">Admin</option>
                                                        <option class="text-danger" value="2" selected>User</option>
                                                        @else
                                                        <option class="text-danger" value="1" selected>Admin</option>
                                                        <option class="text-success" value="2" >User</option>
                                                        @endif
                                                    </select>
                                                </div>
                                                <button type="submit"  class="btn btn-success">Update</button>
                                            </form>
                                        </div>
                                    </div>&nbsp;
                                </div>
                            </td>
                            <td>
                                @php
                                    $counPost=0;
                                @endphp
                                    @foreach ($posts as $post)
                                        @if ($post->user_id == $item->id)
                                            @php
                                            $counPost= $counPost+1;
                                            @endphp
                                        @endif
                                    @endforeach
                                &nbsp;&nbsp;  &nbsp;&nbsp;  {{$counPost}} &nbsp;&nbsp; / &nbsp;&nbsp;
                                @php
                                    $counCom=0
                                @endphp
                                    @foreach ($comments as $comment)
                                        @if ($comment->user_id == $item->id)
                                            @php
                                            $counCom= $counCom+1;
                                            @endphp
                                        @endif
                                    @endforeach
                                {{$counCom}}
                            </td>
                            <td>
                                @if ($item->profile->created_at == $item->profile->updated_at )
                                    <small>created at : {{$item->profile->created_at}}</small>
                                @else
                                    <small>updated  at : {{$item->profile->updated_at->diffForhumans()}}</small>
                                @endif
                            </td>
                        </tr>
                         @endforeach
                    </tbody>
                </table>
            </div> <br>{{-- End Users controller --}}


                {{-- sections Interests/Posts --}}
            <div class="row">
                                {{-- Interests --}}
                <div class=" col-lg-5 col-md-6 col-sm-12">
                    <div class="card activity wow fadeInUp border-dark">
                        <div class="title card-header">
                            <i class="bg-theme uil uil-clock-three"></i>
                            <span class="text">Interests</span>
                        </div>
                        <div class="dropdown" style="float: center">
                            &nbsp;&nbsp;&nbsp;<button class="btn btn-primary " type="button" data-toggle="dropdown" >
                                Create New Interest <span class="spinner-grow text-light spinner-grow-sm" role="status" aria-hidden="true"></span>
                                <span class="sr-only">Loading...</span>
                            </button><br>
                            <div class="dropdown-menu border-dark" style="border-radius: 8px ;text-align:center">
                                <form class=" p-4" method="post" action="{{route('tag.store')}}">
                                    @csrf
                                    <div class="form-group">
                                    <label for="exampleDropdownFormEmail2">Interests Name</label>
                                    <input type="text" class="form-control border-dark" name="tag"  required autofocus >
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </form>
                            </div>
                            @php
                            $i1 = 0
                            @endphp <br>
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Interests </th>
                                        <th scope="col">Actions</th>
                                        <th scope="col">Modifier</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tags as $item)
                                        <tr>
                                            <th scope="row">{{++$i1}}</th>
                                            <td><strong>{{$item->tag}}</strong></td>
                                            <td>
                                                <div class="dropdown">
                                                    <a class="text-success" type="button" data-toggle="dropdown"  data-toggle="tooltip" data-placement="top" title="Edit tag">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    &nbsp; &nbsp; &nbsp; &nbsp;
                                                    <a class="text-danger" type="button"  href="{{route('tag.destroy',['id'=>$item->id])}}" data-toggle="tooltip" data-placement="top" title="Delete tag">
                                                        <i class="fas fa-trash" ></i>
                                                    </a>
                                                    <div class="dropdown-menu border-dark"  style="border-radius: 8px ;text-align:center">

                                                        <form class=" p-4" method="post" action="{{route('tag.update',['id'=>$item->id])}}">
                                                            @csrf
                                                            <div class="form-group">
                                                            <label for="exampleDropdownFormEmail2"><strong>Edit</strong></label>
                                                            <input type="text" class="form-control border-dark" name="tag" value="{{$item->tag}}" required autofocus>
                                                            </div>
                                                            <button type="submit"  class="btn btn-primary">Update</button>
                                                        </form>

                                                    </div>
                                                </div>&nbsp;
                                            </td>
                                            <td>
                                                @if ($item->created_at == $item->updated_at )
                                                    <small>created at : {{$item->created_at}}</small>
                                                @else
                                                   <small>updated  at : {{$item->updated_at->diffForhumans()}}</small>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>{{-- End Interests --}}

                                {{-- Posts --}}
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <div class="card  activity wow fadeInUp  border-dark ">
                        <div class="title card-header" id="posts" >
                            <i class="bg-theme uil uil-clock-three"></i>
                            <span class="text">Posts control panal</span>
                        </div>
                        @php
                            $x= 0;
                        @endphp
                        <table class="table "  >
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col" >&nbsp;&nbsp;&nbsp;Title </th>
                                    <th scope="col">Actions</th>
                                    <th scope="col">Modifier</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <th scope="row"><b>{{++$x}}</b>
                                        </th>
                                        <td>
                                           <p ><strong><img data-toggle="tooltip" data-placement="top" title="{{$post->user->name}}" src="{{URL::asset($post->photo)}}" class="rounded" width="40px" height="40px" > &nbsp;{{$post->title}}</strong></p>
                                        </td>
                                        <td>
                                            <div style="display:flex ">
                                                <a class="text-success" type="button" data-toggle="modal" data-target="#{{'exampleModal'.$x}}"   data-placement="top" title="Edit Post">
                                                    <i class="text-success  icon fas fa-edit"></i>
                                                </a> &nbsp; &nbsp; &nbsp; &nbsp;
                                                    <a class="text-danger" type="button"  href="{{route('post.softDeletes',['id'=>$post->id])}}" data-placement="top" title="Delete Post">
                                                        <i class="fas fa-trash" ></i>
                                                    </a>
                                                <div class="modal fade" id="{{'exampleModal'.$x}}" tabindex="-1" aria-labelledby="{{$x}}" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                        <div class="modal-content" style=" width: 1000px; text-align:center" >
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="{{$x}}"><strong style="text-transform:capitalize;">  <a class="text-dark" href="{{route('user.show',['id'=>$post->user->id])}}" data-toggle=" tooltip"  data-placement="top" title="Show {{$post->user->name}} Profile"><strong>
                                                                    <img src="{{URL::asset($post->user->profile->photo)}}" class="rounded-circle" width="40px" height="40px" >
                                                                    {{$post->user->name}}
                                                                    </strong></a><b> -> </b>{{$post->title}}</strong></h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body" >
                                                                <div class="row ">
                                                                    <div class="col-md-6 " style="text-align:left">
                                                                        <h4>comments :</h4><hr>
                                                                        <ul >
                                                                            @foreach ($post->comments as $item)
                                                                                @if ($item->parent_id == null)
                                                                                    <li class="fg-dark">
                                                                                        <div class="card  border-dark" style='padding:2%;color:rgb(30, 0, 255);'>
                                                                                            <strong><img src="{{URL::asset($item->user->profile->photo)}}" alt=""  class="rounded-circle" width="30px" height="30px">   <div style="font-size:x-large;display:inline">{{$item->user->name}}</div>
                                                                                                @if (Auth::user()->id == $item->user->id || Auth::user()->level ==1 )
                                                                                                    <a style="float:right;color:rgb(255, 0, 0);" href="{{route('comments.destroy',['id'=>$item->id] )}}"><i class="fa fa-times"></i></a>
                                                                                                @endif
                                                                                            </strong><b> <p style="padding: 2%"> " &nbsp;  {{$item->description}}   &nbsp; "  </p></b>
                                                                                            @include('posts.comments',['comments'=>$item->replies])
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
                                                                                        </div><br>
                                                                                    </li>
                                                                                @endif
                                                                            @endforeach
                                                                        </ul>
                                                                        <form method="post" action="{{route('comments.store')}}">
                                                                            @csrf
                                                                                <div class="form-group">
                                                                                    <input type="text" class="form-control" name="description" required>
                                                                                    <input type="hidden" class="form-control" name="post_id" value="{{$post->id}}">
                                                                                </div>
                                                                                <button type="submit" id="" class="btn btn-theme text-light btn-sm" >Add comment</button>
                                                                        </form>
                                                                    </div>
                                                                    <div class=" col-md-6 ">
                                                                        <div ><br><br>
                                                                            <img style="width:400px ;" src="{{URL::asset($post->photo)}}" alt="Photo Profile">
                                                                        </div>
                                                                        <form class="card vg-contact-form" style="padding: 2%;border-radius: 5px" method="POST" action="{{route('post.update',['id'=>$post->id])}}" enctype="multipart/form-data">
                                                                            @csrf
                                                                            <div class="form-row">
                                                                                <div class="col-12 ">
                                                                                    <label for="exampleInputEmail1">Title</label>
                                                                                    <input class="form-control" type="text" name="title" value="{{$post->title}}" >
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <label for="exampleInputEmail1">About</label>
                                                                                    <div class=" form-check form-check-inline card" style="text-align: center;display:block" >
                                                                                        @foreach ($tags as $item)
                                                                                            <div class="col-3  form-check-inline" >
                                                                                                <input class="form-check-input" type="checkbox" value="{{$item->id}}" name="tag[]" autofocus @foreach ($post->tag as $item1) @if ($item->id == $item1->id ) checked @endif @endforeach >
                                                                                                <label class="form-check-label" >
                                                                                                    {{$item->tag}}
                                                                                                </label>&nbsp;
                                                                                            </div >
                                                                                        @endforeach
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12 ">
                                                                                    <label for="exampleFormControlTextarea1">Content</label>
                                                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="content" >{{$post->content}}</textarea>
                                                                                </div>
                                                                                <div class="col-12 ">
                                                                                    <label for="exampleFormControlInput1">photo</label>
                                                                                    <input type="file" class="form-control" name="photo" id="display" value="{{$post->photo}}" >
                                                                                </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer" style="padding-right: 10%">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save changes</button></form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            @if ($post->created_at == $post->updated_at )
                                                <small>created at : {{$post->created_at}}</small>
                                            @else
                                                <small>updated  at : {{$post->updated_at->diffForhumans()}}</small>
                                            @endif
                                        </td>
                                    </tr>
                                 @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>{{-- End Posts --}}

            </div>{{-- End sections Interests/Posts --}}

        </div>

    </section>



@endsection
