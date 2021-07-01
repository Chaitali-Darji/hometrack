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
                <h4 class="card-title">Role</h4>
                <a href="{{route('roles.create')}}" class="btn btn-primary mr-1 mb-1">Add</a>
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
                      <table class="table" id="roles-datatable">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Permissions</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $role)
                              <tr>
                                <td class="text-bold-500">{{ $role->name }}</td>
                                <td>
                                @foreach($role->modules as $key=>$module)
                                  @if($key == count($role->modules)-1)
                                    {{$module->name}}
                                  @else
                                    {{$module->name}},
                                  @endif
                                @endforeach
                                </td>
                                <td>
                                    <a href="{{route('roles.edit',$role->id)}}">
                                        <i class="bx bx-edit-alt mr-1"></i>
                                    </a>

                                    <a href="{{route('roles.destroy',$role->id)}}" data-roleid="{{$role->id}}" class="delete-confirm">
                                        <i class="bx bx-trash mr-1"></i>
                                    </a>

                                    <div class="custom-control custom-switch custom-switch-success mr-2 mb-1" style="display: inline-block;">
                                      <input type="checkbox" class="custom-control-input active-role" data-roleid= "{{$role->id}}" id="customSwitchcolor{{$role->id}}" data-url="{{route('admin.roles.active-inactive',$role->id)}}" @if($role->is_active) checked @endif>
                                      <label class="custom-control-label" for="customSwitchcolor{{$role->id}}" ></label>
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
                  @include('admin.roles.archive-list')                  
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
    <script src="{{asset('admin/js/scripts/pages/roles/list.js')}}"></script>
@endsection