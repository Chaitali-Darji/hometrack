<div class="table-responsive">
    <table class="table zero-configuration">
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
        @foreach($pricing as $price)
            <tr>
                <td>{{ ucwords(str_replace('_',' ',$price->type)) }}</td>
                <td>{{ ($price->service) ? $price->service->name : config('constants.N/A')}}</td>
                <td>{{ $price->name }}</td>
                <td>{{ $price->code }}</td>
                <td>{{ format_price($price->price) }}</td>
                <td>{{ $price->brokerage ??  config('constants.N/A')}}</td>
                <td>
                    <a class="edit-pricing" href="{{route('pricing.edit',$price->id)}}">
                        <i class="bx text-hena bx-edit-alt mr-1"></i>
                    </a>
                    <a href="{{route('pricing.destroy',$price->id)}}"
                       data-clientid="{{$price->id}}" class="delete-confirm">
                        <i class="bx text-danger bx-trash mr-1"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div class="pagination pull-right">
    {{$pricing->links()}}
</div>
