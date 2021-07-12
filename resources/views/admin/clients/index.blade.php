@extends('layouts.admin.main')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-body">
                <section id="basic-tabs-components">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title w100">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 class="card-title">Clients</h4>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{route('clients.create')}}"
                                           class="btn btn-primary pull-right">Add</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-9">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                                               aria-controls="home" role="tab"
                                               aria-selected="true">
                                                <span class="align-middle">Active</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile"
                                               aria-controls="profile" role="tab"
                                               aria-selected="false">
                                                <span class="align-middle">Archive</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-3">
                                    <fieldset class="form-group position-relative has-icon-left">
                                        <form action="" name="dateRangePickerForm" id="dateRangePickerForm">
                                            <input type="hidden" name="reportrangeVal" value="" id="reportrangeVal">
                                            <div id="reportrange"
                                                 style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                                                <i class="fa fa-calendar"></i>&nbsp;
                                                <span></span> <i class="fa fa-caret-down"></i>
                                            </div>
                                        </form>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="tab-content">
                                @include('admin.partials._session-message')
                                <div class="tab-pane active" id="home" aria-labelledby="home-tab" role="tabpanel">
                                    <div class="table-responsive">
                                        <table class="table zero-configuration" id="clients-list-datatable">
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
                                            @foreach($clients as $client)
                                                <tr>
                                                    <td class="text-bold-500">{{ ($client->primary_account) ? $client->primary_account->last_name : null}}</td>
                                                    <td class="text-bold-500">{{ $client->first_name }}</td>
                                                    <td class="text-bold-500">{{ $client->last_name }}</td>
                                                    <td class="text-bold-500">{{ $client->brokerage }}</td>
                                                    <td class="text-bold-500">{{ $client->email }}</td>
                                                    <td class="text-bold-500"></td>
                                                    <td class="text-bold-500">{{ $client->mobile_phone }}</td>
                                                    <td>
                                                        <a href="{{route('clients.edit',$client->id)}}">
                                                            <i class="bx bx-edit-alt mr-1"></i>
                                                        </a>

                                                        <a href="{{route('clients.destroy',$client->id)}}"
                                                           data-clientid="{{$client->id}}" class="delete-confirm">
                                                            <i class="bx bx-trash mr-1"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="profile" aria-labelledby="profile-tab" role="tabpanel">
                                    @include('admin.clients.archive-list')
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection

@section('page-script')
    <script src="{{asset('admin/js/scripts/pages/clients/list.js')}}"></script>
@endsection
