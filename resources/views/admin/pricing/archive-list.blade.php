<div class="table-responsive">
    <table class="table dtable zero-configuration" id="archive-list-datatable">
        <thead>
        <tr>
            <th>Service Type</th>
            <th>Service</th>
            <th>Name</th>
            <th>Code</th>
            <th>Price</th>
            <th>Commission</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($archive_data as $price)
            <tr>
                <td>{{ ucwords(str_replace('_',' ',$price->type)) }}</td>
                <td>{{ ($price->service) ? $price->service->name : config('constants.N/A')}}</td>
                <td>{{ $price->name }}</td>
                <td>{{ $price->code }}</td>
                <td>{{ $price->price }}</td>
                <td>{{ $price->brokerage ??  config('constants.N/A')}}</td>
                <td>
                    <a href="{{route('admin.archive.restore')}}" data-model="Pricing" data-archiveid="{{$price->id}}"
                       class="restore">
                        <i class="bx bx-reset text-hena mr-1"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
