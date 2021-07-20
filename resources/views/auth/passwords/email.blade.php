@extends('layouts.auth.main')

@section('content')
    <div class="col-md-12 col-12 px-0">
        <div class="card disable-rounded-right mb-0 p-2">
            <div class="card-header pb-1">
                <div class="card-title">
                    <h4 class="text-center text-hena mb-2">Forgot Password?</h4>
                </div>
            </div>
            <div class="card-body">

                @if (session('status'))
                    <p class=" text-hena">{{ session('status') }}</p>
                @endif

                <form class="mb-2" method="POST" id="validate-form" action="{{ route('password.email') }}">
                    @csrf
                    <div class="form-group mb-2">
                        <div class="form-label-group position-relative has-icon-left">
                            <label class="text-bold-600" for="exampleInputEmailPhone1">Email Address</label>
                            <input type="text"
                                   class="form-control required noSpace email @error('email') is-invalid @enderror"
                                   id="exampleInputEmailPhone1"
                                   placeholder="Email" name="email" value="{{ old('email') }}"
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
                    <button type="submit" class="btn btn-hena round glow position-relative w-100">Send Password Reset
                        Link<i id="icon-arrow" class="bx bx-right-arrow-alt"></i></button>
                </form>
                <div class="text-center mb-2">
                    <a href="{{route('index')}}">
                        <small class="text-muted text-hena">I remembered my password</small>
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection