<div class="table-responsive">
  <table class="table" id="archive-roles-datatable">
    <thead>
      <tr>
        <th>State</th>
        <th>Percentage</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($archive_data as $salestax)
          <tr>
            <td>{{ ($salestax->state) ? $salestax->state->name : null}}</td>
            <td>
              {{ $salestax->tax }}%
            </td>
            <td>
                <a href="{{route('admin.archive.restore')}}" data-model="Role" data-archiveid="{{$salestax->id}}" class="restore">
                  <i class="bx bx-reset mr-1"></i>
                </a>
            </td>
          </tr>
        @endforeach                          
    </tbody>
  </table>
</div>