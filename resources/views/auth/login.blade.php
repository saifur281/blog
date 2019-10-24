@extends('layouts.login.app')

@section('content')



                    <form method="POST" action="{{ route('login') }}" id="login-form" class="form" >
                        @csrf
                        <h3 class="text-center text-info pt-5">Login form</h3>

                        <div class="form-group c ">
                            <label for="username" class="text-info text-left">{{ __('E-Mail Address') }}</label><br>

                                <input  id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>

                        <div class="form-group ">
                            <label for="password" class="text-info">Password:</label><br>


                                <input  id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>

                        <div class="form-group ">

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label text-info" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>

                        </div>

                        <div class="form-group ">

                                <button type="submit" class="btn btn-info btn-md">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link text-info" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif

                        </div>


                    </form>





<br><br><br>

@endsection
