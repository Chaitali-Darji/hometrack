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
                                    <h4 class="card-title text-hena">Sales Tax Add/Edit</h4>
                                    {!! link_to_route('sales-tax.index', 'Back', null, array('class' => 'btn btn-dark pull-right round')) !!}

                                </div>
                                <div class="card-body">
                                    @if(isset($salestax))
                                        {!! Form::model($salestax, array('route' => array('sales-tax.update', $salestax->id),'id' => 'validate-form', 'class' => 'jquery-validate-form')) !!}
                                        {{ method_field('PATCH') }}
                                        {!! Form::hidden('id', isset($salestax) ? $salestax->id : null) !!}
                                    @else
                                        {!! Form::open(array('route' => 'sales-tax.store', 'autocomplete' => 'off','id' => 'validate-form', 'class' => 'jquery-validate-form')) !!}
                                    @endif
                                    <div class="row">
                                        <div class="col-md-5">
                                            <fieldset class="form-group">
                                                {!! Form::label('State', 'State:') !!}
                                                <div class="form-label-group position-relative has-icon-left">
                                                    {!! Form::select('salestax[state_id]', $states,isset($salestax) ? $salestax->state_id : null, array('class' => 'form-control noSpace required')) !!}
                                                    <div class="form-control-position">
                                                        <i class="bx bxs-city"></i>
                                                    </div>
                                                    @error('salestax.state_id')
                                                <span class="invalid-feedback" salestax="alert">
                                                  <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-5">
                                            <fieldset class="form-group">
                                                {!! Form::label('Tax', 'Tax:') !!}
                                                <div class="form-label-group position-relative has-icon-left">
                                                    {!! Form::number('salestax[tax]', isset($salestax) ? $salestax->tax : null, array('class' => 'form-control noSpace required','min'=>0, 'placeholder'=>'Enter Tax Percentage')) !!}
                                                    <div class="form-control-position">
                                                        <i class="bx bxs-note "></i>
                                                    </div>
                                                    @error('salestax.tax')
                                                <span class="invalid-feedback" salestax="alert">
                                                  <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-2 pull-right">
                                            <button type="submit" class="btn pull-right round btn-hena mt-2">Submit
                                            </button>
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
    <script src="{{asset('admin/js/scripts/pages/salestax/add-edit.js')}}"></script>
@endsection
