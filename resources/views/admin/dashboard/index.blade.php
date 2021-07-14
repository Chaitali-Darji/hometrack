@extends('layouts.admin.main')

@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body"><!-- Dashboard Analytics Start -->
                <section id="dashboard-analytics">
                    <div class="row">
                        <!-- Website Analytics Starts-->
                        <div class="col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h4 class="card-title">Website Analytics</h4>
                                </div>
                                <div class="card-body pb-1">
                                    <div class="d-flex justify-content-around align-items-center flex-wrap">
                                        <div class="user-analytics mr-2">
                                            <i class="bx bx-user mr-25 align-middle"></i>
                                            <span class="align-middle text-muted">Users</span>
                                            <div class="d-flex">
                                                <div id="radial-success-chart"></div>
                                                <h3 class="mt-1 ml-50">{{$counts['users']}}</h3>
                                            </div>
                                        </div>
                                        <div class="sessions-analytics mr-2">
                                            <i class="bx bx-user-circle align-middle mr-25"></i>
                                            <span class="align-middle text-muted">Clients</span>
                                            <div class="d-flex">
                                                <div id="radial-warning-chart"></div>
                                                <h3 class="mt-1 ml-50">{{$counts['clients']}}</h3>
                                            </div>
                                        </div>
                                        <div class="bounce-rate-analytics">
                                            <i class="bx bx-pie-chart-alt align-middle mr-25"></i>
                                            <span class="align-middle text-muted">Properties</span>
                                            <div class="d-flex">
                                                <div id="radial-danger-chart"></div>
                                                <h3 class="mt-1 ml-50">0</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="analytics-bar-chart" class="my-75"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
                <!-- Dashboard Analytics end -->

            </div>
        </div>
    </div>
@endsection

@section('page-script')
    <script src="{{asset('admin/js/scripts/pages/dashboard-ecommerce.min.js')}}"></script>
@endsection