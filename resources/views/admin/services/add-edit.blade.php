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
                                    <h4 class="card-title">Service Add/Edit</h4>
                                </div>
                                <div class="card-body">
                                    @include('admin.partials._session-message')

                                    @if(isset($service))
                                        {!! Form::model($service, array('route' => array('services.update', $service->id),'id' => 'jquery-service-form', 'class' => 'jquery-validate-form')) !!}
                                        {{ method_field('PATCH') }}
                                        {!! Form::hidden('id', isset($service) ? $service->id : null) !!}
                                    @else
                                        {!! Form::open(array('route' => 'services.store', 'autocomplete' => 'off','id' => 'jquery-service-form', 'class' => 'jquery-validate-form')) !!}
                                    @endif
                                    <div class="row">
                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                {!! Form::label('name', 'Name:') !!}
                                                {!! Form::text('service[name]', isset($service) ? $service->name : null, array('class' => 'form-control noSpace required')) !!}
                                                @error('service.name')
                                                <span class="invalid-feedback" state="alert">
                                                  <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </fieldset>

                                            <fieldset class="form-group">
                                                {!! Form::label('Service Type', 'Service Type:') !!}
                                                {!! Form::select('service[service_type_id]', $service_types, isset($service) ? $service->service_type_id : null, array('class' => 'form-control noSpace required')) !!}
                                                @error('service.service_type_id')
                                                <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </fieldset>

                                            <fieldset class="form-group">
                                                {!! Form::label('Description', 'Description:') !!}
                                                {!! Form::textarea('service[description]', isset($service) ? $service->description : null, array('class' => 'form-control noSpace required')) !!}
                                                @error('service.description')
                                                <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </fieldset>

                                            <fieldset class="form-group">
                                                {!! Form::label('Youtube or Vimeo Link', 'Youtube or Vimeo Link:') !!}
                                                {!! Form::text('service[youtube_or_vimeo_link]', isset($service) ? $service->youtube_or_vimeo_link : null, array('class' => 'form-control')) !!}
                                                @error('service.youtube_or_vimeo_link')
                                                <span class="invalid-feedback" state="alert">
                                                  <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </fieldset>

                                            <fieldset class="form-group">
                                                {!! Form::label('Display Section', 'Display Section:') !!}
                                                {!! Form::select('service[display_section]', ['photography','listing','marketing','none'], isset($service) ? $service->display_section : null, array('class' => 'form-control noSpace required')) !!}
                                                @error('service.display_section')
                                                <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </fieldset>

                                            <fieldset class="form-group">
                                                <div class="checkbox">
                                                    {!! Form::checkbox('service[notes_required]', 1, (isset($service) && $service->notes_required == TRUE) ? true : false, array('class' => 'checkbox-input', 'id' => 'checkboxNotesRequired')) !!}
                                                    <label for="checkboxNotesRequired">Notes Required</label>
                                                </div>
                                                @error('service.display_section')
                                                <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </fieldset>

                                            <fieldset class="form-group">
                                                {!! Form::label('Display Icon', 'Display Icon:') !!}
                                                <div class="custom-file">
                                                  {!! Form::file('display_icon', null, array('class' => 'custom-file-input file')) !!}
                                                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                </div>
                                            </fieldset>

                                        </div>

                                        <div class="col-md-6">
                                            {!! Form::label('Service Check Lists', 'Service Check Lists:') !!}

                                            @if(empty($service->check_lists))
                                                <div class="repeater-default">
                                                    <div data-repeater-list="check_lists">
                                                        <div data-repeater-item>
                                                            <div class="row justify-content-between">
                                                                <div class="col-md-4 col-sm-12 form-group">
                                                                    {!! Form::label('Title', 'Title:') !!}                                                                
                                                                    {!! Form::text('check_lists[title][]', null, array('class' => 'form-control')) !!}
                                                                </div>
                                                                <div class="col-md-4 col-sm-12 form-group">

                                                                    {!! Form::label('Description', 'Description:') !!}
                                                                    {!! Form::text('check_lists[description][]', null, array('class' => 'form-control noSpace required')) !!}
                                                                </div>
                                                                <div
                                                                    class="col-md-4 col-sm-12 form-group d-flex align-items-center pt-2">
                                                                    <button class="btn btn-danger text-nowrap px-1"
                                                                            data-repeater-delete type="button"><i
                                                                            class="bx bx-x"></i>
                                                                        Delete
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col p-0">
                                                            <button class="btn btn-primary" data-repeater-create
                                                                    type="button">
                                                                <i class="bx bx-plus"></i>
                                                                Add
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                    <div class="repeater-default">
                                                    <div data-repeater-list="check_lists">
                                                @foreach(json_decode($service->check_lists) as $check_lists)

                                                        <div data-repeater-item>
                                                            <div class="row justify-content-between">
                                                                <div class="col-md-4 col-sm-12 form-group">
                                                                    {!! Form::label('Title', 'Title:') !!}                                                                
                                                                    {!! Form::text('check_lists[title][]', $check_lists->title, array('class' => 'form-control')) !!}
                                                                </div>
                                                                <div class="col-md-4 col-sm-12 form-group">

                                                                    {!! Form::label('Description', 'Description:') !!}
                                                                    {!! Form::text('check_lists[description][]', $check_lists->description, array('class' => 'form-control noSpace required')) !!}
                                                                </div>
                                                                <div
                                                                    class="col-md-4 col-sm-12 form-group d-flex align-items-center pt-2">
                                                                    <button class="btn btn-danger text-nowrap px-1"
                                                                            data-repeater-delete type="button"><i
                                                                            class="bx bx-x"></i>
                                                                        Delete
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                        </div>

                                                @endforeach
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col p-0">
                                                            <button class="btn btn-primary" data-repeater-create
                                                                    type="button">
                                                                <i class="bx bx-plus"></i>
                                                                Add
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>

                                    </div>
                                    <div class="row">
                                        {!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}
                                        {!! link_to_route('services.index', 'Cancel', null, array('class' => 'btn')) !!}
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
    <script src="{{asset('admin/js/scripts/pages/service-types/add-edit.js')}}"></script>
@endsection
