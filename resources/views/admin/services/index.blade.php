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
                                        <h4 class="card-title">Services</h4>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{route('services.create')}}" class="btn round btn-hena pull-right">Add</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                                       aria-controls="home" role="tab"
                                       aria-selected="true">
                                        <span class="align-middle">Active</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="services-profile-tab" data-toggle="tab" href="#services-profile"
                                       aria-controls="services-profile"
                                       role="tab"
                                       aria-selected="false">
                                        <span class="align-middle">Archive</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="home" aria-labelledby="home-tab" role="tabpanel">
                                </div>
                                <div class="tab-pane" id="services-profile" aria-labelledby="services-profile-tab" role="tabpanel">
                                    @include('admin.services.archive-list')
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
    <script src="{{asset('admin/js/scripts/pages/services/list.js')}}"></script>
@endsection
