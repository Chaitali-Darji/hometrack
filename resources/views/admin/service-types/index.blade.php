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
                                        <h4 class="card-title">Service Types</h4>
                                    </div>
                                    <div class="col-md-6"><a href="{{route('service-types.create')}}"
                                                             class="btn round btn-hena pull-right add-service-type">Add</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="service-type-home-tab" data-toggle="tab" href="#service-type-home"
                                       aria-controls="service-type-home" role="tab"
                                       aria-selected="true">
                                        <span class="align-middle">Active</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="service-type-profile-tab" data-toggle="tab" href="#service-type-profile"
                                       aria-controls="service-type-profile"
                                       role="tab"
                                       aria-selected="false">
                                        <span class="align-middle">Archive</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="service-type-home" aria-labelledby="service-type-home-tab" role="tabpanel">

                                    <div class="table-responsive">
                                        <table class="table dtable" id="service-types-datatable">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($service_types as $service_type)
                                                <tr>
                                                    <td class="text-bold-500">{{ $service_type->name }}</td>
                                                    <td>
                                                        <a class="edit-service-type" href="{{route('service-types.edit',$service_type->id)}}">
                                                            <i class="bx bx-edit-alt text-hena mr-1"></i>
                                                        </a>

                                                        <a href="{{route('service-types.destroy',$service_type->id)}}"
                                                           data-service_typeid="{{$service_type->id}}" class="delete-confirm">
                                                            <i class="bx bx-trash text-danger mr-1"></i>
                                                        </a>

                                                        <div class="custom-control custom-switch custom-switch-success mr-2"
                                                             style="display: inline-block;">
                                                            <input type="checkbox" class="custom-control-input active-service_type"
                                                                   data-service_typeid="{{$service_type->id}}"
                                                                   id="customSwitch{{$service_type->id}}"
                                                                   data-url="{{route('admin.service-types.active-inactive',$service_type->id)}}"
                                                                   @if($service_type->is_active) checked @endif>
                                                            <label class="custom-control-label"
                                                                   for="customSwitch{{$service_type->id}}"></label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="service-type-profile" aria-labelledby="service-type-profile-tab" role="tabpanel">
                                    @include('admin.service-types.archive-list')
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
    <script src="{{asset('admin/js/scripts/pages/service-types/list.js')}}"></script>
@endsection
