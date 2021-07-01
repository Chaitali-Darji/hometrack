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

                        {!! Form::open(array('route' => 'settings.setting-change', 'autocomplete' => 'off','id' => 'jquery-setting-form')) !!}
                          <div class="row">
                            <div class="col-md-6">
                              <fieldset class="form-group">
                                {!! Form::label('name', 'Site Name:') !!}
                                {!! Form::text('setting[name]', isset($settings) ? $settings['name'] : null, array('class' => 'form-control')) !!}
                                 @error('setting[name]')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </fieldset>

                              <fieldset class="form-group">
                                <div class="dropzone dropzone-area" id="dpz-single-file">
                                  <div class="dz-message">Drop Files Here To Upload</div>
                                </div>
                              </fieldset>
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
    <script src="{{asset('admin/js/scripts/pages/settings/add-edit.js')}}"></script>
@endsection