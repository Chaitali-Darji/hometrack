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
                                    <h4 class="card-title text-hena">Email Template Edit</h4>
                                    {!! link_to_route('email-templates.index', 'Back', null, array('class' => 'btn btn-dark round pull-right')) !!}

                                </div>
                                <div class="card-body">


                                    {!! Form::model($email_template, array('route' => array('email-templates.update', $email_template->id),'id' => 'jquery-email_template-form', 'class' => 'jquery-validate-form')) !!}
                                    {{ method_field('PATCH') }}
                                    {!! Form::hidden('id', isset($email_template) ? $email_template->id : null) !!}

                                    <div class="row">
                                        <div class="col-md-3">
                                            <fieldset class="form-group">
                                                {!! Form::label('name', 'Name:') !!}
                                                <div class="form-label-group position-relative has-icon-left">
                                                    {!! Form::text('email_template[name]', isset($email_template) ? $email_template->name : null, array('class' => 'form-control noSpace required','placeholder'=>"Enter Name")) !!}
                                                    <div class="form-control-position">
                                                        <i class="bx bx-mail-send"></i>
                                                    </div>
                                                @error('email_template.name')
                                                <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-3">

                                            <fieldset class="form-group">
                                                {!! Form::label('subject', 'Subject:') !!}
                                                <div class="form-label-group position-relative has-icon-left">
                                                    {!! Form::text('email_template[subject]', isset($email_template) ? $email_template->subject : null, array('class' => 'form-control noSpace required','placeholder'=>"Enter Subject")) !!}
                                                    <div class="form-control-position">
                                                        <i class="bx bx-note"></i>
                                                    </div>
                                                    @error('email_template.subject')
                                                    <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                                </span>
                                                    @enderror
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-3">
                                            <fieldset class="form-group">
                                                {!! Form::label('from', 'From:') !!}
                                                <div class="form-label-group position-relative has-icon-left">
                                                    {!! Form::select('email_template[from]', $users,isset($email_template) ? $email_template->from : null, array('class' => 'form-control noSpace required')) !!}
                                                    <div class="form-control-position">
                                                        <i class="bx bx-send"></i>
                                                    </div>
                                                    @error('email_template.from')
                                                <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-3">
                                            <fieldset class="form-group">
                                                {!! Form::label('bcc', 'BCC:') !!}
                                                <div class="form-label-group position-relative has-icon-left">
                                                    {!! Form::select('email_template[bcc]', $users,isset($email_template) ? $email_template->bcc : null, array('class' => 'form-control noSpace required')) !!}
                                                    <div class="form-control-position">
                                                        <i class="bx bx-user-circle"></i>
                                                    </div>
                                                @error('email_template.bcc')
                                                <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-9">
                                            <fieldset class="form-group">
                                                {!! Form::label('Tags', 'Tags:') !!}
                                                <p>You can use the following tags in the subject and body of your
                                                    template and they will automatically be populated with the proper
                                                    values when your email is sent:</p>
                                                <p>[user-name]</br>[reset-password-link]</p>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-3 mt-lg-75 pull-right">
                                            {!! Form::submit('Submit', array('class' => 'btn round btn-hena pull-right')) !!}
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <fieldset class="form-group">
                                                {!! Form::label('body', 'Body:') !!}

                                                {!! Form::hidden('email_template[body]', isset($email_template) ? $email_template->body : null, array('id' => 'email_template_body')) !!}
                                                {!! Form::hidden('email_template[body_json]', isset($email_template) ? $email_template->body_json : null, array('id' => 'email_template_body_json', 'required' => true)) !!}
                                                <div id="editor-container" style="height: 79vh;width: 100%"></div>
                                                @error('email_template.body')
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                                @enderror
                                            </fieldset>
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
    <script src="//editor.unlayer.com/embed.js"></script>
    <script src="{{asset('admin/js/scripts/pages/email-templates/add-edit.js')}}"></script>
@endsection
