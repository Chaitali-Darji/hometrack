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
                                    <h4 class="card-title text-hena">{{(isset($service) ? 'Edit' : 'Create')}}
                                        Service </h4>
                                    {!! link_to_route('services.index', 'Back', null, array('class' => 'btn btn-dark round mr-1 mb-1')) !!}
                                </div>
                                <div class="card-body">

                                    @if(isset($service))
                                        {!! Form::model($service, array('route' => array('services.update', $service->id),'id' => 'validate-form','files' => true, 'class' => 'jquery-validate-form')) !!}
                                        {{ method_field('PATCH') }}
                                        {!! Form::hidden('id', isset($service) ? $service->id : null) !!}
                                    @else
                                        {!! Form::open(['route' => 'services.store', 'autocomplete' => 'off', 'id' => 'validate-form', 'class' => 'jquery-validate-form','files' => true]) !!}
                                        {{ method_field('POST') }}
                                    @endif

                                    <div class="row">
                                        <div class="col-md-6">

                                            <fieldset class="form-group">
                                                {!! Form::label('Region', 'Region:') !!}

                                                <div class="form-label-group position-relative dynamic-regions">
                                                    {!! Form::select('region_id[]',$regions,isset($service) ? explode(',',$service->region_id) : null, array('class' => 'form-control required parent_filter_select2','id' => 'parent_filter_select2', 'autofocus'=>'autofocus', 'multiple'=>"multiple")) !!}
                                                    @error('region_id')
                                                    <span class="invalid-feedback" role="alert"></span>
                                                    @enderror
                                                </div>

                                                <a href="{{route('regions.create')}}" class="text-hena pull-right add-region">Add New Region</a>
                                            </fieldset>

                                            <fieldset class="form-group">
                                                {!! Form::label('name', 'Name:') !!}
                                                <div class="form-label-group position-relative has-icon-left">
                                                    {!! Form::text('service[name]', isset($service) ? $service->name : null, array('class' => 'form-control noSpace required','placeholder'=>'Enter Name','tab'=>1)) !!}
                                                    <div class="form-control-position">
                                                        <i class="bx bx-user-circle"></i>
                                                    </div>
                                                    @error('service.name')
                                                        <span class="invalid-feedback" role="alert"></span>
                                                    @enderror
                                                </div>
                                            </fieldset>

                                            <fieldset class="form-group">
                                                {!! Form::label('Service Type', 'Service Type:') !!}

                                                <div class="form-label-group position-relative has-icon-left dynamic-service-types">
                                                    {!! Form::select('service[service_type_id]',['' => 'Select Service Type']+$service_types,isset($service) ? $service->service_type_id : null, array('class' => 'form-control required','autofocus'=>'autofocus')) !!}
                                                    <div class="form-control-position">
                                                        <i class="bx bx-user-circle"></i>
                                                    </div>
                                                    @error('service.service_type_id')
                                                    <span class="invalid-feedback" role="alert"></span>
                                                    @enderror
                                                </div>

                                                <a href="{{route('service-types.create')}}" class="text-hena pull-right add-service-type">Add New Service Type</a>
                                            </fieldset>

                                            <fieldset class="form-group">
                                                {!! Form::label('Description', 'Description:') !!}

                                                <div class="form-label-group position-relative has-icon-left">
                                                    {!! Form::textarea('service[description]', isset($service) ? $service->description : null, array('class' => 'form-control','autofocus'=>'autofocus')) !!}
                                                    <div class="form-control-position">
                                                        <i class="bx bxs-notepad"></i>
                                                    </div>
                                                    @error('service.description')
                                                    <span class="invalid-feedback" role="alert"></span>
                                                    @enderror
                                                </div>
                                            </fieldset>

                                            <fieldset class="form-group">
                                                {!! Form::label('Youtube or Vimeo Link', 'Youtube or Vimeo Link:') !!}

                                                <div class="form-label-group position-relative has-icon-left">
                                                    {!! Form::text('service[youtube_or_vimeo_link]', isset($service) ? $service->youtube_or_vimeo_link : null, array('class' => 'form-control noSpace required','placeholder'=>'Enter Youtube or Vimeo Link','tab'=>1)) !!}
                                                    <div class="form-control-position">
                                                        <i class="bx bx-link-external"></i>
                                                    </div>
                                                    @error('service.youtube_or_vimeo_link')
                                                    <span class="invalid-feedback" role="alert"></span>
                                                    @enderror
                                                </div>
                                            </fieldset>

                                            <fieldset class="form-group">
                                                {!! Form::label('Display Section', 'Display Section:') !!}

                                                <div class="form-label-group position-relative has-icon-left">
                                                    {!! Form::select('service[display_section]',['' => 'Select Display Section']+config('constants.DISPLAY_SECTION'),isset($service) ? $service->display_section : null, array('class' => 'form-control','autofocus'=>'autofocus')) !!}
                                                    <div class="form-control-position">
                                                        <i class="bx bx-user-circle"></i>
                                                    </div>
                                                    @error('service.display_section')
                                                    <span class="invalid-feedback" role="alert"></span>
                                                    @enderror
                                                </div>
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

                                                <div class="row">
                                                    <div class="custom-file col-sm-8" style="margin-left: 10px !important;">
                                                        {!! Form::file('display_icon',  array('class' => 'custom-file-input file','id'=>'inputGroupFile01','accept'=>'image/*')) !!}
                                                        <label class="custom-file-label" for="inputGroupFile01">Choose
                                                            file</label>
                                                        @error('display_icon')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="brand-logo col-md-3">
                                                        @if(isset($service) && !empty($service->display_icon))
                                                        <img class="logo"
                                                             src="{{ asset(config('constants.SERVICE_IMAGE_URL').$service->display_icon)}}"
                                                             alt="avatar" height="50" width="50">
                                                        @endif
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-6">
                                            {!! Form::label('Service Check Lists', 'Service Check Lists:') !!}

                                            @if(!isset($service) || empty($service->check_lists))
                                                <div class="repeater-default">
                                                    <div data-repeater-list="check_lists">
                                                        <div data-repeater-item>
                                                            <div class="row justify-content-between">
                                                                <div class="col-md-4 col-sm-12 form-group">
                                                                    {!! Form::label('Title', 'Title:') !!}
                                                                    <div class="form-label-group position-relative has-icon-left">
                                                                        {!! Form::text('check_lists[title][]', null, array('class' => 'form-control noSpace required','placeholder'=>'Enter Title','tab'=>1)) !!}
                                                                        <div class="form-control-position">
                                                                            <i class="bx bx-heading"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-12 form-group">
                                                                    {!! Form::label('Description', 'Description:') !!}
                                                                    <div class="form-label-group position-relative has-icon-left">
                                                                        {!! Form::text('check_lists[description][]', null, array('class' => 'form-control noSpace required','placeholder'=>'Enter Title','tab'=>1)) !!}
                                                                        <div class="form-control-position">
                                                                            <i class="bx bx-notepad"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="col-md-4 col-sm-12 form-group d-flex align-items-center pt-2">
                                                                    <button class="btn round btn-danger text-nowrap px-1"
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
                                                            <button class="btn round btn-hena" data-repeater-create
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
                                                                    <div class="form-label-group position-relative has-icon-left">
                                                                        {!! Form::text('check_lists[title][]', $check_lists->title, array('class' => 'form-control noSpace required','placeholder'=>'Enter Title','tab'=>1)) !!}
                                                                        <div class="form-control-position">
                                                                            <i class="bx bx-heading"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-12 form-group">
                                                                    {!! Form::label('Description', 'Description:') !!}
                                                                    <div class="form-label-group position-relative has-icon-left">
                                                                        {!! Form::text('check_lists[description][]', $check_lists->description, array('class' => 'form-control noSpace required','placeholder'=>'Enter Title','tab'=>1)) !!}
                                                                        <div class="form-control-position">
                                                                            <i class="bx bx-notepad"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="col-md-4 col-sm-12 form-group d-flex align-items-center pt-2">
                                                                    <button class="btn round btn-danger text-nowrap px-1"
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
                                                            <button class="btn round btn-hena" data-repeater-create
                                                                    type="button">
                                                                <i class="bx bx-plus"></i>
                                                                Add
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif


                                            {!! Form::label('Photos', 'Photos:') !!}

                                            @if(isset($photos) || empty($photos))
                                                <div class="repeater-default">
                                                    <div data-repeater-list="photos">
                                                        <div data-repeater-item>
                                                            <div class="row justify-content-between">
                                                                <div class="col-md-8 col-sm-12 form-group">
                                                                    {!! Form::label('', '') !!}
                                                                        {!! Form::file('image_name',  array('class' => 'form-control','accept'=>'image/*')) !!}
                                                                        @error('display_icon')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                </div>
                                                                <div class="col-md-4 col-sm-12 form-group d-flex align-items-center pt-2">
                                                                    <button class="btn round btn-danger text-nowrap px-1"
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
                                                            <button class="btn round btn-hena" data-repeater-create
                                                                    type="button">
                                                                <i class="bx bx-plus"></i>
                                                                Add
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="repeater-default">
                                                    <div data-repeater-list="photos">
                                                        @foreach($photos as $photo)
                                                            <div data-repeater-item>
                                                                <div class="row justify-content-between">
                                                                    <div class="col-md-5 col-sm-12 form-group">
                                                                        {!! Form::label('', '') !!}
                                                                        {!! Form::hidden('image_name_hidden', $photo->image_name) !!}
                                                                        {!! Form::file('image_name',  array('class' => 'form-control','accept'=>'image/*')) !!}
                                                                        @error('display_icon')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="brand-logo col-md-3">
                                                                        <img class="logo"
                                                                             src="{{ asset(config('constants.SERVICE_IMAGE_URL').$photo->image_name)}}"
                                                                             alt="avatar" height="50" width="50">
                                                                    </div>
                                                                    <div class="col-md-4 col-sm-12 form-group d-flex align-items-center pt-2">
                                                                        <button class="btn round btn-danger text-nowrap px-1"
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
                                                            <button class="btn round btn-hena" data-repeater-create
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
    <script src="{{asset('admin/js/scripts/pages/services/add-edit.js')}}"></script>
@endsection
