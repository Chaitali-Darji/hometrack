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
                      <h4 class="card-title">General Settings</h4>
                    </div>
                    <div class="card-body">
                     @include('admin.partials._session-message')

                        {!! Form::open(array('route' => 'settings.setting-change', 'autocomplete' => 'off','id' => 'jquery-setting-form','files' => true)) !!}
                          <div class="row">
                            <div class="col-md-6">
                              <fieldset class="form-group">
                                {!! Form::label('name', 'Site Name:') !!}
                                {!! Form::text('setting[name]', isset($settings['name']) ? $settings['name'] : null, array('class' => 'form-control')) !!}
                                 @error('setting[name]')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </fieldset>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">

                              <fieldset class="form-group">
                                {!! Form::label('site Admin Logo', 'Site Admin Logo:') !!}
                                <div class="custom-file">
                                  {!! Form::file('admin_logo', null, array('class' => 'custom-file-input')) !!}
                                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                              </fieldset>
                            </div>

                            <div class="col-md-6">
                              <label></label>
                              <div class="brand-logo">
                                <img class="logo" src="{{  config('settings.admin_logo') ? asset(config('constants.SETTING_IMAGE_URL').config('settings.admin_logo')) : asset('admin/images/logo/hometrack_admin_logo.png')}}" alt="avatar" height="26" width="185">
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <fieldset class="form-group">
                                <label for="basicInputFile">Site Auth Logo</label>
                                <div class="custom-file">
                                  {!! Form::file('admin_auth_logo', null, array('class' => 'custom-file-input')) !!}
                                  <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                                </div>
                              </fieldset>
                            </div>
                            <div class="col-md-6">
                              <div class="row">
                                <div class="col-md-6">
                                  <label></label>
                                  <img class="img-fluid" src="{{ config('settings.admin_auth_logo') ? asset(config('constants.SETTING_IMAGE_URL').config('settings.admin_auth_logo')) : asset('admin/images/logo/logo.png')}}" alt="avatar" alt="Logo">
                                </div>
                              </div>
                          </div>
                          <div class="row">
                              {!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}
                              {!! link_to_route('settings.index', 'Cancel', null, array('class' => 'btn')) !!}
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
    <script src="{{asset('admin/js/scripts/pages/settings/general-setting.js')}}"></script>
@endsection