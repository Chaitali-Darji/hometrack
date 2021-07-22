<div class="table-responsive">
    <table class="table dtable" id="archive-states-datatable">
    <thead>
      <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($archive_data as $region)
          <tr>
            <td class="text-bold-500">{{ $region->name }}</td>
            <td>{{ $region->description }}</td>
            <td>
                <a href="{{route('admin.archive.restore')}}" data-model="Region" data-archiveid="{{$region->id}}" class="restore">
                  <i class="bx bx-reset text-hena mr-1"></i>
                </a>
            </td>
          </tr>
        @endforeach
    </tbody>
  </table>
</div>
