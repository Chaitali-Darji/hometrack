@extends('layouts.admin.main')

@section('content')
 <!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
      <div class="content-body">

        <section id="basic-tabs-components">
          <div class="card">
            <div class="card-header">
              <div class="card-title w100">
                <div class="row">
                  <div class="col-md-6">
                        <h4 class="card-title">SMS Templates</h4>
                  </div>
                  <div class="col-md-6"><button id="reminder" class="btn btn-xs btn-primary pull-right" type="button">Appointment Reminder Time</button></div>
                </div>
              </div>
            </div>
            <div class="card-body">
                  @include('admin.partials._session-message')

                  <div class="col-md-12">
                    {!! Form::open(array('route' => array('admin.sms-templates.change-appointment-reminder'),'id' => 'reminderForm','style' =>"margin: 0 auto; text-align: center;display: none")) !!}
                    {{ method_field('POST') }}
                        <div class="row ">
                            <div class="col-md-3">
                            <label for="" class="control-label ">Appointment Reminder Time</label>
                          </div>
                          <div class="col-md-5">
                            <input type="time" name="time" class="form-control sms-time" value="{{config('settings.appointment_reminder_time') ?? ''}}">
                            {!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}
                          </div>
                          <div class="col-md-4">
                          </div>
                        </div>
                    {!! Form::close() !!} 
                  </div>
                  <br>
                  
                    <div class="table-responsive">
                      <table class="table" id="sms_templates-datatable">
                        <thead>
                          <tr>
                            <th>Type</th>
                            <th>Body</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($sms_templates as $sms_template)
                              <tr>
                                <td class="text-bold-500">{{ $sms_template->template_type }}</td>
                                <td>
                                  {{ $sms_template->body }}
                                </td>
                                <td>
                                    <a data-id="{{ $sms_template->id }}" title="Edit Template" data-title="{{ $sms_template->template_type }}"  data-body="{{ $sms_template->body }}"  href="#" class="edit_review">
                                        <i class="bx bx-edit-alt mr-1"></i>
                                    </a>
                                    <a style="color: #f8ac59;" data-id="{{ $sms_template->id }}" title="Send SMS" href="#" class="send_sms"> <i class="bx bx-paper-plane mr-1"></i> </a>
                                </td>
                              </tr>
                            @endforeach                          
                        </tbody>
                      </table>
                    </div>
                </div>
          </div>
        </section>
      </div>
    </div>
  </div>

   <div class="modal fade" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              
              {!! Form::open(array('route' => array('admin.sms-templates.change-sms-template'),'id' => 'reviewForm')) !!}
               {{ method_field('POST') }}
            
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"> <span id="review_type"> </span></h5>
              </div>
              <div class="modal-body">
                  <div class="form-group">
                      {!! Form::label('Body', 'Body:') !!}
                      {!! Form::textarea('sms_template[body]', null, array('class' => 'form-control required', 'id'=>"review_title")) !!}
                      {!! Form::hidden('id',null,array('id' => 'review_id') ) !!}
                  </div>
                  <i class="text-danger">Please don't change constants under braces {}. It will use for replacing actual value.</i>

              </div>
              <div class="modal-footer">
                  {!! Form::button('Cancel', array('class' => 'btn btn-secondary','data-dismiss'=> 'modal')) !!}
                  {!! Form::submit('Save changes', array('class' => 'btn btn-primary','id' => 'save_data')) !!}
              </div>
              {!! Form::close() !!} 
          </div>
      </div>
  </div>
  <div class="modal fade" id="sendSmsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">

            {!! Form::open(array('route' => array('admin.sms-templates.send-test'),'id' => 'reviewSmsForm')) !!}
               {{ method_field('POST') }}

                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel"> Send Test SMS</h5>

                  </div>
                  <div class="modal-body">
                      <div class="form-group">

                        {!! Form::label('Phone Number', 'Phone Number:') !!}
                        {!! Form::number('phone_number', null, array('class' => 'form-control required', 'id'=>"phone_number")) !!}
                        {!! Form::hidden('id',null,array('id' => 'sms_review_id') ) !!}
                      </div>

                  </div>
                  <div class="modal-footer">
                      {!! Form::button('Close', array('class' => 'btn btn-secondary','data-dismiss'=> 'modal')) !!}
                      {!! Form::submit('Send SMS', array('class' => 'btn btn-primary','id' => 'save_data')) !!}
                  </div>
               {!! Form::close() !!} 
          </div>
      </div>
  </div>
<!-- END: Content-->
@endsection

@section('page-script')
    <script src="{{asset('admin/js/scripts/pages/sms-templates/list.js')}}"></script>
@endsection