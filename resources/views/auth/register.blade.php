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
                <div class="success-msg">
                    <p>Great! You are one of our members now</p>
                    <a href="{{route('posts') }}" class="profile">Your Profile</a>
                </div>
                </div>
                <!-- Form Box -->
                <div class="col-sm-6 form">
                <!-- Login Form -->
                <div class="login form-peice switched">
                    <form class="login-form" action="{{ route('login') }}" method="post">
                    @csrf
                        <div class="form-group">
                            <label for="loginemail">Email Adderss</label>
                            <input type="email" name="email" class="@error('email') is-invalid @enderror" id="loginemail" required>
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
                <div class="signup form-peice ">
                    <form method="post" action="{{route('register')}}">
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
