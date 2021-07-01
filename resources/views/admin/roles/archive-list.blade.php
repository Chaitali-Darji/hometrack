<div class="table-responsive">
  <table class="table" id="archive-roles-datatable">
    <thead>
      <tr>
        <th>Name</th>
        <th>Permissions</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($archive_data as $role)
          <tr>
            <td class="text-bold-500">{{ $role->name }}</td>
            <td>
            @foreach($role->modules as $key=>$module)
              @if($key == count($role->modules)-1)
                {{$module->name}}
              @else
                {{$module->name}},
              @endif
            @endforeach
            </td>
            <td>
                <a href="{{route('admin.archive.restore')}}" data-model="Role" data-archiveid="{{$role->id}}" class="restore">
                  <i class="bx bx-reset mr-1"></i>
                </a>
            </td>
          </tr>
        @endforeach                          
    </tbody>
  </table>
</div>