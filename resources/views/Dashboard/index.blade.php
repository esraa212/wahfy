@extends('Dashboard.layout.master')
@section('parentPageTitle', 'My Page')
@section('title', 'Dashboard')


@section('content')
<div class="row clearfix">
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card">
            <div class="header">
                <h2>Sales This Week</h2>
            </div>
            <div class="body">
                <div id="chart-pie" style="height: 300px"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-9 col-md-6 col-sm-12">
        <div class="card">
            <div class="header">
                <h2>Employment Growth</h2>
            </div>
            <div class="body">
                <div id="chart-employment" style="height: 300px"></div>
            </div>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="header">
                <h2>Overview</h2>
                <ul class="header-dropdown dropdown">                                
                    <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                    
                </ul>
            </div>
            <div class="body">
                <div id="stackedbar-chart" class="ct-chart"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="header">
                <h2>Members</h2>
            </div>
            <div class="body">                            
                <div id="chart-bar-stacked" style="height: 200px"></div>
            </div>
            <div class="card-footer text-center">
                <div class="row clearfix">
                    <div class="col-6">
                        <h6>350</h6>
                        <span>Users</span>
                    </div>
                    <div class="col-6">
                        <h6>87</h6>
                        <span>VIP</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="header">
                <h2>Marketing </h2>
            </div>
            <div class="body">
                <div id="chart-area-Marketing" style="height: 200px"></div>
            </div>
            <div class="card-footer text-center">
                <div class="row clearfix">
                    <div class="col-6">
                        <h6>$3,095</h6>
                        <span>Last Month</span>
                    </div>
                    <div class="col-6">
                        <h6>$2,763</h6>
                        <span>This Month</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('page-styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/c3/c3.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/chartist/css/chartist.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/toastr/toastr.min.css') }}">
@stop

@section('page-script')
<script src="{{ asset('assets/bundles/c3.bundle.js') }}"></script>
<script src="{{ asset('assets/bundles/chartist.bundle.js') }}"></script>
<script src="{{ asset('assets/bundles/knob.bundle.js') }}"></script>
<script src="{{ asset('assets/vendor/toastr/toastr.min.js') }}"></script>

<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/js/index2.js') }}"></script>
@stop