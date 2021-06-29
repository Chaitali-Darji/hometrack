@extends('layouts.admin.main')

@section('content')
 <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-12 mb-2 mt-1">
            <!-- <div class="breadcrumbs-top">
              <h5 class="content-header-title float-left pr-1 mb-0">Bootstrap Tables</h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="index.html"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item active">Table
                  </li>
                </ol>
              </div>
            </div> -->
          </div>
        </div>
        <div class="content-body">
            <!-- Basic Tables start -->
                <div class="row" id="basic-table">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h4 class="card-title">User</h4>
                        <a href="{{route('users.create')}}" class="btn btn-primary mr-1 mb-1">Add</a>
                      </div>
                      <div class="card-body">
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
                                                @if(array_search($key,$user->roles->pluck('id')->toArray()))
                                                    <i class="bx bx-check font-medium-1"></i>
                                                @endif
                                            @endif
                                        </td>
                                    @endforeach
                                    <td><a href="{{route('users.edit',$user->id)}}"><i
                                          class="badge-circle badge-circle-light-secondary bx bx-pencil font-medium-1"></i></a></td>
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