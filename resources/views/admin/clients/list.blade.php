<div class="table-responsive">
    <table class="table zero-configuration">
        <thead>
        <tr>
            <th>Primary acount</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Brokerage</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($clients as $client)
            <tr>
                <td>{{ ($client->primary_account) ? $client->primary_account->last_name : config('constants.N/A')}}</td>
                <td>{{ $client->first_name }}</td>
                <td>{{ $client->last_name }}</td>
                <td>{{ $client->brokerage ??  config('constants.N/A')}}</td>
                <td>{{ $client->email }}</td>
                <td>{{ $client->mobile_phone }}</td>
                <td>
                    <a href="{{route('clients.edit',$client->id)}}">
                        <i class="bx text-hena bx-edit-alt mr-1"></i>
                    </a>

                    <a href="{{route('clients.destroy',$client->id)}}"
                       data-clientid="{{$client->id}}" class="delete-confirm">
                        <i class="bx text-danger bx-trash mr-1"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div class="pagination pull-right">

    {{$clients->links()}}
</div>