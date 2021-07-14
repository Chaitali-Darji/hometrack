@extends('layouts.auth.main')

@section('content')
    <div class="col-md-12 col-12 px-0">
        <div class="card disable-rounded-right mb-0  h-100 d-flex justify-content-center">
            <div class="card-header pb-1">
                <div class="card-title text-center">
                    <h4 class="text-center mb-2">Sign In to Continue</h4>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group mb-50">
                        <div class="form-label-group position-relative has-icon-left">
                            <label class="text-bold-600" for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control required @error('email') is-invalid @enderror"
                                   id="exampleInputEmail1"
                                   placeholder="Email address" name="email" value="{{ old('email') }}"
                                   autocomplete="email" autofocus>
                            <div class="form-control-position">
                                <i class="bx bx-mail-send"></i>
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group position-relative has-icon-left">
                            <label class="text-bold-600" for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                   id="exampleInputPassword1"
                                   placeholder="Password" name="password" required autocomplete="current-password">
                            <div class="form-control-position">
                                <i class="bx bx-lock"></i>
                            </div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group d-flex flex-md-row flex-column justify-content-between align-items-center">
                        <div class="text-left">
                            <div class="checkbox checkbox-sm">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember"
                                       id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="checkboxsmall" for="exampleCheck1">
                                    <small>Keep me logged
                                        in
                                    </small>
                                </label>
                            </div>
                        </div>
                        <div class="text-right">
                            <a href="{{ route('password.request') }}" class="card-link">
                                <small>Forgot Password?</small>
                            </a>
                        </div>
                    </div>
                    <button type="submit" class="btn round btn-primary glow w-100 position-relative">Login<i
                                id="icon-arrow" class="bx bx-right-arrow-alt"></i></button>
                </form>
                <hr>
            </div>
        </div>
    </div>
@endsection