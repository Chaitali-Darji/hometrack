@extends('layouts.auth.main')

@section('content')

    <section class="row flexbox-container">
        <div class="col-xl-7 col-md-9 col-10  px-0">
            <div class="card bg-authentication mb-0">
                <div class="row m-0">
                    <!-- left section-forgot password -->
                    <div class="col-md-6 col-12 px-0">
                        <div class="card disable-rounded-right mb-0 p-2">
                            <div class="card-header pb-1">
                                <div class="card-title">
                                    <h4 class="text-center mb-2">{{ __('Reset Password') }}</h4>
                                </div>
                            </div>
                            <!-- <div class="form-group d-flex justify-content-between align-items-center mb-2">
                                <div class="text-left">
                                    <div class="ml-3 ml-md-2 mr-1">
                                        <a href="{{route('index')}}"
                                            class="card-link btn btn-outline-primary text-nowrap">Sign in
                                        </a>
                                    </div>
                                </div>
                            </div> -->
                            <div class="card-body">
                            <form method="POST" class="mb-2" action="{{ route('password.update') }}">
                                @csrf

                                <input type="hidden" name="token" value="{{ $token }}">
                                    <div class="form-group mb-2">
                                        <label class="text-bold-600" for="exampleInputEmailPhone1">Email Address</label>
                                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmailPhone1"
                                            placeholder="Email" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-2">
                                        <label class="text-bold-600" for="exampleInputPassword">Password</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-2">
                                        <label class="text-bold-600" for="exampleInputPassword">Confirm Password</label>
                                        <input id="password" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="password_confirmation">
                                    </div>

                                    <button type="submit" class="btn btn-primary glow position-relative w-100">Reset Password<i id="icon-arrow" class="bx bx-right-arrow-alt"></i></button>
                                </form>
                                <div class="text-center mb-2">
                                    <a href="{{route('index')}}">
                                        <small class="text-muted">I remembered my password</small>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- right section image -->
                    <div class="col-md-6 d-md-block d-none text-center align-self-center">
                    <img class="img-fluid" src="{{asset('admin/images/logo/logo.png')}}" alt="Logo">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection