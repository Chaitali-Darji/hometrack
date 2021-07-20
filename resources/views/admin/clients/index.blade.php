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
                                        <h4 class="card-title text-hena">Clients</h4>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{route('clients.create')}}"
                                           class="btn round bg-hena pull-right">Add</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link  active" id="home-tab" data-toggle="tab" href="#home"
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
                            </div>
                            <div class="tab-content">

                                <div class="tab-pane active" id="home" aria-labelledby="home-tab" role="tabpanel">

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
    @include('admin.partials._session-message')
    <script src="{{asset('admin/js/scripts/pages/clients/list.js')}}"></script>
@endsection
