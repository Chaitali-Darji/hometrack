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
                <h4>Clients</h4>
                <a href="{{route('clients.create')}}" class="btn btn-primary pull-right">Add</a>
              </div>
            </div>
            <div class="card-body">
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" aria-controls="home" role="tab"
                    aria-selected="true">
                    <span class="align-middle">Active</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" aria-controls="profile" role="tab"
                    aria-selected="false">
                    <span class="align-middle">Archive</span>
                  </a>
                </li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="home" aria-labelledby="home-tab" role="tabpanel">
                  @include('admin.partials._session-message')
                  
                    <div class="table-responsive">
                      <table class="table zero-configuration" id="clients-list-datatable">
                        <thead>
                          <tr>
                            <th>Primary acount</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Brokerage</th>
                            <th>Email</th>
                            <th>Special Pricing</th>
                            <th>Mobile</th>
                            <th>Billing Total</th>
                            <th>Rank</th>
                            <th>Days since last purchase</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($clients as $client)
                            <tr>
                              <td class="text-bold-500"></td>
                              <td class="text-bold-500">{{ $client->first_name }}</td>
                              <td class="text-bold-500">{{ $client->last_name }}</td>
                              <td class="text-bold-500">{{ $client->brokerage }}</td>
                              <td class="text-bold-500">{{ $client->email }}</td>
                              <td class="text-bold-500"></td>
                              <td class="text-bold-500">{{ $client->mobile }}</td>
                              <td class="text-bold-500"></td>
                              <td class="text-bold-500"></td>
                              <td class="text-bold-500"></td>
                              <td>
                                  <a href="{{route('clients.edit',$client->id)}}">
                                      <i class="bx bx-edit-alt mr-1"></i>
                                  </a>

                                  <a href="{{route('clients.destroy',$client->id)}}" data-clientid="{{$client->id}}" class="delete-confirm">
                                      <i class="bx bx-trash mr-1"></i>
                                  </a>

                                  <div class="custom-control custom-switch custom-switch-success mr-2 mb-1" style="display: inline-block;">
                                    <input type="checkbox" class="custom-control-input active-client" data-clientid= "{{$client->id}}" id="customSwitchcolor{{$client->id}}" data-url="{{route('admin.clients.active-inactive',$client->id)}}" @if($client->is_active) checked @endif>
                                    <label class="custom-control-label" for="customSwitchcolor{{$client->id}}" ></label>
                                  </div>

                              </td>
                            </tr>
                          @endforeach   
                        </tbody>
                      </table>
                    </div>
                </div>
                <div class="tab-pane" id="profile" aria-labelledby="profile-tab" role="tabpanel">
                  @include('admin.partials._session-message')       
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
    <script src="{{asset('admin/js/scripts/pages/users/list.js')}}"></script>
@endsection