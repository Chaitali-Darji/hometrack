<div class="table-responsive">
  <table class="table" id="archive-states-datatable">
    <thead>
      <tr>
        <th>Name</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($archive_data as $region)
          <tr>
            <td class="text-bold-500">{{ $region->name }}</td>
            <td>
                <a href="{{route('admin.archive.restore')}}" data-model="Region" data-archiveid="{{$region->id}}" class="restore">
                  <i class="bx bx-reset mr-1"></i>
                </a>
            </td>
          </tr>
        @endforeach                          
    </tbody>
  </table>
</div>