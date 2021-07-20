<div class="table-responsive">
    <table class="table dtable" id="archive-roles-datatable">
        <thead>
        <tr>
            <th>State</th>
            <th>Percentage</th>
            <th>Deleted At</th>
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
                    {{ format_date($salestax->deleted_at) }}
                </td>
                <td>
                    <a href="{{route('admin.archive.restore')}}" data-model="SalesTax"
                       data-archiveid="{{$salestax->id}}"
                       class="restore">
                        <i class="bx bx-reset text-hena mr-1"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
