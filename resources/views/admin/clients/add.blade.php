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
                                    <h4 class="card-title">Client Add</h4>
                                </div>
                                <div class="card-body">
                                    @include('admin.partials._session-message')
                                    {!! Form::open(['route' => 'clients.store', 'autocomplete' => 'off', 'id' => 'jquery-client-form', 'class' => 'jquery-validate-form']) !!}
                                    {{ method_field('POST') }}
                                    <div class="row">`
                                        <div class="col-md-6">
                                            <h1 class="card-title">Info</h1>
                                            <fieldset class="form-group">
                                                {!! Form::label('name', 'First Name:') !!}
                                                {!! Form::text('client[first_name]',null, array('class' => 'form-control required')) !!}
                                                @error('client.first_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </fieldset>
                                            <fieldset class="form-group">
                                                {!! Form::label('last name', 'Last Name:') !!}
                                                {!! Form::text('client[last_name]', null, array('class' => 'form-control required')) !!}
                                                @error('client.last_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </fieldset>
                                            <fieldset class="form-group">
                                                {!! Form::label('Brokerage', 'Brokerage:') !!}
                                                {!! Form::text('client[brokerage]', null, array('class' => 'form-control required')) !!}
                                                @error('client.brokerage')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </fieldset>
                                            <fieldset class="form-group">
                                                {!! Form::label('MRISID', 'MRISID:') !!}
                                                {!! Form::text('client[mrisid]', null, array('class' => 'form-control required')) !!}
                                                @error('client.mrisid')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </fieldset>
                                            <fieldset class="form-group">
                                                {!! Form::label('Mobile Phone', 'Mobile Phone:') !!}
                                                {!! Form::text('client[mobile_phone]', null, array('class' => 'form-control phone-number required')) !!}
                                                @error('client.mobile_phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </fieldset>
                                            <fieldset class="form-group">
                                                {!! Form::label('Office Phone', 'Office Phone:') !!}
                                                {!! Form::text('client[office_phone]', null, array('class' => 'form-control phone-number required')) !!}
                                                @error('client.office_phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </fieldset>
                                            <fieldset class="form-group">
                                                {!! Form::label('email', 'Email:') !!}<br/>
                                                {!! Form::email('client[email]', null, array('class' => 'form-control required')) !!}
                                                @error('client.office_phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </fieldset>
                                            <fieldset class="form-group">
                                                {!! Form::label('Team emails', 'Team Emails:') !!}<br/>
                                                {!! Form::text('client[team_emails]', null, array('class' => 'form-control','data-role'=>"tagsinput",'id' => 'team-email-tag required')) !!}
                                                @error('client.team_emails')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </fieldset>
                                            <fieldset class="form-group">
                                                {!! Form::label('Website', 'Website:') !!}<br/>
                                                {!! Form::text('client[website]', null, array('class' => 'form-control required')) !!}
                                                @error('client.website]')
                                                <span class="invalid-feedback" role="aler">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </fieldset>
                                            <fieldset class="form-group">
                                                {!! Form::label('Notes', 'Notes:') !!}<br/>
                                                {!! Form::textarea('client[notes]', null, array('class' => 'form-control required')) !!}
                                                @error('client.notes]')
                                                <span class="invalid-feedback" role="aler">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </fieldset>
                                        </div>

                                        <div class="col-md-6">
                                            <h1 class="card-title">Address</h1>
                                            {!! Form::hidden('address[latitude]',null, array('id' => 'latitude')) !!}
                                            {!! Form::hidden('address[longitude]',null, array('id' => 'longitude')) !!}
                                            <fieldset class="form-group">
                                                {!! Form::label('Address 1', 'Address 1:') !!}
                                                {!! Form::text('address[address1]', null, array('class' => 'form-control','id' => 'address1 required')) !!}
                                                @error('email_template[address1]')
                                                <span class="invalid-feedback" role="alert">
                                                @enderror
                                            </fieldset>
                                            <fieldset class="form-group">
                                                {!! Form::label('Address 2', 'Address 2:') !!}
                                                {!! Form::text('address[address2]', null, array('class' => 'form-control','id' => 'address2')) !!}
                                                @error('address[address_2]')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </fieldset>
                                            <fieldset class="form-group">
                                                {!! Form::label('City', 'City:') !!}
                                                {!! Form::text('address[city]', null, array('class' => 'form-control','id' => 'city')) !!}
                                                @error('address[city]')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </fieldset>
                                            <fieldset class="form-group">
                                                {!! Form::label('State', 'State:') !!}
                                                {!! Form::text('address[state]', null, array('class' => 'form-control','id' => 'state')) !!}
                                                @error('address[state]')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </fieldset>
                                            <fieldset class="form-group">
                                                {!! Form::label('ZIP', 'ZIP:') !!}
                                                {!! Form::text('address[zip]', null, array('class' => 'form-control','id' => 'zip')) !!}
                                                @error('client.zip]')
                                                <span class="invalid-feedback" role="aler">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </fieldset>

                                            <h1 class="card-title">SOCIAL MEDIA</h1>
                                            <fieldset class="form-group">
                                                {!! Form::label('Instagram', 'Instagram:') !!}
                                                {!! Form::text('client[instagram_url]', null, array('class' => 'form-control')) !!}
                                                @error('client.instagram_url')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </fieldset>
                                            <fieldset class="form-group">
                                                {!! Form::label('Facebook', 'Facebook:') !!}
                                                {!! Form::text('client[facebook_url]', null, array('class' => 'form-control')) !!}
                                                @error('client.facebook_url')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </fieldset>
                                            <fieldset class="form-group">
                                                {!! Form::label('LinkedIn:', 'LinkedIn:') !!}
                                                {!! Form::text('client[linkedin_url]', null, array('class' => 'form-control')) !!}
                                                @error('client.linkedin_url')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </fieldset>
                                            <fieldset class="form-group">
                                                {!! Form::label('YouTube:', 'YouTube:') !!}
                                                {!! Form::text('client[youtube_url]', null, array('class' => 'form-control')) !!}
                                                @error('client.youtube_url')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="row">
                                        {!! Form::submit('Submit', array('class' => 'btn round btn-primary')) !!}
                                        {!! link_to_route('clients.index', 'Cancel', null, array('class' => 'btn')) !!}
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
