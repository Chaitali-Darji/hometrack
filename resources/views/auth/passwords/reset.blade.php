@extends('layouts.auth.main')

@section('content')

    <div class="col-md-12 col-12 px-0">
        <div class="card disable-rounded-right mb-0 p-2">
            <div class="card-header pb-1">
                <div class="card-title text-center  ">
                    <h4 class="text-center text-hena mb-2">{{ __('Reset Password') }}</h4>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" class="mb-2" id="validate-form" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group ">
                        <label class="text-bold-600" for="exampleInputEmailPhone1">Email Address</label>
                        <div class="form-label-group position-relative has-icon-left">
                            <input type="text"
                                   class="form-control required noSpace email @error('email') is-invalid @enderror"
                                   id="exampleInputEmailPhone1"
                                   placeholder="Enter Email" name="email" value="{{ $email ?? old('email') }}" required
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

                    <div class="form-group ">
                        <label class="text-bold-600" for="exampleInputPassword">Password</label>
                        <div class="form-label-group position-relative has-icon-left">
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror noSpace required"
                                   minlength="8" name="password" required
                                   autocomplete="new-password" placeholder="Enter New Password">
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

                    <div class="form-group">
                        <label class="text-bold-600" for="exampleInputPassword">Confirm Password</label>
                        <div class="form-label-group position-relative has-icon-left">
                            <input id="password" type="password"
                                   class="form-control required noSpace @error('password_confirmation') is-invalid @enderror"
                                   name="password_confirmation" required placeholder="Enter Confirm Password"
                                   autocomplete="password_confirmation">
                            <div class="form-control-position">
                                <i class="bx bx-lock"></i>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-hena glow round position-relative w-100">Reset Password<i
                                id="icon-arrow" class="bx bx-right-arrow-alt"></i></button>
                </form>
                <div class="text-center">
                    <a href="{{route('index')}}">
                        <small class="text-muted text-hena">I remembered my password</small>
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection