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
                      <h4 class="card-title">Client Add/Edit</h4>
                        {!! link_to_route('clients.index', 'Back', null, array('class' => 'btn btn-dark round mr-1 mb-1')) !!}

                    </div>
                    <div class="card-body">
                     @include('admin.partials._session-message')
                        @if($errors->any())
                            {{ implode('', $errors->all('<div>:message</div>')) }}
                        @endif
                      @if(isset($client))
                         {!! Form::model($client, array('route' => array('clients.update', $client->id))) !!}
                         {{ method_field('PATCH') }}
                         {!! Form::hidden('id', isset($client) ? $client->id : null) !!}
                      @else
                        {!! Form::open(array('route' => 'clients.store', 'autocomplete' => 'off', 'id' => 'jquery-client-form')) !!}
                            {{ method_field('POST') }}
                      @endif    
                          <div class="row">
                            <div class="col-md-4">
                              <fieldset class="form-group">
                                {!! Form::label('name', 'First Name:') !!}
                                  {!! Form::text('first_name', isset($client) ? $client->first_name : null, array('class' => 'form-control')) !!}
                                  @error('first_name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </fieldset>
                            </div>
                            <div class="col-md-4">
                              <fieldset class="form-group">
                                {!! Form::label('name', 'Last Name:') !!}
                                  {!! Form::text('last_name', isset($client) ? $client->last_name : null, array('class' => 'form-control')) !!}
                                  @error('last_name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </fieldset>
                            </div>
                              <div class="col-md-4">
                              <fieldset class="form-group">
                                {!! Form::label('name', 'Brokerage:') !!}
                                  {!! Form::text('brokerage', isset($client) ? $client->brokerage : null, array('class' => 'form-control')) !!}
                                  @error('brokerage')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </fieldset>
                              </div>
                          </div>
                        <div class="row">

                        <div class="col-md-4">


                              <fieldset class="form-group">
                                {!! Form::label('name', 'MRISID:') !!}
                                  {!! Form::text('mrisid', isset($client) ? $client->brokerage : null, array('class' => 'form-control')) !!}
                                  @error('mrisid')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </fieldset>
                        </div>
                            <div class="col-md-4">
                              <fieldset class="form-group">
                                {!! Form::label('name', 'Mobile Phone:') !!}
                                  {!! Form::text('mobile_phone', isset($client) ? $client->mobile_phone : null, array('class' => 'form-control')) !!}
                                  @error('mobile_phone')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </fieldset>
                            </div>
                            <div class="col-md-4">

                              <fieldset class="form-group">
                                {!! Form::label('name', 'Office Phone:') !!}
                                  {!! Form::text('office_phone', isset($client) ? $client->office_phone : null, array('class' => 'form-control')) !!}
                                 @error('client[office_phone]')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </fieldset>
                            </div>
                        </div>
                        <div class="row">

                        <div class="col-md-4">

                               <fieldset class="form-group">
                                {!! Form::label('email', 'Email:') !!}<br/>
                                   {!! Form::email('email',  isset($user) ? $user->email : null, array('class' => 'form-control')) !!}
                                @error('client[office_phone]')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </fieldset>
                        </div>

                            <div class="col-md-4">
                              <fieldset class="form-group">
                                {!! Form::label('password', 'Website:') !!}<br/>
                                  {!! Form::text('website',  isset($user) ? $user->website : null, array('class' => 'form-control')) !!}
                                @error('client[website]')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </fieldset>   
                            </div>
                            <div class="col-md-4">
                                <fieldset class="form-group">
                                    {!! Form::label('email', 'Team Emails:') !!}<br/>
                                    {!! Form::text('team_emails',  isset($user) ? $user->team_emails : null, array('class' => 'form-control','data-role'=>"tagsinput",'id' => 'team-email-tag')) !!}
                                    @error('team_emails')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </fieldset>
                            </div>
                        </div>
                        <div class="row">
                         <div class="col-md-12">

                              <fieldset class="form-group">
                                {!! Form::label('password', 'Notes:') !!}<br/>
                                  {!! Form::textarea('notes',  isset($user) ? $user->notes : null, array('class' => 'form-control','rows'=>3)) !!}
                                  @error('notes')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </fieldset>                          

                            </div>
                          </div>
                          <div class="row pull-right">
                            {!! Form::submit('Submit', array('class' => 'btn round btn-primary')) !!}
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
    <script src="{{asset('admin/js/scripts/pages/clients/add-edit.js')}}"></script>
@endsection