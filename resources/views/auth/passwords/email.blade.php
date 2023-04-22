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
                            <form class="form-horizontal mt-3" method="POST" action="{{ route('password.email') }}">
                                @csrf
                                @if (session('status'))
                                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    we Are Sent <strong>E-mail</strong> {{ session('status') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
    
                                <div class="form-group mb-3">
                                    <div class="col-xs-12">
                                        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                                        
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
    
                                <div class="form-group pb-2 text-center row mt-3">
                                    <div class="col-12">
                                        <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Send Email</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- end cardbody -->
                </div>
                <!-- end card -->
            </div>
            <!-- end container -->
        </div>
        <!-- end -->
@endsection
