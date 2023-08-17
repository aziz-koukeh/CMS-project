@extends('layouts.app')

    @section('content')

        <div class="container">
            @if (count($errors)>0)
                @foreach ($errors->all() as $error)
                    <div class="alert alert-secondary" role="alert">
                        {{$error}}
                    </div>
                @endforeach
            @endif
            <!-- Page Contact -->
            <div class="vg-page page-contact" id="contact">
                <h1 class="text-center text-light  wow fadeInUp btn-theme ">My Profile</h1>
                <div class="container-fluid">
                    <div class="row py-5">
                        <div class="col-lg-7">
                            <br><br><br><br>
                            <div class="img-place wow zoomIn">
                            <img src="{{URL::asset($user->profile->photo)}}" alt="Photo Profile">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <form class="vg-contact-form" method="POST" action="{{route('profile.update',['id'=>$user->id])}}" enctype="multipart/form-data">
                                @csrf @method('put')
                                <div class="form-row">
                                    <div class="col-12 wow fadeInUp">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input class="form-control" type="text" name="name" value="{{$user->name}}">
                                    </div>
                                    <div class="col-12 wow fadeInUp">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input class="form-control" type="email" name="email" value="{{$user->email}}">
                                    </div>
                                    <div class="col-6 wow fadeInUp">
                                        <label for="exampleFormControlTextarea1">Country</label>
                                        <input type="text" class="form-control" name="country" value="{{$user->profile->country}}">
                                    </div>
                                    <div class="col-6 wow fadeInUp">
                                        <label for="exampleInputEmail1">Phone</label>
                                        <input type="text" class="form-control" name="phone" value="{{$user->profile->phone}}">
                                    </div>
                                    <div class="col-6 wow fadeInUp">
                                        @php
                                            $gender=['Male','Female']
                                        @endphp
                                            <label for="exampleFormControlSelect2">Gender</label>
                                            <select  class="form-control"name="gender">
                                                @foreach ($gender as $item)
                                            <option value="{{$item}}" {{($user->profile->gender == $item ) ? 'selected' : ''}}>{{$item}}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                    <div class="col-6 wow fadeInUp">
                                        <label for="exampleInputEmail1">Photo</label>
                                        <input type="file" class="form-control" name="photo" value="{{$user->profile->photo}}">
                                    </div>
                                    <div class="col-12 wow fadeInUp">
                                        <label for="exampleFormControlTextarea1">Bio</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="bio">{{$user->profile->bio}}</textarea>
                                    </div>
                                    <div class="col-12 wow fadeInUp">
                                        <label for="exampleFormControlTextarea1">facebook</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1" name="facebook">{{$user->profile->facebook}}</textarea>
                                    </div>
                                    <div class="col-6 wow fadeInUp">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" class="form-control" name="password" >
                                    </div>
                                    <div class="col-6 wow fadeInUp">
                                        <label for="exampleInputPassword1">Confirm Password</label>
                                        <input type="password" class="form-control" name="c_password" >
                                    </div>
                                    <small class="col-6 wow fadeInUp text-muted">
                                    &nbsp;  Last Update :{{$user->profile->updated_at->diffForhumans()}}
                                    </small>
                                    <button type="submit" class="btn btn-theme mt-3 wow fadeInUp ml-1">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> <!-- End page contact -->
        </div>
    @endsection
