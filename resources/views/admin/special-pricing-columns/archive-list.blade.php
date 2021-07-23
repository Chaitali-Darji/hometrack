<div class="table-responsive">
    <table class="table dtable" id="archive-roles-datatable">
    <thead>
      <tr>
        <th>Name</th>
        <th>Deleted Date</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($archive_data as $role)
          <tr>
              <td>{{ $role->name }}</td>
              <td>{{ format_date($role->deleted_at) }}</td>
              <td>
                <a href="{{route('admin.archive.restore')}}" data-model="SpecialPricingColumn" data-archiveid="{{$role->id}}" class="restore">
                    <i class="bx bx-reset text-hena mr-1"></i>
                </a>
              </td>
          </tr>
        @endforeach
    </tbody>
  </table>
</div>
