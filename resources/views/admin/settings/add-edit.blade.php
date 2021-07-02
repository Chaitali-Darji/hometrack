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
                                <label for="basicInputFile">Site Admin Logo</label>
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="inputGroupFile01" name="admin_logo">
                                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                              </fieldset>
                            </div>

                            <div class="col-md-6">
                              <label></label>
                              <div class="brand-logo">
                                <img class="logo" @if(!empty(config('settings.admin_logo'))) src="{{ asset(config('constants.SETTING_IMAGE_URL').config('settings.admin_logo'))}}" @else src="{{ asset('admin/images/logo/hometrack_admin_logo.png')}}" @endif alt="avatar" height="26" width="185">
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <fieldset class="form-group">
                                <label for="basicInputFile">Site Auth Logo</label>
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="inputGroupFile02" name="admin_auth_logo">
                                  <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                                </div>
                              </fieldset>
                            </div>
                            <div class="col-md-6">
                              <div class="row">
                                <div class="col-md-6">
                                  <label></label>
                                  <img class="img-fluid" @if(!empty(config('settings.admin_auth_logo'))) src="{{ asset(config('constants.SETTING_IMAGE_URL').config('settings.admin_auth_logo'))}}" @else src="{{asset('admin/images/logo/logo.png')}}" @endif alt="avatar" alt="Logo">
                                </div>
                              </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              {!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}
                              {!! link_to_route('settings.index', 'Cancel', null, array('class' => 'btn')) !!}
                            </div>
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