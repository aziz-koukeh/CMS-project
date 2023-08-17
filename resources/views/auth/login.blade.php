@include('auth.includes.header')

    <!-- partial:index.partial.html -->
    <div class="container">
    <section id="formHolder">

        <div class="row">

            <!-- Brand Box -->
            <div class="col-sm-6 brand">
                <a href="#" class="logo">320 <span>.</span></a>
                <div class="spinner-border text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>

                <div class="heading">
                <h2>Blog Test</h2>
                <p>Your Right Choice</p>
                </div>

            </div>


            <!-- Form Box -->
            <div class="col-sm-6 form">

                <!-- Login Form -->
                <div class="login form-peice ">

                    <form class="login-form" action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email Adderss</label>
                            <input type="email" name="email" class=" email @error('email') is-invalid @enderror" id="email" required>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="loginPassword">Password</label>
                            <input type="password" name="password" class="@error('password') is-invalid @enderror"  id="loginPassword" required>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="CTA">
                            <input type="submit" value="Login"  id="submit">
                            <a href="{{route('register')}}" >I'm New</a>

                        </div>

                    </form>
                </div><!-- End Login Form -->

                <!-- Signup Form -->
                <div class="signup form-peice switched">

                    <form class="signup-form" method="post" action="{{route('register')}}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" name="name" id="name" class="name @error('name') is-invalid @enderror">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            <span class="error"></span>
                        </div>

                        <div class="form-group">
                            <label for="email">Email Adderss</label>
                            <input type="email" name="email" id="email" class="email @error('email') is-invalid @enderror"  required autocomplete="email">
                            @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            <span class="error"></span>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone Number - <small>Optional</small></label>
                            <input type="text" name="phone" id="phone">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="pass @error('password') is-invalid @enderror" required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <span class="error"></span>
                        </div>

                        <div class="form-group">
                            <label for="passwordCon">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="passwordCon" class="passConfirm" required autocomplete="new-password">
                            <span class="error"></span>
                        </div>

                        <div class="CTA">
                            <input type="submit" value="Signup Now" id="submit">
                            <a href="{{ route('login') }}" >I have an account</a>
                        </div>
                    </form>
                </div><!-- End Signup Form -->
            </div>
        </div>

    </section>


    </div>

@include('auth.includes.footer')

    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Login') }}</div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Login') }}
                                            </button>

                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
