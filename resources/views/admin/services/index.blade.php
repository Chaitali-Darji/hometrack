<div class="card">
    <div class="card-header">

        <div class="card-title w100">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="card-title">Services</h4>
                </div>
                <div class="col-md-6">
                    <a href="{{route('services.create')}}" class="btn btn-primary pull-right">Add</a>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="services-home-tab" data-toggle="tab" href="#services-home"
                   aria-controls="services-home" role="tab"
                   aria-selected="true">
                    <span class="align-middle">Active</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="services-profile-tab" data-toggle="tab" href="#services-profile"
                   aria-controls="services-profile"
                   role="tab"
                   aria-selected="false">
                    <span class="align-middle">Archive</span>
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="services-home" aria-labelledby="services-home-tab" role="tabpanel">
                <div class="table-responsive">
                    <table class="table dtable" id="services-datatable">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Service Type</th>
                            <th>Description</th>
                            <th>Link</th>
                            <th>Display Section</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($services as $service)
                            <tr>
                                <td class="text-bold-500">{{ $service->name }}</td>
                                <td class="text-bold-500">{{ $service->service_type->name ?? 'N/A'  }}</td>
                                <td class="text-bold-500">{{ $service->description }}</td>
                                <td class="text-bold-500">{{ $service->youtube_or_vimeo_link }}</td>
                                <td class="text-bold-500">{{ $service->display_section }}</td>
                                <td>
                                    <a href="{{route('services.edit',$service->id)}}">
                                        <i class="bx bx-edit-alt mr-1"></i>
                                    </a>

                                    <a href="{{route('services.destroy',$service->id)}}"
                                       data-service_typeid="{{$service->id}}" class="delete-confirm">
                                        <i class="bx bx-trash mr-1"></i>
                                    </a>

                                    <div class="custom-control custom-switch custom-switch-success mr-2"
                                         style="display: inline-block;">
                                        <input type="checkbox" class="custom-control-input active-service"
                                               data-service_typeid="{{$service->id}}"
                                               id="customSwitch{{$service->id}}"
                                               data-url="{{route('admin.services.active-inactive',$service->id)}}"
                                               @if($service->is_active) checked @endif>
                                        <label class="custom-control-label"
                                               for="customSwitch{{$service->id}}"></label>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane" id="services-profile" aria-labelledby="services-profile-tab" role="tabpanel">
                @include('admin.services.archive-list')
            </div>
        </div>
    </div>
</div>
