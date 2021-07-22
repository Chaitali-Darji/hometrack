<div class="table-responsive">
    <table class="table dtable" id="archive-states-datatable">
    <thead>
      <tr>
        <th>Name</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($archive_data as $service_type)
          <tr>
            <td class="text-bold-500">{{ $service_type->name }}</td>
            <td>
                <a href="{{route('admin.archive.restore')}}" data-model="ServiceType" data-archiveid="{{$service_type->id}}" class="restore">
                  <i class="bx bx-reset text-hena mr-1"></i>
                </a>
            </td>
          </tr>
        @endforeach
    </tbody>
  </table>
</div>
