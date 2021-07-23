@extends('layouts.admin.main')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section id="basic-input">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title text-hena">{{(isset($pricing) ? 'Edit' : 'Create')}}
                                        Pricing </h4>
                                    {!! link_to_route('pricing.index', 'Back', null, array('class' => 'btn btn-dark round mr-1 mb-1')) !!}

                                </div>
                                <div class="card-body">

                                    @if(isset($pricing))
                                        {!! Form::model($pricing, array('route' => array('pricing.update', $pricing->id),'id' => 'validate-form')) !!}
                                        {{ method_field('PATCH') }}
                                        {!! Form::hidden('id', isset($pricing) ? $pricing->id : null) !!}
                                    @else
                                        {!! Form::open(['route' => 'pricing.store', 'autocomplete' => 'off', 'id' => 'validate-form', 'class' => 'jquery-validate-form']) !!}
                                        {{ method_field('POST') }}

                                    @endif
                                    <div class="row">

                                        <div class="col-md-3">
                                            <fieldset class="form-group">
                                                {!! Form::label('Type', 'Type:') !!}
                                                <div class="form-label-group position-relative has-icon-left">
                                                    {!! Form::select('pricing[type]',config('constants.PRICING_TYPES'),isset($pricing) ? $pricing->type : 'service_pricing', array('class' => 'form-control required','autofocus'=>'autofocus')) !!}
                                                    <div class="form-control-position">
                                                        <i class="bx bx-user-circle"></i>
                                                    </div>
                                                    @error('pricing.service_id')
                                                    <span class="invalid-feedback" role="alert"></span>
                                                    @enderror
                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-3">
                                            <fieldset class="form-group">
                                                {!! Form::label('Service', 'Service:') !!}
                                                <div class="form-label-group position-relative has-icon-left">
                                                    {!! Form::select('pricing[service_id]',['' => 'Select Service']+$services->toArray(),isset($pricing) ? $pricing->service_id : null, array('class' => 'form-control required','autofocus'=>'autofocus')) !!}
                                                    <div class="form-control-position">
                                                        <i class="bx bx-user-circle"></i>
                                                    </div>
                                                    @error('pricing.service_id')
                                                    <span class="invalid-feedback" role="alert"></span>
                                                    @enderror
                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-3">
                                            <fieldset class="form-group">
                                                {!! Form::label('Code', 'Code:') !!}
                                                <div class="form-label-group position-relative has-icon-left">
                                                    {!! Form::text('pricing[code]', isset($pricing) ? $pricing->code : null, array('class' => 'form-control noSpace required','placeholder'=>'Enter Code','tab'=>1)) !!}
                                                    <div class="form-control-position">
                                                        <i class="bx bx-barcode"></i>
                                                    </div>
                                                    @error('pricing.code')
                                                    <span class="invalid-feedback" role="alert"></span>
                                                    @enderror
                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-3">
                                            <fieldset class="form-group">
                                                {!! Form::label('name', 'Name:') !!}
                                                <div class="form-label-group position-relative has-icon-left">
                                                    {!! Form::text('pricing[name]', isset($pricing) ? $pricing->name : null, array('class' => 'form-control noSpace required','placeholder'=>'Enter Name','tab'=>1)) !!}
                                                    <div class="form-control-position">
                                                        <i class="bx bx-user"></i>
                                                    </div>
                                                    @error('pricing.name')
                                                     <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-3">
                                            <fieldset class="form-group">
                                                {!! Form::label('Price', 'Price:') !!}
                                                <div class="form-label-group position-relative has-icon-left">
                                                    {!! Form::text('pricing[price]', isset($pricing) ? $pricing->price : null, array('class' => 'form-control noSpace required price','placeholder'=>'Enter Price','tab'=>2)) !!}
                                                    <div class="form-control-position">
                                                        <i class="bx bx-dollar"></i>
                                                    </div>
                                                    @error('pricing.price')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-3">
                                            <fieldset class="form-group">
                                                {!! Form::label('Commission', 'Commission:') !!}
                                                <div class="form-label-group position-relative has-icon-left">
                                                    {!! Form::text('pricing[brokerage]', isset($pricing) ? $pricing->brokerage : null, array('class' => 'form-control brokerage required','placeholder'=>'Enter Brokerage','tab'=>3)) !!}
                                                    <div class="form-control-position">
                                                        <i class="bx bx-money"></i>
                                                    </div>
                                                    @error('pricing.brokerage')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-3">
                                            <fieldset class="form-group">
                                                {!! Form::label('Min Square Footage', 'Min Square Footage:') !!}
                                                <div class="form-label-group position-relative has-icon-left">
                                                    {!! Form::number('pricing[min_sq_ft]', isset($pricing) ? $pricing->min_sq_ft : null, array('class' => 'form-control required','placeholder'=>'Enter Min Square Footage','tab'=>3)) !!}
                                                    <div class="form-control-position">
                                                        <i class="bx bx-downvote"></i>
                                                    </div>
                                                    @error('pricing.min_sq_ft')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-3">
                                            <fieldset class="form-group">
                                                {!! Form::label('Max Square Footage', 'Max Square Footage:') !!}
                                                <div class="form-label-group position-relative has-icon-left">
                                                    {!! Form::number('pricing[max_sq_ft]', isset($pricing) ? $pricing->max_sq_ft : null, array('class' => 'form-control required','placeholder'=>'Enter Max Square Footage','tab'=>3)) !!}
                                                    <div class="form-control-position">
                                                        <i class="bx bx-upvote"></i>
                                                    </div>
                                                    @error('pricing.max_sq_ft')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </fieldset>
                                        </div>

                                        @foreach($special_pricing_columns as $key => $special_pricing_column)
                                            <div class="col-md-3">
                                                <fieldset class="form-group">
                                                    {!! Form::label($special_pricing_column, $special_pricing_column) !!}
                                                    <div class="form-label-group position-relative has-icon-left">
                                                        {!! Form::text('special_pricing['.$key.']', isset($pricing) ? $pricing->special_pricing->where('special_pricing_id',$key)->first() ?  $pricing->special_pricing->where('special_pricing_id',$key)->first()->price : null : null, array('class' => 'form-control noSpace required price','placeholder'=>'Enter '.$special_pricing_column.' Price','tab'=>2)) !!}
                                                        <div class="form-control-position">
                                                            <i class="bx bx-dollar"></i>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        @endforeach

                                        <div class="col-md-3">
                                            <fieldset class="form-group">
                                                <div class="checkbox" style="margin-top: 30px;">
                                                    {!! Form::checkbox('pricing[taxable]', 1,  isset($pricing) ? $pricing->taxable : 0, array('class' => 'checkbox-input required', 'id' => 'checkbox1')) !!}
                                                    <label for="checkbox1">Taxable</label>
                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-3">
                                            <fieldset class="form-group">
                                                <div class="checkbox" style="margin-top: 30px;">
                                                    {!! Form::checkbox('pricing[commission_paid]', 1,  isset($pricing) ? $pricing->commission_paid : 0, array('class' => 'checkbox-input required', 'id' => 'checkbox2')) !!}
                                                    <label for="checkbox2">Commission Paid</label>
                                                </div>
                                            </fieldset>
                                        </div>

                                    </div>
                                    <div class="row pull-right">
                                        <button type="submit" class="btn pull-right round btn-hena">Submit</button>
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
    <script src="{{asset('admin/js/scripts/pages/pricing/add-edit.js')}}"></script>
@endsection
