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
                                    <h4 class="card-title">Region Add/Edit</h4>
                                </div>
                                <div class="card-body">
                                    @include('admin.partials._session-message')

                                    @if(isset($region))
                                        {!! Form::model($region, array('route' => array('regions.update', $region->id),'id' => 'jquery-region-form', 'class' => 'jquery-validate-form')) !!}
                                        {{ method_field('PATCH') }}
                                        {!! Form::hidden('id', isset($client) ? $region->id : null) !!}
                                    @else
                                        {!! Form::open(array('route' => 'regions.store', 'autocomplete' => 'off','id' => 'jquery-region-form', 'class' => 'jquery-validate-form')) !!}
                                    @endif
                                    <div class="row">
                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                {!! Form::label('name', 'Name:') !!}
                                                {!! Form::text('region[name]', isset($region) ? $region->name : null, array('class' => 'form-control noSpace required')) !!}
                                                @error('region.name')
                                                <span class="invalid-feedback" region="alert">
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
    <script src="{{asset('admin/js/scripts/pages/regions/add-edit.js')}}"></script>
@endsection
