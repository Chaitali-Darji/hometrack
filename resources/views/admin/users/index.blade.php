@extends('layouts.admin.main')

@section('content')
 <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-body">
            <div class="row" id="basic-table">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">User</h4>
                    <a href="{{route('users.create')}}" class="btn btn-primary mr-1 mb-1">Add</a>
                  </div>
                  <div class="card-body">
                    @if( Session::has( 'success' ))
                        <div class="alert alert-success alert-dismissible mb-2" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="d-flex align-items-center">
                              <span>
                                {{ Session::get( 'success' ) }}
                              </span>
                            </div>
                          </div>
                    @elseif( Session::has( 'error' ))                         
                         <div class="alert alert-danger alert-dismissible mb-2" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="d-flex align-items-center">
                              <span>
                                {{ Session::get( 'error' ) }}
                              </span>
                            </div>
                          </div>
                    @endif
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Email</th>
                            @foreach($roles as $key=>$role)
                                <th>{{$role}}</th>
                            @endforeach
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                              <tr>
                                <td class="text-bold-500">{{ $user->email }}</td>
                                @foreach($roles as $key=>$role)
                                    <td style="height:30px;width:30px;">
                                        @if(!empty($user->roles))
                                            @if (array_search($key, array_column($user->roles->toArray(), 'id')) !== FALSE)
                                                <i class="bx bx-check font-medium-1"></i>
                                            @endif
                                        @endif
                                    </td>
                                @endforeach
                                <td>
                                    <a href="{{route('users.edit',$user->id)}}">
                                        <i class="bx bx-edit-alt mr-1"></i>
                                    </a>

                                    <a href="{{route('users.destroy',$user->id)}}" data-userid="{{$user->id}}" class="delete-confirm">
                                        <i class="bx bx-trash mr-1"></i>
                                    </a>

                                    <div class="custom-control custom-switch custom-switch-success mr-2 mb-1" style="display: inline-block;">
                                      <input type="checkbox" class="custom-control-input active-user" data-userid= "{{$user->id}}" id="customSwitchcolor{{$user->id}}" data-url="{{route('admin.users.active-inactive',$user->id)}}" @if(empty($user->deleted_at)) checked @endif>
                                      <label class="custom-control-label" for="customSwitchcolor{{$user->id}}" ></label>
                                    </div>

                                </td>
                              </tr>
                            @endforeach                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
<!-- END: Content-->
@endsection

@section('page-script')
    <script src="{{asset('admin/js/scripts/pages/users/list.js')}}"></script>
@endsection