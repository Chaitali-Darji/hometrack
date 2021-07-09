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
                      <h4 class="card-title">Sales Tax Add/Edit</h4>
                    </div>
                    <div class="card-body">
                     @include('admin.partials._session-message')

                      @if(isset($salestax))
                         {!! Form::model($salestax, array('route' => array('sales-tax.update', $salestax->id),'id' => 'jquery-salestax-form')) !!}
                         {{ method_field('PATCH') }}
                         {!! Form::hidden('id', isset($salestax) ? $salestax->id : null) !!}
                      @else
                        {!! Form::open(array('route' => 'sales-tax.store', 'autocomplete' => 'off','id' => 'jquery-salestax-form')) !!}
                      @endif    
                          <div class="row">
                            <div class="col-md-6">
                              <fieldset class="form-group">
                                {!! Form::label('State', 'State:') !!}
                                {!! Form::select('salestax[state_id]', $states,isset($salestax) ? $salestax->state_id : null, array('class' => 'form-control', 'required' => true)) !!}
                                 @error('salestax.state_id')
                                      <span class="invalid-feedback" salestax="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </fieldset>     

                              <fieldset class="form-group">
                                {!! Form::label('Tax', 'Tax:') !!}
                                {!! Form::number('salestax[tax]', isset($salestax) ? $salestax->tax : null, array('class' => 'form-control','min'=>0, 'step'=>0.1, 'required' => true)) !!}
                                 @error('salestax.tax')
                                      <span class="invalid-feedback" salestax="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </fieldset>                       

                            </div>
                          </div>
                          <div class="row">
                            {!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}
                            {!! link_to_route('sales-tax.index', 'Cancel', null, array('class' => 'btn')) !!}
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
    <script src="{{asset('admin/js/scripts/pages/salestax/add-edit.js')}}"></script>
@endsection