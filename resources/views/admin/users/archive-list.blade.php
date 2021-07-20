<div class="table-responsive">
    <table class="table dtable zero-configuration" id="archive-list-datatable">
    <thead>
      <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Roles</th>
          <th>Deleted Date</th>
          <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($archive_data as $archive)
          <tr>
              <td>{{ $archive->name }}</td>
              <td>{{ $archive->email }}</td>

              <td>
                  @foreach($roles as $key=>$role)
                      @if(!empty($archive->roles))
                          @if (array_search($key, array_column($archive->roles->toArray(), 'id')) !== FALSE)
                              {{$role}},
                          @endif
                      @endif
                  @endforeach
              </td>
              <td>{{ format_date($archive->deleted_at) }}</td>
              <td>
                  <a href="{{route('admin.archive.restore')}}" data-model="User" data-archiveid="{{$archive->id}}"
                     class="restore">
                      <i class="bx bx-reset text-hena mr-1"></i>
                  </a>
              </td>
          </tr>
      @endforeach   
    </tbody>
  </table>
</div>