<div class="table-responsive">
    <table class="table dtable zero-configuration" id="archive-list-datatable">
        <thead>
        <tr>
            <th>Primary acount</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Brokerage</th>
            <th>Email</th>
            <th>Special Pricing</th>
            <th>Mobile</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($archive_data as $archive)
            <tr>
                <td class="text-bold-500">{{ ($archive->primary_account) ? $archive->primary_account->last_name : null}}</td>
                <td class="text-bold-500">{{ $archive->first_name }}</td>
                <td class="text-bold-500">{{ $archive->last_name }}</td>
                <td class="text-bold-500">{{ $archive->brokerage }}</td>
                <td class="text-bold-500">{{ $archive->email }}</td>
                <td class="text-bold-500"></td>
                <td class="text-bold-500">{{ $archive->mobile_phone }}</td>
                <td>
                    <a href="{{route('admin.archive.restore')}}" data-model="Client" data-archiveid="{{$archive->id}}"
                       class="restore">
                        <i class="bx bx-reset text-hena mr-1"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
