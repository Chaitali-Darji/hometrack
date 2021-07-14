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
                                    <h4 class="card-title">User Add/Edit</h4>
                                </div>
                                <div class="card-body">
                                    @include('admin.partials._session-message')

                                    @if(isset($user))
                                        {!! Form::model($user, array('route' => array('users.update', $user->id), 'class' => 'jquery-validate-form')) !!}
                                        {{ method_field('PATCH') }}
                                        {!! Form::hidden('id', isset($user) ? $user->id : null) !!}

                                    @else
                                        {!! Form::open(array('route' => 'users.store', 'autocomplete' => 'off', 'id' => 'jquery-user-form', 'class' => 'jquery-validate-form')) !!}
                                        {{ method_field('POST ') }}
                                    @endif
                                    <div class="row">
                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                {!! Form::label('name', 'Name:') !!}
                                                {!! Form::text('user[name]', isset($user) ? $user->name : null, array('class' => 'form-control required')) !!}
                                                @error('user.name')
                                                <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                                @enderror
                                            </fieldset>

                                            <fieldset class="form-group">
                                                {!! Form::label('email', 'Email:') !!}<br/>
                                                {!! Form::email('user[email]',  isset($user) ? $user->email : null, array('class' => 'form-control required')) !!}
                                                @error('user.email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </fieldset>

                                            <fieldset class="form-group">
                                                {!! Form::label('password', 'Password:') !!}<br/>
                                                {{ Form::password('user[password]', array('id' => 'password', "class" => "form-control")) }}
                                                @error('user.password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </fieldset>

                                            <fieldset class="form-group">
                                                {!! Form::label('roles', 'Roles:') !!}<br/>
                                            </fieldset>

                                            @foreach($roles as $key => $role)
                                                <fieldset class="form-group">
                                                    <div class="checkbox">
                                                        {!! Form::checkbox('roles[]', $key, (isset($user) && array_search($key, array_column($user->roles->toArray(), 'id')) !== FALSE) ? true : false, array('class' => 'checkbox-input', 'id' => 'checkbox'.$key)) !!}
                                                        <label for="checkbox{{$key}}">{{$role}}</label>
                                                    </div>
                                                </fieldset>
                                            @endforeach

                                        </div>
                                    </div>
                                    <div class="row">
                                        {!! Form::submit('Submit', array('class' => 'btn round btn-primary')) !!}
                                        {!! link_to_route('users.index', 'Cancel', null, array('class' => 'btn')) !!}
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
    <script src="{{asset('admin/js/scripts/pages/users/add-edit.js')}}"></script>
@endsection
