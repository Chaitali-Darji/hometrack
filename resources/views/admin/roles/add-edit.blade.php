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
                      <h4 class="card-title">Role Add/Edit</h4>
                    </div>
                    <div class="card-body">
                     @include('admin.partials._session-message')

                      @if(isset($role))
                         {!! Form::model($role, array('route' => array('roles.update', $role->id),'id' => 'jquery-role-form', 'class' => 'jquery-validate-form')) !!}
                         {{ method_field('PATCH') }}
                         {!! Form::hidden('id', isset($client) ? $role->id : null) !!}
                      @else
                        {!! Form::open(array('route' => 'roles.store', 'autocomplete' => 'off','id' => 'jquery-role-form', 'class' => 'jquery-validate-form')) !!}
                      @endif
                          <div class="row">
                            <div class="col-md-6">
                              <fieldset class="form-group">
                                {!! Form::label('name', 'Name:') !!}
                                {!! Form::text('role[name]', isset($role) ? $role->name : null, array('class' => 'form-control required')) !!}
                                 @error('role.name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </fieldset>

                              <fieldset class="form-group">
                                {!! Form::label('permissions', 'Permissions:') !!}<br/>
                              </fieldset>

                              <div class="row">
                                @foreach($modules as $key => $module)
                                <div class="col-md-3">
                                  <fieldset class="form-group">
                                    <div class="checkbox">
                                      {!! Form::checkbox('permissions[]', $key, (isset($role) && array_search($key, array_column($role->modules->toArray(), 'id')) !== FALSE) ? true : false, array('class' => 'checkbox-input', 'id' => 'checkbox'.$key)) !!}
                                      <label for="checkbox{{$key}}">{{$module}}</label>
                                    </div>
                                  </fieldset>
                                </div>
                                @endforeach
                              </div>

                            </div>
                          </div>
                          <div class="row">
                            {!! Form::submit('Submit', array('class' => 'btn round btn-primary')) !!}
                            {!! link_to_route('roles.index', 'Cancel', null, array('class' => 'btn')) !!}
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
    <script src="{{asset('admin/js/scripts/pages/roles/add-edit.js')}}"></script>
@endsection
