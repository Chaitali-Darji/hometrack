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
                                    <h4 class="card-title text-hena">{{(isset($client) ? 'Edit' : 'Create')}}
                                        Client </h4>
                                    {!! link_to_route('clients.index', 'Back', null, array('class' => 'btn btn-dark round mr-1 mb-1')) !!}

                                </div>
                                <div class="card-body">


                                    @if(isset($client))
                                        {!! Form::model($client, array('route' => array('clients.update', $client->id),'id' => 'validate-form')) !!}
                                        {{ method_field('PATCH') }}
                                        {!! Form::hidden('id', isset($client) ? $client->id : null) !!}
                                    @else
                                        {!! Form::open(['route' => 'clients.store', 'autocomplete' => 'off', 'id' => 'validate-form', 'class' => 'jquery-validate-form']) !!}
                                        {{ method_field('POST') }}

                                    @endif
                                    <div class="row">
                                        <div class="col-md-6">

                                            <h1 class="card-title">Info</h1>

                                            <fieldset class="form-group">
                                                {!! Form::label('Primary Account', 'Primary Account:') !!}
                                                <div class="form-label-group position-relative has-icon-left">
                                                    {!! Form::select('primary_account_id',['' => 'Select Primary Account']+$clients->toArray(),isset($client) ? $client->primary_account_id : null, array('class' => 'form-control','autofocus'=>'autofocus')) !!}
                                                    <div class="form-control-position">
                                                        <i class="bx bx-user-circle"></i>
                                                    </div>
                                                    @error('primary_account_id')
                                                    <span class="invalid-feedback" role="alert"></span>
                                                @enderror
                                                </div>
                                            </fieldset>

                                            <fieldset class="form-group">
                                                {!! Form::label('first name', 'First Name:') !!}
                                                <div class="form-label-group position-relative has-icon-left">
                                                    {!! Form::text('first_name', isset($client) ? $client->first_name : null, array('class' => 'form-control noSpace required','placeholder'=>'Enter First Name','tab'=>1)) !!}
                                                    <div class="form-control-position">
                                                        <i class="bx bx-user"></i>
                                                    </div>
                                                    @error('first_name')
                                                <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                </div>
                                            </fieldset>

                                            <fieldset class="form-group">
                                                {!! Form::label('last name', 'Last Name:') !!}
                                                <div class="form-label-group position-relative has-icon-left">
                                                    {!! Form::text('last_name', isset($client) ? $client->last_name : null, array('class' => 'form-control noSpace required','placeholder'=>'Enter Last Name','tab'=>2)) !!}
                                                    <div class="form-control-position">
                                                        <i class="bx bx-user"></i>
                                                    </div>
                                                    @error('last_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                </div>
                                            </fieldset>

                                            <fieldset class="form-group">
                                                {!! Form::label('Brokerage', 'Brokerage:') !!}
                                                <div class="form-label-group position-relative has-icon-left">
                                                    {!! Form::text('brokerage', isset($client) ? $client->brokerage : null, array('class' => 'form-control ','placeholder'=>'Enter Brokerage','tab'=>3)) !!}
                                                    <div class="form-control-position">
                                                        <i class="bx bxs-note"></i>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="form-group">
                                                {!! Form::label('Office/Brokerage Code:', 'Office/Brokerage Code:') !!}
                                                <div class="form-label-group position-relative has-icon-left">
                                                    {!! Form::text('brokerage_code', isset($client) ? $client->brokerage_code : null, array('class' => 'form-control','placeholder'=>'Enter Brokerage Code','tab'=>4)) !!}
                                                    <div class="form-control-position">
                                                        <i class="bx bxs-coupon"></i>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="form-group">
                                                {!! Form::label('Team/Group Name:', 'Team/Group Name:') !!}
                                                <div class="form-label-group position-relative has-icon-left">
                                                    {!! Form::text('team_name', isset($client) ? $client->team_name : null, array('class' => 'form-control','placeholder'=>'Enter Team Name','tab'=>5)) !!}
                                                    <div class="form-control-position">
                                                        <i class="bx bxs-group"></i>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="form-group">
                                                {!! Form::label('MRISID', 'MRISID:') !!}
                                                <div class="form-label-group position-relative has-icon-left">
                                                    {!! Form::text('mrisid', isset($client) ? $client->mrisid : null, array('class' => 'form-control','placeholder'=>'Enter MRSID','tab'=>6)) !!}
                                                    <div class="form-control-position">
                                                        <i class="bx bxs-notepad"></i>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="form-group">
                                                {!! Form::label('Mobile Phone', 'Mobile Phone:') !!}
                                                <div class="form-label-group position-relative has-icon-left">
                                                    {!! Form::text('mobile_phone', isset($client) ? $client->mobile_phone : null, array('class' => 'form-control noSpace required phone-number','minlength'=>10,'placeholder'=>'Enter Mobile Number','tab'=>7)) !!}
                                                    <div class="form-control-position">
                                                        <i class="bx bxs-phone"></i>
                                                    </div>
                                                    @error('mobile_phone')
                                                <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                  </span>
                                                @enderror

                                                </div>
                                            </fieldset>


                                            <fieldset class="form-group">
                                                {!! Form::label('Office Phone', 'Office Phone:') !!}
                                                <div class="form-label-group position-relative has-icon-left">
                                                    {!! Form::text('office_phone', isset($client) ? $client->office_phone : null, array('class' => 'form-control noSpace required phone-number','minlength'=>10,'placeholder'=>'Enter Office Number','tab'=>8)) !!}
                                                    <div class="form-control-position">
                                                        <i class="bx bxs-phone"></i>
                                                    </div>
                                                    @error('office_phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                </div>
                                            </fieldset>

                                            <fieldset class="form-group">
                                                {!! Form::label('Email', 'Email:') !!}<br/>
                                                <div class="form-label-group position-relative has-icon-left">
                                                    {!! Form::email('email',  isset($client) ? $client->email : null, array('class' => 'form-control noSpace required email','placeholder'=>'Enter Email','tab'=>9)) !!}
                                                    <div class="form-control-position">
                                                        <i class="bx bx-mail-send"></i>
                                                    </div>
                                                    @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                </div>
                                            </fieldset>

                                            <fieldset class="form-group">
                                                {!! Form::label('Team Emails', 'Team Emails:') !!}<br/>
                                                <div class="form-label-group position-relative has-icon-left">
                                                    {!! Form::text('team_emails',  isset($client) ? $client->team_emails : null, array('class' => 'form-control','data-role'=>"tagsinput",'id' => 'team-email-tag','placeholder'=>'Enter Team Emails')) !!}
                                                    <div class="form-control-position">
                                                        <i class="bx bxl-mail-send"></i>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="form-group">
                                                {!! Form::label('Website', 'Website:') !!}<br/>
                                                <div class="form-label-group position-relative has-icon-left">
                                                    {!! Form::text('website',  isset($client) ? $client->website : null, array('class' => 'form-control','placeholder'=>'Enter Website')) !!}
                                                    <div class="form-control-position">
                                                        <i class="bx bx-globe"></i>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="form-group">
                                                {!! Form::label('Notes', 'Notes:') !!}<br/>
                                                <div class="form-label-group position-relative has-icon-left">
                                                    {!! Form::textarea('notes',  isset($client) ? $client->notes : null, array('class' => 'form-control','rows'=>10,'placeholder'=>'Enter Notes')) !!}
                                                    <div class="form-control-position">
                                                        <i class="bx bxs-notepad"></i>
                                                    </div>
                                                </div>
                                            </fieldset>


                                        </div>

                                        <div class="col-md-6">

                                            <h1 class="card-title">Address</h1>

                                            {!! Form::hidden('address[latitude]', isset($address) ? $address->latitude : null, array('id' => 'latitude')) !!}
                                            {!! Form::hidden('address[longitude]', isset($address) ? $address->longitude : null, array('id' => 'longitude')) !!}

                                            <fieldset class="form-group">
                                                {!! Form::label('Address 1', 'Address 1:') !!}
                                                <div class="form-label-group position-relative has-icon-left">
                                                    {!! Form::text('address[address1]', isset($address) ? $address->address1 : null, array('class' => 'form-control','id' => 'address1' ,'placeholder'=>'Enter Address Line 1')) !!}
                                                    <div class="form-control-position">
                                                        <i class="bx bx-map"></i>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="form-group">
                                                {!! Form::label('Address 2', 'Address 2:') !!}
                                                <div class="form-label-group position-relative has-icon-left">
                                                    {!! Form::text('address[address2]', isset($address) ? $address->address2 : null, array('class' => 'form-control','id' => 'address2','placeholder'=>'Enter Address Line 2')) !!}
                                                    <div class="form-control-position">
                                                        <i class="bx bx-map"></i>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="form-group">
                                                {!! Form::label('City', 'City:') !!}
                                                <div class="form-label-group position-relative has-icon-left">
                                                    {!! Form::text('address[city]', isset($address) ? $address->city : null, array('class' => 'form-control','id' => 'city','placeholder'=>'Enter City')) !!}
                                                    <div class="form-control-position">
                                                        <i class="bx bxs-city"></i>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="form-group">
                                                {!! Form::label('State', 'State:') !!}
                                                <div class="form-label-group position-relative has-icon-left">
                                                    {!! Form::text('address[state]', isset($address) ? $address->state : null, array('class' => 'form-control','id' => 'state','placeholder'=>'Enter State')) !!}
                                                    <div class="form-control-position">
                                                        <i class="bx bxs-city"></i>
                                                    </div>
                                                </div>
                                            </fieldset>


                                            <fieldset class="form-group">
                                                {!! Form::label('ZIP', 'ZIP:') !!}
                                                <div class="form-label-group position-relative has-icon-left">
                                                    {!! Form::text('address[zip]', isset($address) ? $address->zip : null, array('class' => 'form-control','id' => 'zip','placeholder'=>'Enter Zip')) !!}
                                                    <div class="form-control-position">
                                                        <i class="bx bx-pin"></i>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <hr>
                                            <h1 class="card-title">Billing Address</h1>
                                            <hr>
                                            {!! Form::hidden('billing_address[latitude]', isset($billing_address) ? $billing_address->latitude : null, array('id' => 'billing_latitude')) !!}
                                            {!! Form::hidden('billing_address[longitude]', isset($billing_address) ? $billing_address->longitude : null, array('id' => 'billing_longitude')) !!}

                                            <fieldset class="form-group">
                                                {!! Form::label('Address 1', 'Address 1:') !!}
                                                <div class="form-label-group position-relative has-icon-left">
                                                    {!! Form::text('billing_address[address1]',  isset($billing_address) ? $billing_address->address1 : null, array('class' => 'form-control','id' => 'billing_address1','placeholder'=>'Enter Address Line 1')) !!}
                                                    <div class="form-control-position">
                                                        <i class="bx bxs-map"></i>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="form-group">
                                                {!! Form::label('Address 2', 'Address 2:') !!}
                                                <div class="form-label-group position-relative has-icon-left">
                                                    {!! Form::text('billing_address[address2]',  isset($billing_address) ? $billing_address->address2 : null, array('class' => 'form-control','id' => 'billing_address2','placeholder'=>'Enter Address Line 2')) !!}
                                                    <div class="form-control-position">
                                                        <i class="bx bxs-map"></i>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="form-group">
                                                {!! Form::label('City', 'City:') !!}
                                                <div class="form-label-group position-relative has-icon-left">
                                                    {!! Form::text('billing_address[city]',  isset($billing_address) ? $billing_address->city : null, array('class' => 'form-control','id' => 'billing_city','placeholder'=>'Enter City')) !!}
                                                    <div class="form-control-position">
                                                        <i class="bx bxs-city"></i>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="form-group">
                                                {!! Form::label('State', 'State:') !!}
                                                <div class="form-label-group position-relative has-icon-left">
                                                    {!! Form::text('billing_address[state]',  isset($billing_address) ? $billing_address->state : null, array('class' => 'form-control','id' => 'billing_state','placeholder'=>'Enter State')) !!}
                                                    <div class="form-control-position">
                                                        <i class="bx bxs-city"></i>
                                                    </div>
                                                </div>
                                            </fieldset>


                                            <fieldset class="form-group">
                                                {!! Form::label('ZIP', 'ZIP:') !!}
                                                <div class="form-label-group position-relative has-icon-left">
                                                    {!! Form::text('billing_address[zip]',  isset($billing_address) ? $billing_address->zip : null, array('class' => 'form-control','id' => 'billing_zip','placeholder'=>'Enter Zip')) !!}
                                                    <div class="form-control-position">
                                                        <i class="bx bx-pin"></i>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <h1 class="card-title">SOCIAL MEDIA</h1>

                                            <fieldset class="form-group">
                                                {!! Form::label('Instagram', 'Instagram:') !!}
                                                <div class="form-label-group position-relative has-icon-left">
                                                    {!! Form::text('instagram_url', isset($client) ? $client->instagram_url : null, array('class' => 'form-control','placeholder'=>'Enter Instagram Link')) !!}
                                                    <div class="form-control-position">
                                                        <i class="bx bxl-instagram"></i>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="form-group">
                                                {!! Form::label('Facebook', 'Facebook:') !!}
                                                <div class="form-label-group position-relative has-icon-left">
                                                    {!! Form::text('facebook_url', isset($client) ? $client->facebook_url : null, array('class' => 'form-control','placeholder'=>'Enter Facebook Link')) !!}
                                                    <div class="form-control-position">
                                                        <i class="bx bxl-facebook"></i>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="form-group">
                                                {!! Form::label('LinkedIn:', 'LinkedIn:') !!}
                                                <div class="form-label-group position-relative has-icon-left">
                                                    {!! Form::text('linkedin_url', isset($client) ? $client->linkedin_url : null, array('class' => 'form-control','placeholder'=>'Enter Linkedin Link')) !!}
                                                    <div class="form-control-position">
                                                        <i class="bx bxl-linkedin"></i>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="form-group">
                                                {!! Form::label('YouTube:', 'YouTube:') !!}
                                                <div class="form-label-group position-relative has-icon-left">
                                                    {!! Form::text('youtube_url', isset($client) ? $client->youtube_url : null, array('class' => 'form-control','placeholder'=>'Enter Youtube Link')) !!}
                                                    <div class="form-control-position">
                                                        <i class="bx bxl-youtube"></i>
                                                    </div>
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
    <script src="{{asset('admin/js/scripts/pages/clients/add-edit.js')}}"></script>

    <script
            src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_API_KEY')}}&callback=initAutocomplete&libraries=places&v=weekly"
            async></script>
@endsection
