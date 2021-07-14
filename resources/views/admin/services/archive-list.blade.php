<div class="table-responsive">
  <table class="table" id="archive-services-datatable">
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
        @foreach($services_archive_data as $service)
          <tr>
            <td class="text-bold-500">{{ $service->name }}</td>
            <td class="text-bold-500">{{ $service->service_type->name ?? 'N/A'  }}</td>
            <td class="text-bold-500">{{ $service->description }}</td>
            <td class="text-bold-500">{{ $service->youtube_or_vimeo_link }}</td>
            <td class="text-bold-500">{{ $service->display_section }}</td>
            <td>
                <a href="{{route('admin.archive.restore')}}" data-model="Service" data-archiveid="{{$service->id}}" class="restore">
                  <i class="bx bx-reset mr-1"></i>
                </a>
            </td>
          </tr>
        @endforeach
    </tbody>
  </table>
</div>
