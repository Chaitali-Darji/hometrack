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
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-9">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="service-tab" data-toggle="tab" href="#service"
                                               aria-controls="service" role="tab"
                                               aria-selected="true">
                                                <span class="align-middle">Services</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="region-tab" data-toggle="tab" href="#region"
                                               aria-controls="region" role="tab"
                                               aria-selected="false">
                                                <span class="align-middle">Regions</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="service-type-tab" data-toggle="tab" href="#service-type"
                                               aria-controls="service-type" role="tab"
                                               aria-selected="false">
                                                <span class="align-middle">Service Types</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-content">
                                @include('admin.partials._session-message')
                                <div class="tab-pane active" id="service" aria-labelledby="service-tab" role="tabpanel">

                                </div>
                                <div class="tab-pane" id="region" aria-labelledby="region-tab" role="tabpanel">
                                    @include('admin.regions.index')
                                </div>
                                <div class="tab-pane" id="service-type" aria-labelledby="service-type-tab" role="tabpanel">
                                    @include('admin.service-types.index')
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
    <script src="{{asset('admin/js/scripts/pages/regions/list.js')}}"></script>
    <script src="{{asset('admin/js/scripts/pages/service-types/list.js')}}"></script>
@endsection
