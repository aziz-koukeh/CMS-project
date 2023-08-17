@extends('layouts.app')

    @section('content')

        @guest
            <!-- Back to top button -->
            <div class="btn-back_to_top ">
                <span class="ti-arrow-up"></span>
            </div>
            <!--  main wrapper -->
            <div class="vg-main-wrapper">
                <div class="vg-page page-home" id="home" style="background-image: url(../assets/img/bg_image_2.jpg);">
                    <div class="caption wow zoomInUp">
                        <h1 class="fw-normal text-dark">Welcome</h1>
                        <h2 class="fw-medium fg-theme">In Blog test</h2>
                        <p class="tagline">The Life is Beautiful but you most be strong <span class="ti-heart fg-theme-blue"></span></p>
                    </div>
                </div>
                <!-- Page Service -->
                <div class="vg-page page-service" id="services">
                    <h1 class="text-center text-light  wow fadeInUp btn-theme ">About App</h1>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-lg-4 wow fadeInUp">
                                <div class="card card-body">
                                    <div class="iconic">
                                    <span class="ti-layout"></span>
                                    </div>
                                    <h4 class="fg-theme">Beauty Design</h4>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                                    <a href="#" class="btn btn-theme btn-rounded">Read More</a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 wow fadeInUp">
                                <div class="card card-body">
                                    <div class="iconic">
                                    <span class="ti-announcement"></span>
                                    </div>
                                    <h4 class="fg-theme">Perfect Community</h4>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                                    <a href="#" class="btn btn-theme btn-rounded">Read More</a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 wow fadeInUp">
                                <div class="card card-body">
                                    <div class="iconic">
                                    <span class="ti-desktop"></span>
                                    </div>
                                    <h4 class="fg-theme">Eazy To Use</h4>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                                    <a href="#" class="btn btn-theme btn-rounded">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End page services -->

                    <!-- Page Blog -->
                <div class="vg-page page-blog" id="blog">
                    <h1 class="text-center text-light  wow fadeInUp btn-theme ">Latest Post</h1>
                    <div class="container">
                        <div class="row post-grid">
                            @foreach ($post as $item)
                                <div class="col-md-6 col-lg-4 wow fadeInUp">
                                    <div class="card">
                                        <div class="img-place">
                                            <img src="{{URL::asset($item->photo)}}" alt="">
                                        </div>
                                        <div class="caption">
                                            @foreach ($tags as $item1)
                                                @foreach ($item->tag as $item2)
                                                    @if ($item2->id == $item1->id)
                                                        <button disabled="disabled" class="btn btn-theme btn-sm" style="border-radius:20px;font-size:75%;padding:2% ">{{$item1->tag}}</button>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                                    <br>
                                            <a href="{{route('post.show',['slug'=>$item->slug])}}" class="post-category">{{$item->title}}</a>
                                            @if ($item->created_at == $item->updated_at)
                                                <p class="card-text"><small class="text-muted">Last updated : {{$item->updated_at->diffForhumans()}}</small></p>
                                            @else
                                                <p class="card-text"><small class="text-muted">Created at : {{$item->created_at->diffForhumans()}}</small></p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="col-12 text-center py-3 wow fadeInUp">
                                <a href="{{route('posts')}}" class="btn btn-theme">See All Post</a>
                            </div>
                        </div>
                    </div>
                </div> <!-- End page blog -->

                <!-- Page counter -->
                <div class="vg-page page-funfact" style="background-image: url(../assets/img/bg_banner.jpg);">
                    <div class="container">
                        <div class="row section-counter">
                            <div class="col-md-6 col-lg-3 py-4 wow fadeIn">
                                @php
                                    $admin=0
                                @endphp
                                @foreach ($users as $user)
                                    @if ($user->level == 1)
                                        @php
                                            $admin++
                                        @endphp
                                    @endif
                                @endforeach
                                <h1 class="number" data-number="{{$admin}}">{{$admin}}</h1>
                                <span>Admins</span>
                            </div>
                            <div class="col-md-6 col-lg-3 py-4 wow fadeIn">
                                @php
                                    $user=count($users);
                                @endphp
                                <h1 class="number" data-number="{{$user}}">{{$user}}</h1>
                                <span>Users</span>
                            </div>

                            <div class="col-md-6 col-lg-1 py-4 wow fadeIn">
                                @php
                                    $post=count($posts);
                                @endphp
                                <h1 class="number" data-number="{{$post}}">{{$post}}</h1>
                                <span>Posts</span>
                            </div>

                            <div class="col-md-6 col-lg-2 py-4 wow fadeIn">
                                @php
                                   $Comment=count($Comments);
                                @endphp
                                <h1 class="number" data-number="{{$Comment}}">{{$Comment}}</h1>
                                <span>Comments</span>
                            </div>

                            <div class="col-md-6 col-lg-3 py-4 wow fadeIn">
                                @php
                                    $tag=count($tags);
                                @endphp
                                <h1 class="number" data-number="{{$tag}}">{{$tag}}</h1>
                                <span>Interests</span>
                            </div>
                        </div>
                    </div>
                </div><!-- End page counter -->

            </div> <!-- End main wrapper -->

        @else
            <!-- Back to top button -->
            <div class="btn-back_to_top ">
                <span class="ti-arrow-up"></span>
            </div>
            <!--  main wrapper -->
            <div class="vg-main-wrapper">
                <div class="vg-page page-home" id="home" style="background-image: url(../assets/img/bg_image_2.jpg);">
                    <div class="caption wow zoomInUp">
                        <h1 class="fw-normal text-dark">Blog Test</h1>

                        <p class="tagline">is a good Choice <span class="ti-heart fg-theme-blue"></span></p>

                    </div>
                </div>



                <!-- Testimonials-->
                <div class="vg-page p-0" id="testimonial">
                    <h1 class="text-center text-light  wow fadeInUp btn-theme ">Latest News</h1>
                    <br>
                    <div class="owl-carousel testi-carousel" style="background-image: url(../assets/img/photo-2.jpg);">
                        <div class="item">
                        <p> المستخدمين نوعان .. مدير ومستخدم عادي </p>
                    <br> <span class="iconic">
                        <span class="ti-quote-left"></span>
                    </span><span class="iconic">
                        <span class="ti-quote-left"></span>
                    </span>
                        <h4>Andrew Johanson</h4>
                        </div>
                        <div class="item">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minus, dicta atque. Voluptas illum quasi asperiores autem unde cupiditate temporibus quisquam iste rem dignissimos. Commodi placeat, quis omnis inventore asperiores sit.</p>
                        <span class="iconic">
                            <span class="ti-quote-left"></span>
                        </span>
                        <h4>Louis Herreira</h4>
                        </div>
                        <div class="item">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minus, dicta atque. Voluptas illum quasi asperiores autem unde cupiditate temporibus quisquam iste rem dignissimos. Commodi placeat, quis omnis inventore asperiores sit.</p>
                        <span class="iconic">
                            <span class="ti-quote-left"></span>
                        </span>
                        <h4>Patrice Clark</h4>
                        </div>
                    </div>
                </div> <!-- End testimonial -->


                    <!-- Page Blog -->
                <div class="vg-page page-blog" id="blog">
                    <h1 class="text-center text-light  wow fadeInUp btn-theme ">Latest Post</h1>
                    <div class="container">
                        <div class="row post-grid">

                            @foreach ($post as $item)

                                <div class="col-md-6 col-lg-4 wow fadeInUp">
                                    <div class="card">
                                        <div class="img-place">
                                            <img src="{{URL::asset($item->photo)}}" alt="">
                                        </div>
                                        <div class="caption">
                                            @foreach ($tags as $item1)
                                                @foreach ($item->tag as $item2)
                                                    @if ($item2->id == $item1->id)
                                                    <button disabled="disabled" class="btn btn-theme btn-sm" style="border-radius:20px;font-size:75%;padding:2% ">{{$item1->tag}}</button>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                                    <br>
                                            <a href="{{route('post.show',['slug'=>$item->slug])}}" class="post-category">{{$item->title}}</a>
                                            @if ($item->created_at == $item->updated_at)
                                            <p class="card-text"><small class="text-muted">Last updated : {{$item->updated_at->diffForhumans()}}</small></p>
                                            @else
                                            <p class="card-text"><small class="text-muted">Created at : {{$item->created_at->diffForhumans()}}</small></p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="col-12 text-center py-3 wow fadeInUp">
                                <a href="{{route('posts')}}" class="btn btn-theme">See All Post</a>
                            </div>
                        </div>
                    </div>
                </div> <!-- End page blog -->


                    <!-- Page Service -->
                <div class="vg-page page-service" id="services">
                    <h1 class="text-center text-light  wow fadeInUp btn-theme ">About App</h1>
                    <div class="container">
                        <div class="row">

                            <div class="col-md-6 col-lg-4 wow fadeInUp">
                                <div class="card card-body">
                                    <div class="iconic">
                                        <span class="ti-layout"></span>
                                    </div>
                                    <h4 class="fg-theme">Beauty Design</h4>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                                    <a href="#" class="btn btn-theme btn-rounded">Read More</a>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4 wow fadeInUp">
                                <div class="card card-body">
                                    <div class="iconic">
                                        <span class="ti-announcement"></span>
                                    </div>
                                    <h4 class="fg-theme">Perfect Community</h4>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                                    <a href="#" class="btn btn-theme btn-rounded">Read More</a>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4 wow fadeInUp">
                                <div class="card card-body">
                                    <div class="iconic">
                                        <span class="ti-desktop"></span>
                                    </div>
                                    <h4 class="fg-theme">Eazy To Use</h4>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                                    <a href="#" class="btn btn-theme btn-rounded">Read More</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div> <!-- End page services -->

                    <!-- Page counter -->
                <div class="vg-page page-funfact" style="background-image: url(../assets/img/bg_banner.jpg);">
                    <div class="container">
                        <div class="row section-counter">
                            <div class="col-md-6 col-lg-3 py-4 wow fadeIn">
                                @php
                                    $admin=0
                                @endphp
                                @foreach ($users as $user)
                                    @if ($user->level == 1)
                                        @php
                                            $admin++
                                        @endphp
                                    @endif
                                @endforeach
                                <h1 class="number" data-number="{{$admin}}">{{$admin}}</h1>
                                <span>Admins</span>
                            </div>
                            <div class="col-md-6 col-lg-3 py-4 wow fadeIn">
                                @php
                                    $user=count($users);
                                @endphp
                                <h1 class="number" data-number="{{$user}}">{{$user}}</h1>
                                <span>Users</span>
                            </div>

                            <div class="col-md-6 col-lg-1 py-4 wow fadeIn">
                                @php
                                $post=count($posts);
                                @endphp
                                <h1 class="number" data-number="{{$post}}">{{$post}}</h1>
                                <span>Posts</span>
                            </div>

                            <div class="col-md-6 col-lg-2 py-4 wow fadeIn">
                                @php
                                $Comment=count($Comments);
                                @endphp
                                <h1 class="number" data-number="{{$Comment}}">{{$Comment}}</h1>
                                <span>Comments</span>
                            </div>

                            <div class="col-md-6 col-lg-3 py-4 wow fadeIn">
                                @php
                                $tag=count($tags);
                                @endphp
                                <h1 class="number" data-number="{{$tag}}">{{$tag}}</h1>
                                <span>Interests</span>
                            </div>

                        </div>
                    </div>
                </div><!-- End page counter -->


            </div> <!-- End main wrapper -->
        @endguest

    @endsection
