@extends('layouts.admin.main')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-body">
                <section id="basic-input">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">{{(isset($user)) ? 'Edit'  : 'Create'}} User</h4>
                                    {!! link_to_route('users.index', 'Back', null, array('class' => 'btn btn-dark round pull-right')) !!}

                                </div>
                                <div class="card-body">


                                    @if(isset($user))
                                        {!! Form::model($user, array('route' => array('users.update', $user->id), 'class' => 'validate-form')) !!}
                                        {{ method_field('PATCH') }}
                                        {!! Form::hidden('id', isset($user) ? $user->id : null) !!}

                                    @else
                                        {!! Form::open(array('route' => 'users.store', 'autocomplete' => 'off', 'id' => 'validate-form', 'class' => 'jquery-validate-form')) !!}
                                        {{ method_field('POST ') }}
                                    @endif
                                    <div class="row">
                                        <div class="col-md-4">
                                            <fieldset class="form-group">
                                                {!! Form::label('name', 'Name:') !!}
                                                <div class="form-label-group position-relative has-icon-left">
                                                    {!! Form::text('user[name]', isset($user) ? $user->name : null, array('class' => 'form-control noSpace required','placeholder'=>'Enter Name')) !!}
                                                    <div class="form-control-position">
                                                        <i class="bx bxs-user-account"></i>
                                                    </div>
                                                @error('user.name')
                                                <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4">
                                            <fieldset class="form-group">
                                                {!! Form::label('email', 'Email:') !!}<br/>
                                                <div class="form-label-group position-relative has-icon-left">
                                                    {!! Form::email('user[email]',  isset($user) ? $user->email : null, array('class' => 'form-control email noSpace required','placeholder'=>'Enter Email')) !!}
                                                    <div class="form-control-position">
                                                        <i class="bx bx-mail-send"></i>
                                                    </div>
                                                @error('user.email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4">
                                            <fieldset class="form-group">
                                                {!! Form::label('password', 'Password:') !!}<br/>
                                                <div class="form-label-group position-relative has-icon-left">
                                                    {{ Form::password('user[password]', array('id' => 'password', "class" => "form-control noSpace required","minlength"=>8,'placeholder'=>'Enter Password')) }}
                                                    <div class="form-control-position">
                                                        <i class="bx bx-lock"></i>
                                                    </div>
                                                    @error('user.password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4">
                                            <fieldset class="form-group">
                                                {!! Form::label('role', 'Roles:') !!}<br/>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-12 row">

                                            @foreach($roles as $key => $role)
                                                <fieldset class="form-group col-md-2">
                                                    <div class="checkbox">
                                                        {!! Form::checkbox('roles[]', $key, (isset($user) && array_search($key, array_column($user->roles->toArray(), 'id')) !== FALSE) ? true : false, array('class' => 'checkbox-input', 'id' => 'checkbox'.$key)) !!}
                                                        <label for="checkbox{{$key}}">{{$role}}</label>
                                                    </div>
                                                </fieldset>
                                            @endforeach

                                        </div>
                                    </div>
                                    <div class="row pull-right">
                                        <button type="submit" class="btn round btn-hena">Submit</button>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- END: Content-->
@endsection

@section('page-script')
    @include('admin.partials._session-message')
    <script src="{{asset('admin/js/scripts/pages/users/add-edit.js')}}"></script>
@endsection
