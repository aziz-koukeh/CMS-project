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
                <h1 class="text-center text-light  wow fadeInUp btn-theme ">Create New</h1>
                <div class="container-fluid">
                    <div class="row py-5">
                        <div class="col-lg-12">
                            <form class="vg-contact-form" method="POST" action="{{route('post.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="col-12 wow fadeInUp">
                                        <label for="exampleInputEmail1">Title</label>
                                        <input class="form-control" type="text" name="title" required>
                                    </div>
                                    <div class="col-12 wow fadeInUp">
                                        <label for="exampleInputEmail1">About</label>
                                        <div class=" form-check form-check-inline card" style="text-align: center;display:block" required>
                                                @foreach ($tags as $item)
                                                    <div class="col-3 wow  fadeInUp form-check-inline" >
                                                        <input class="form-check-input" type="checkbox" value="{{$item->id}}" name="tag[]" autofocus >
                                                        <label class="form-check-label" >
                                                        {{$item->tag}}
                                                        </label>&nbsp;
                                                </div >
                                                @endforeach
                                        </div>
                                    </div>
                                    <div class="col-12 wow fadeInUp">
                                        <label for="exampleFormControlTextarea1">Content</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="content" required></textarea>
                                    </div>
                                    <div class="col-12 wow fadeInUp">
                                        <label for="exampleFormControlInput1">photo</label>
                                        <input type="file" class="form-control" name="photo" id="display" required>
                                    </div>
                                    <button type="submit" class="btn btn-theme mt-3 wow fadeInUp ml-1" > Post </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> <!-- End page contact -->

        </div>
    @endsection


