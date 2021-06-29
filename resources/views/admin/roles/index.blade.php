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
                    <h4 class="card-title">Role</h4>
                    <a href="{{route('roles.create')}}" class="btn btn-primary mr-1 mb-1">Add</a>
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
                            <th>Name</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $role)
                              <tr>
                                <td class="text-bold-500">{{ $role->name }}</td>
                                <td>
                                    <a href="{{route('roles.edit',$role->id)}}">
                                        <i class="bx bx-edit-alt mr-1"></i>
                                    </a>

                                    <a href="{{route('roles.destroy',$role->id)}}" data-roleid="{{$role->id}}" class="delete-confirm">
                                        <i class="bx bx-trash mr-1"></i>
                                    </a>

                                    <div class="custom-control custom-switch custom-switch-success mr-2 mb-1" style="display: inline-block;">
                                      <input type="checkbox" class="custom-control-input active-role" data-roleid= "{{$role->id}}" id="customSwitchcolor{{$role->id}}" data-url="{{route('admin.roles.active-inactive',$role->id)}}" @if(empty($role->deleted_at)) checked @endif>
                                      <label class="custom-control-label" for="customSwitchcolor{{$role->id}}" ></label>
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
    <script src="{{asset('admin/js/scripts/pages/roles/list.js')}}"></script>
@endsection