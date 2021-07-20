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
              <div class="card-title">
                  <h4 class="card-title text-hena">Email Templates</h4>
              </div>
            </div>
            <div class="card-body">

                  
                    <div class="table-responsive">
                        <table class="table dtable" id="email_templates-datatable">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($email_templates as $email_template)
                              <tr>
                                  <td>{{ $email_template->name }}</td>
                                <td>
                                  {{ $email_template->description }}
                                </td>
                                <td>
                                    <a href="{{route('email-templates.edit',$email_template->id)}}">
                                        <i class="bx bx-edit-alt text-hena mr-1"></i>
                                    </a>
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
<!-- END: Content-->
@endsection

@section('page-script')
    @include('admin.partials._session-message')
    <script src="{{asset('admin/js/scripts/pages/email-templates/list.js')}}"></script>
@endsection