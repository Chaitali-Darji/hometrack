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
                      <h4 class="card-title text-hena">Users</h4>
                  </div>
                    <div class="col-md-6"><a href="{{route('users.create')}}"
                                             class="btn round btn-hena pull-right">Add</a></div>
                </div>
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

                  
                    <div class="table-responsive">
                        <table class="table dtable zero-configuration" id="users-list-datatable">
                        <thead>
                          <tr>
                              <th>Name</th>
                            <th>Email</th>
                              <th>Roles</th>
                              <th>Created Date</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>

                                <td>
                                    @foreach($roles as $key=>$role)
                                  @if(!empty($user->roles))
                                      @if (array_search($key, array_column($user->roles->toArray(), 'id')) !== FALSE)
                                                {{$role}},
                                      @endif
                                  @endif
                                    @endforeach
                              </td>
                                <td>{{ format_date($user->created_at) }}</td>
                              <td>
                                  <a href="{{route('users.edit',$user->id)}}">
                                      <i class="bx bx-edit-alt text-hena mr-1"></i>
                                  </a>

                                  <a href="{{route('users.destroy',$user->id)}}" data-userid="{{$user->id}}" class="delete-confirm">
                                      <i class="bx bx-trash text-danger mr-1"></i>
                                  </a>

                                  <div class="custom-control custom-switch custom-switch-success mr-2"
                                       style="display: inline-block;">
                                    <input type="checkbox" class="custom-control-input active-user" data-userid= "{{$user->id}}" id="customSwitchcolor{{$user->id}}" data-url="{{route('admin.users.active-inactive',$user->id)}}" @if($user->is_active) checked @endif>
                                    <label class="custom-control-label" for="customSwitchcolor{{$user->id}}" ></label>
                                  </div>

                              </td>
                            </tr>
                          @endforeach   
                        </tbody>
                      </table>
                    </div>
                </div>
                <div class="tab-pane" id="profile" aria-labelledby="profile-tab" role="tabpanel">
                    @include('admin.users.archive-list')
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
    <script src="{{asset('admin/js/scripts/pages/users/list.js')}}"></script>
@endsection