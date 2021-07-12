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
                                    <h4 class="card-title">Client Edit</h4>
                                </div>
                                <div class="card-body">
                                    @include('admin.partials._session-message')

                                    {!! Form::model($client, array('route' => array('clients.update', $client->id))) !!}
                                    {{ method_field('PATCH') }}
                                    {!! Form::hidden('id', isset($client) ? $client->id : null) !!}

                                    <div class="row">
                                        <div class="col-md-6">

                                            <h1 class="card-title">Info</h1>

                                            <fieldset class="form-group">
                                                {!! Form::label('Primary Account', 'Primary Account:') !!}
                                                {!! Form::select('client[primary_account_id]',['' => 'Select Primary Account']+$clients->toArray(),isset($client) ? $client->primary_account_id : null, array('class' => 'form-control')) !!}
                                                @error('client[primary_account_id]')
                                                <span class="invalid-feedback" role="alert">
                                                @enderror
                                            </fieldset>

                                            <fieldset class="form-group">
                                                {!! Form::label('first name', 'First Name:') !!}
                                                {!! Form::text('client[first_name]', isset($client) ? $client->first_name : null, array('class' => 'form-control')) !!}
                                                @error('client[first_name]')
                                                <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </fieldset>

                                            <fieldset class="form-group">
                                                {!! Form::label('last name', 'Last Name:') !!}
                                                {!! Form::text('client[last_name]', isset($client) ? $client->last_name : null, array('class' => 'form-control')) !!}
                                                @error('client[last_name]')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </fieldset>

                                            <fieldset class="form-group">
                                                {!! Form::label('Brokerage', 'Brokerage:') !!}
                                                {!! Form::text('client[brokerage]', isset($client) ? $client->brokerage : null, array('class' => 'form-control')) !!}
                                                @error('client[brokerage]')
                                                <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                                @enderror
                                            </fieldset>

                                            <fieldset class="form-group">
                                                {!! Form::label('Office/Brokerage Code:', 'Office/Brokerage Code:') !!}
                                                {!! Form::text('client[brokerage_code]', isset($client) ? $client->brokerage_code : null, array('class' => 'form-control')) !!}
                                                @error('client[brokerage_code]')
                                                <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                                @enderror
                                            </fieldset>

                                            <fieldset class="form-group">
                                                {!! Form::label('Team/Group Name:', 'Team/Group Name:') !!}
                                                {!! Form::text('client[team_name]', isset($client) ? $client->team_name : null, array('class' => 'form-control')) !!}
                                                @error('client[team_name]')
                                                <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                                @enderror
                                            </fieldset>

                                            <fieldset class="form-group">
                                                {!! Form::label('MRISID', 'MRISID:') !!}
                                                {!! Form::text('client[mrisid]', isset($client) ? $client->mrisid : null, array('class' => 'form-control')) !!}
                                                @error('client[mrisid]')
                                                <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                                @enderror
                                            </fieldset>

                                            <fieldset class="form-group">
                                                {!! Form::label('Mobile Phone', 'Mobile Phone:') !!}
                                                {!! Form::text('client[mobile_phone]', isset($client) ? $client->mobile_phone : null, array('class' => 'form-control phone-number')) !!}
                                                @error('client[mobile_phone]')
                                                <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                                @enderror
                                            </fieldset>


                                            <fieldset class="form-group">
                                                {!! Form::label('Office Phone', 'Office Phone:') !!}
                                                {!! Form::text('client[office_phone]', isset($client) ? $client->office_phone : null, array('class' => 'form-control phone-number')) !!}
                                                @error('client[office_phone]')
                                                <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                                @enderror
                                            </fieldset>

                                            <fieldset class="form-group">
                                                {!! Form::label('Email', 'Email:') !!}<br/>
                                                {!! Form::email('client[email]',  isset($client) ? $client->email : null, array('class' => 'form-control')) !!}
                                                @error('client[office_phone]')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </fieldset>

                                            <fieldset class="form-group">
                                                {!! Form::label('Team Emails', 'Team Emails:') !!}<br/>
                                                {!! Form::text('client[team_emails]',  isset($client) ? $client->team_emails : null, array('class' => 'form-control','data-role'=>"tagsinput",'id' => 'team-email-tag')) !!}
                                                @error('client[team_emails]')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </fieldset>

                                            <fieldset class="form-group">
                                                {!! Form::label('Website', 'Website:') !!}<br/>
                                                {!! Form::text('client[website]',  isset($client) ? $client->website : null, array('class' => 'form-control')) !!}
                                                @error('client[website]')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </fieldset>


                                            <fieldset class="form-group">
                                                {!! Form::label('Notes', 'Notes:') !!}<br/>
                                                {!! Form::textarea('client[notes]',  isset($client) ? $client->notes : null, array('class' => 'form-control')) !!}
                                                @error('client[notes]')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </fieldset>

                                        </div>

                                        <div class="col-md-6">

                                            <h1 class="card-title">Address</h1>

                                            {!! Form::hidden('address[latitude]', isset($address) ? $address->latitude : null, array('id' => 'latitude')) !!}
                                            {!! Form::hidden('address[longitude]', isset($address) ? $address->longitude : null, array('id' => 'longitude')) !!}

                                            <fieldset class="form-group">
                                                {!! Form::label('Address 1', 'Address 1:') !!}
                                                {!! Form::text('address[address1]', isset($address) ? $address->address1 : null, array('class' => 'form-control','id' => 'address1')) !!}
                                                @error('client[address1]')
                                                <span class="invalid-feedback" role="alert">
                                                @enderror
                                            </fieldset>

                                            <fieldset class="form-group">
                                                {!! Form::label('Address 2', 'Address 2:') !!}
                                                {!! Form::text('address[address2]', isset($address) ? $address->address2 : null, array('class' => 'form-control','id' => 'address2')) !!}
                                                @error('address[address2]')
                                                <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                                @enderror
                                            </fieldset>

                                            <fieldset class="form-group">
                                                {!! Form::label('City', 'City:') !!}
                                                {!! Form::text('address[city]', isset($address) ? $address->city : null, array('class' => 'form-control','id' => 'city')) !!}
                                                @error('address[city]')
                                                <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                                @enderror
                                            </fieldset>

                                            <fieldset class="form-group">
                                                {!! Form::label('State', 'State:') !!}
                                                {!! Form::text('address[state]', isset($address) ? $address->state : null, array('class' => 'form-control','id' => 'state')) !!}
                                                @error('address[state]')
                                                <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                                @enderror
                                            </fieldset>


                                            <fieldset class="form-group">
                                                {!! Form::label('ZIP', 'ZIP:') !!}
                                                {!! Form::text('address[zip]', isset($address) ? $address->zip : null, array('class' => 'form-control','id' => 'zip')) !!}
                                                @error('address[zip]')
                                                <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                                @enderror
                                            </fieldset>

                                            <h1 class="card-title">Billing Address</h1>

                                            {!! Form::hidden('billing_address[latitude]', isset($billing_address) ? $billing_address->latitude : null, array('id' => 'billing_latitude')) !!}
                                            {!! Form::hidden('billing_address[longitude]', isset($billing_address) ? $billing_address->longitude : null, array('id' => 'billing_longitude')) !!}

                                            <fieldset class="form-group">
                                                {!! Form::label('Address 1', 'Address 1:') !!}
                                                {!! Form::text('billing_address[address1]',  isset($billing_address) ? $billing_address->address1 : null, array('class' => 'form-control','id' => 'billing_address1')) !!}
                                                @error('client[address1]')
                                                <span class="invalid-feedback" role="alert">
                                                @enderror
                                            </fieldset>

                                            <fieldset class="form-group">
                                                {!! Form::label('Address 2', 'Address 2:') !!}
                                                {!! Form::text('billing_address[address2]',  isset($billing_address) ? $billing_address->address2 : null, array('class' => 'form-control','id' => 'billing_address2')) !!}
                                                @error('billing_address[address2]')
                                                <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                                @enderror
                                            </fieldset>

                                            <fieldset class="form-group">
                                                {!! Form::label('City', 'City:') !!}
                                                {!! Form::text('billing_address[city]',  isset($billing_address) ? $billing_address->city : null, array('class' => 'form-control','id' => 'billing_city')) !!}
                                                @error('billing_address[city]')
                                                <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                                @enderror
                                            </fieldset>

                                            <fieldset class="form-group">
                                                {!! Form::label('State', 'State:') !!}
                                                {!! Form::text('billing_address[state]',  isset($billing_address) ? $billing_address->state : null, array('class' => 'form-control','id' => 'billing_state')) !!}
                                                @error('billing_address[state]')
                                                <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                                @enderror
                                            </fieldset>


                                            <fieldset class="form-group">
                                                {!! Form::label('ZIP', 'ZIP:') !!}
                                                {!! Form::text('billing_address[zip]',  isset($billing_address) ? $billing_address->zip : null, array('class' => 'form-control','id' => 'billing_zip')) !!}
                                                @error('billing_address[zip]')
                                                <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                                @enderror
                                            </fieldset>

                                            <h1 class="card-title">SOCIAL MEDIA</h1>

                                            <fieldset class="form-group">
                                                {!! Form::label('Instagram', 'Instagram:') !!}
                                                {!! Form::text('client[instagram_url]', isset($client) ? $client->instagram_url : null, array('class' => 'form-control')) !!}
                                                @error('client[instagram_url]')
                                                <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                                @enderror
                                            </fieldset>

                                            <fieldset class="form-group">
                                                {!! Form::label('Facebook', 'Facebook:') !!}
                                                {!! Form::text('client[facebook_url]', isset($client) ? $client->facebook_url : null, array('class' => 'form-control')) !!}
                                                @error('client[facebook_url]')
                                                <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                                @enderror
                                            </fieldset>

                                            <fieldset class="form-group">
                                                {!! Form::label('LinkedIn:', 'LinkedIn:') !!}
                                                {!! Form::text('client[linkedin_url]', isset($client) ? $client->linkedin_url : null, array('class' => 'form-control')) !!}
                                                @error('client[linkedin_url]')
                                                <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                                @enderror
                                            </fieldset>

                                            <fieldset class="form-group">
                                                {!! Form::label('YouTube:', 'YouTube:') !!}
                                                {!! Form::text('client[youtube_url]', isset($client) ? $client->youtube_url : null, array('class' => 'form-control')) !!}
                                                @error('client[youtube_url]')
                                                <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                                @enderror
                                            </fieldset>

                                        </div>
                                    </div>
                                    <div class="row">
                                        {!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}
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
