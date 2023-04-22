@extends('layouts.app')

@section('content')
<div class="bg-overlay"></div>
        <div class="wrapper-page">
            <div class="container-fluid p-0">
                <div class="card">
                    <div class="card-body">
    
                        <div class="text-center mt-4">
                            <div class="mb-3">
                                <a href="{{url('/')}}" class="auth-logo">
                                    <img src="{{asset('backend/assets/images/logo1.jpg')}}" height="30" class="logo-dark mx-auto" alt="">
                                    <img src="{{asset('backend/assets/images/logo1.jpg')}}" height="30" class="logo-light mx-auto" alt="">
                                </a>
                            </div>
                        </div>
    
                        <h4 class="text-muted text-center font-size-18"><b>Reset Password</b></h4>
    
                        <div class="p-3">

                            <form class="form-horizontal mt-3" method="POST" action="{{ route('password.update') }}">
                                @csrf

                                <input type="hidden" name="token" value="{{ $token }}">

    
                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input  type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                                        
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
    
                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                                            
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Password Confirmation">
                                            
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

    
                                <div class="form-group text-center row mt-3 pt-1">
                                    <div class="col-12">
                                        <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Reset Password</button>
                                    </div>
                                </div>
    

                            </form>
                            <!-- end form -->
                        </div>
                    </div>
                    <!-- end cardbody -->
                </div>
                <!-- end card -->
            </div>
            <!-- end container -->
        </div>
@endsection
