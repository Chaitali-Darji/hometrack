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
                                    <h4 class="card-title text-hena">General Settings</h4>

                                </div>
                                <div class="card-body">
                                    {!! Form::open(array('route' => 'settings.setting-change', 'autocomplete' => 'off','id' => 'validate-form','files' => true, 'class' => 'jquery-validate-form')) !!}

                                    <div class="row">
                                        <div class="col-md-3 ">
                                            <fieldset class="form-group">
                                                {!! Form::label('setting.name', 'Site Name:') !!}
                                                <div class="form-label-group position-relative has-icon-left">
                                                    {!! Form::text('setting[name]', $settings['name'] ?? null, array('class' => 'form-control noSpace required','placeholder'=>"Enter Site Name")) !!}
                                                    <div class="form-control-position">
                                                        <i class="bx bx-globe"></i>
                                                    </div>
                                                    @error('setting[name]')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-3">
                                            <fieldset class="form-group">
                                                {!! Form::label('site Admin Logo', 'Site Admin Logo:') !!}
                                                <div class="custom-file">
                                                    {!! Form::file('admin_logo',  array('class' => 'custom-file-input file','id'=>'inputGroupFile01','accept'=>'image/*')) !!}
                                                    <label class="custom-file-label" for="inputGroupFile01">Choose
                                                        file</label>
                                                    @error('admin_logo')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-3 ">
                                            <label></label>
                                            <div class="brand-logo">
                                                <img class="logo"
                                                     src="{{  config('settings.admin_logo') ? asset(config('constants.SETTING_IMAGE_URL').config('settings.admin_logo')) : asset('admin/images/logo/hometrack_admin_logo.png')}}"
                                                     alt="avatar" height="26" width="185">
                                            </div>
                                        </div>


                                        <div class="col-md-3 ">
                                            <button type="submit" class="btn round btn-hena mt-2">Submit</button>
                                        </div>



                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 ">
                                            <fieldset class="form-group">
                                                {!! Form::label('setting.theme_color', 'Theme Color:') !!}
                                                <div class="form-label-group position-relative has-icon-left">
                                                    {!! Form::color('setting[theme_color]', $settings['theme_color'] ?? null, array('class' => 'form-control','placeholder'=>"Choose Color")) !!}
                                                    <div class="form-control-position">
                                                        <i class="bx bx-paint-roll"></i>
                                                    </div>
                                                    @error('setting[theme_color]')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-3">
                                            <fieldset class="form-group">
                                                <label for="basicInputFile">Site Auth Logo</label>
                                                <div class="custom-file">
                                                    {!! Form::file('admin_auth_logo', array('class' => 'custom-file-input file','id'=>'inputGroupFile02','accept'=>'image/*')) !!}
                                                    <label class="custom-file-label" for="inputGroupFile02">Choose
                                                        file</label>
                                                    @error('admin_auth_logo')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-3">
                                            <label></label>
                                                <div class="brand-logo">

                                                    <img class="logo"
                                                         src="{{ config('settings.admin_auth_logo') ? asset(config('constants.SETTING_IMAGE_URL').config('settings.admin_auth_logo')) : asset('admin/images/logo/logo.png')}}"
                                                         alt="avatar" height="26" width="185">
                                                </div>
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
    @include('admin.partials._session-message')
    <script src="{{asset('admin/js/scripts/pages/settings/general-setting.js')}}"></script>
@endsection
