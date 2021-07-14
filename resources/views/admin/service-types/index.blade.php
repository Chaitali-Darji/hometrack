<div class="card">
    <div class="card-header">

        <div class="card-title w100">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="card-title">Service Types</h4>
                </div>
                <div class="col-md-6"><a href="{{route('service-types.create')}}"
                                         class="btn btn-primary round pull-right">Add</a></div>
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
                @include('admin.partials._session-message')

                <div class="table-responsive">
                    <table class="table" id="service-types-datatable">
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
                                    <a href="{{route('service-types.edit',$service_type->id)}}">
                                        <i class="bx bx-edit-alt mr-1"></i>
                                    </a>

                                    <a href="{{route('service-types.destroy',$service_type->id)}}"
                                       data-service_typeid="{{$service_type->id}}" class="delete-confirm">
                                        <i class="bx bx-trash mr-1"></i>
                                    </a>

                                    <div class="custom-control custom-switch custom-switch-success mr-2 mb-1"
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
                @include('admin.partials._session-message')
                @include('admin.service-types.archive-list')
            </div>
        </div>
    </div>
</div>
