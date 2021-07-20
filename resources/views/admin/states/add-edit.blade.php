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
                                    <h4 class="card-title">State Add/Edit</h4>
                                    {!! link_to_route('states.index', 'Back', null, array('class' => 'btn btn-dark round')) !!}

                                </div>
                                <div class="card-body">


                                    @if(isset($state))
                                        {!! Form::model($state, array('route' => array('states.update', $state->id),'id' => 'validate-form', 'class' => 'jquery-validate-form')) !!}
                                        {{ method_field('PATCH') }}
                                        {!! Form::hidden('id', isset($state) ? $state->id : null) !!}
                                    @else
                                        {!! Form::open(array('route' => 'states.store', 'autocomplete' => 'off','id' => 'validate-form', 'class' => 'jquery-validate-form')) !!}
                                    @endif
                                    <div class="row">
                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                {!! Form::label('name', 'Name:') !!}
                                                <div class="form-label-group position-relative has-icon-left">
                                                    {!! Form::text('state[name]', isset($state) ? $state->name : null, array('class' => 'form-control noSpace required','placeholder'=>'Enter State Name')) !!}
                                                    <div class="form-control-position">
                                                        <i class="bx bxs-city"></i>
                                                    </div>
                                                @error('state.name')
                                                <span class="invalid-feedback" state="alert">
                                                  <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-6">
                                            <button type="submit" class="btn round btn-hena mt-2">Submit</button>
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
    <script src="{{asset('admin/js/scripts/pages/states/add-edit.js')}}"></script>
@endsection
