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
                        <h4 class="card-title">{{(isset($special_pricing_column)) ? 'Edit' : 'Create'}} Special Pricing Column</h4>
                        {!! link_to_route('special-pricing-columns.index', 'Back', null, array('class' => 'btn btn-dark pull-right round')) !!}

                    </div>
                    <div class="card-body">


                      @if(isset($special_pricing_column))
                            {!! Form::model($special_pricing_column, array('route' => array('special-pricing-columns.update', $special_pricing_column->id),'id' => 'validate-form', 'class' => 'jquery-validate-form')) !!}
                         {{ method_field('PATCH') }}
                         {!! Form::hidden('id', isset($special_pricing_column) ? $special_pricing_column->id : null) !!}
                      @else
                            {!! Form::open(array('route' => 'special-pricing-columns.store', 'autocomplete' => 'off','id' => 'validate-form', 'class' => 'jquery-validate-form')) !!}
                      @endif
                          <div class="row">
                              <div class="col-md-6">
                              <fieldset class="form-group">
                                {!! Form::label('name', 'Name:') !!}
                                  <div class="form-label-group position-relative has-icon-left">
                                      {!! Form::text('special_pricing_column[name]', isset($special_pricing_column) ? $special_pricing_column->name : null, array('class' => 'form-control noSpace required','placeholder'=>'Enter Special Pricing Column Name')) !!}
                                      <div class="form-control-position">
                                          <i class="bx bx-lock"></i>
                                      </div>
                                 @error('special_pricing_column.name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                                  </div>
                              </fieldset>
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
    @include('admin.partials._session-message')
    <script src="{{asset('admin/js/scripts/pages/roles/add-edit.js')}}"></script>
@endsection
