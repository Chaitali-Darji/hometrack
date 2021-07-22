<div class="table-responsive">
    <table class="table zero-configuration">
        <thead>
        <tr>
            <th>Name</th>
            <th>Service Type</th>
            <th>Description</th>
            <th>Link</th>
            <th>Display Section</th>
            <th width="15%">Action</th>
        </tr>
        </thead>
        <tbody id="basic-list-group">
        @foreach($services as $service)
            <tr class="draggable list" service-id="{{$service->id}}">
                <td class="text-bold-500"><span class="handle">+</span>{{ $service->name }}</td>
                <td class="text-bold-500">{{ $service->service_type->name ?? 'N/A'  }}</td>
                <td class="text-bold-500">{{ $service->description }}</td>
                <td class="text-bold-500">{{ $service->youtube_or_vimeo_link }}</td>
                <td class="text-bold-500">{{ $service->display_section }}</td>

                <td>
                    <a href="{{route('services.edit',$service->id)}}">
                        <i class="bx bx-edit-alt text-hena mr-1"></i>
                    </a>

                    <a href="{{route('services.destroy',$service->id)}}" data-serviceid="{{$service->id}}" class="delete-confirm">
                        <i class="bx bx-trash text-danger mr-1"></i>
                    </a>

                    <div class="custom-control custom-switch custom-switch-success mr-2"
                         style="display: inline-block;">
                        <input type="checkbox" class="custom-control-input active-service" data-serviceid= "{{$service->id}}" id="customSwitchcolor{{$service->id}}" data-url="{{route('admin.services.active-inactive',$service->id)}}" @if($service->is_active) checked @endif>
                        <label class="custom-control-label" for="customSwitchcolor{{$service->id}}" ></label>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div class="pagination pull-right">

    {{$services->links()}}
</div>
