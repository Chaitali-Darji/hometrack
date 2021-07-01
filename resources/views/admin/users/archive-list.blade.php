<div class="table-responsive">
  <table class="table zero-configuration" id="archive-list-datatable">
    <thead>
      <tr>
        <th>Email</th>
        @foreach($roles as $key=>$role)
        <th>{{$role}}</th>
        @endforeach
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($archive_data as $archive)
        <tr>
          <td class="text-bold-500">{{ $archive->email }}</td>
          @foreach($roles as $key=>$role)
          <td>
              @if(!empty($archive->roles))
                  @if (array_search($key, array_column($archive->roles->toArray(), 'id')) !== FALSE)
                      <i class="bx bx-check font-medium-1"></i>
                  @endif
              @endif
          </td>
          @endforeach
          <td>
              <a href="{{route('admin.archive.restore')}}" data-model="User" data-archiveid="{{$archive->id}}" class="restore">
                  <i class="bx bx-reset mr-1"></i>
              </a>
          </td>
        </tr>
      @endforeach   
    </tbody>
  </table>
</div>