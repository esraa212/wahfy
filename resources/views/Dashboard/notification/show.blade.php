@extends('Dashboard.layout.master')
@section('parentPageTitle', 'Dashboard')
@section('title', 'Show Notification')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
         
        </div><!-- /.container-fluid -->
    </section>
    <form method="POST" action="" enctype="multipart/form-data">
     
        <section class="content">
            <div class="container-fluid">
                <!-- SELECT2 EXAMPLE -->
                <div class="card card-default">
                    <div class="card-header">
                  

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                    class="fas fa-remove"></i></button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" name="title" placeholder="Enter Title" value="{{$notification->title}}" disabled>
                             
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="body">Description</label>
                                    <textarea class="form-control"  name="" id="" cols="30" rows="10" disabled>{{$notification->description}}</textarea>
                                    
                                </div>
                            </div>           
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="tax_id">City</label>
                                    @php
                                    $selected = json_decode($notification->city_id,true);
                                    @endphp
                                    @if($selected !=null)
                                    <select name="city_id[]" class="mul-select" multiple="true"
                                       id="city" disabled>
                                        <option value="">Choose City</option>
                                      
                                        @foreach($cities as $city)
                                        <option value="{{$city->id}}" {{ (in_array($city->id, $selected)) ? 'selected' : '' }}>{{$city->name}}</option>
                                        @endforeach
                                    </select>
                                    @endif
                               
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="tax_id">Area</label>
                                    @php
                                    $selectar = json_decode($notification->area_id,true);
                                    @endphp
                                    @if($selectar !=null)
                                    <select name="area_id[]" class="mul-select" multiple="true"
                                      id="area" disabled>
                                      @foreach($areas as $area)
                                        <option value="{{$area->id}}" {{ (in_array($area->id, $selectar)) ? 'selected' : '' }}>{{$area->name}}</option>
                                        @endforeach
                                    </select>
  @endif
                                </div>
                            </div>
                        </div>
                   
                    </div>

                </div>
        </section>
    </form>
</div>
@stop
@section('page-styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/dropify/css/dropify.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/parsleyjs/css/parsley.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">
<style>
    .mul-select {
        width: 100%;
    }
</style>
@stop
@section('page-script')
<script src="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>
<script src="{{ asset('assets/vendor/parsleyjs/js/parsley.min.js') }}"></script>
<script src="{{ asset('assets/vendor/dropify/js/dropify.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/forms/dropify.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
<script>
    var config ={
        _url:"{{url('/dashboard/get_areas/')}}",
    }
</script>
<script src="{{ asset('assets/js/pages/ajaxrequests.js') }}"></script>
<script>
    $(function() {


    // initialize after multiselect
    $('#basic-form').parsley();
    $(".mul-select").select2({
                    placeholder: "select", //placeholder
                    tags: true,
                    tokenSeparators: ['/',',',';'," "]
                });
});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"
    integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg=="
    crossorigin="anonymous"></script>
@stop
