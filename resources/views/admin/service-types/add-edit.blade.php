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
                                    <h4 class="card-title">Service Type Add/Edit</h4>
                                </div>
                                <div class="card-body">

                                    @if(isset($service_type))
                                        {!! Form::model($service_type, array('route' => array('service-types.update', $service_type->id),'id' => 'jquery-service_type-form', 'class' => 'jquery-validate-form')) !!}
                                        {{ method_field('PATCH') }}
                                        {!! Form::hidden('id', isset($service_type) ? $service_type->id : null) !!}
                                    @else
                                        {!! Form::open(array('route' => 'service-types.store', 'autocomplete' => 'off','id' => 'jquery-service_type-form', 'class' => 'jquery-validate-form')) !!}
                                    @endif
                                    <div class="row">
                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                {!! Form::label('name', 'Name:') !!}
                                                {!! Form::text('service_type[name]', isset($service_type) ? $service_type->name : null, array('class' => 'form-control noSpace required')) !!}
                                                @error('service_type.name')
                                                <span class="invalid-feedback" state="alert">
                                                  <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="row">
                                        {!! Form::submit('Submit', array('class' => 'btn round btn-primary')) !!}
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
    @include('admin.partials._session-message')
    <script src="{{asset('admin/js/scripts/pages/service-types/add-edit.js')}}"></script>
@endsection
