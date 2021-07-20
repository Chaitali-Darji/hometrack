<div class="table-responsive">
    <table class="table dtable" id="archive-states-datatable">
    <thead>
      <tr>
          <th width="60%">Name</th>
          <th>Deleted Date</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($archive_data as $state)
          <tr>
              <td>{{ $state->name }}</td>
              <td>{{ format_date($state->deleted_at) }}</td>
            <td>
                <a href="{{route('admin.archive.restore')}}" data-model="State" data-archiveid="{{$state->id}}" class="restore">
                    <i class="bx bx-reset text-hena mr-1"></i>
                </a>
            </td>
          </tr>
        @endforeach                          
    </tbody>
  </table>
</div>