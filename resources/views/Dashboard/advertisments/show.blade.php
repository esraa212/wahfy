@extends('Dashboard.layout.master')
@section('parentPageTitle', 'Dashboard')
@section('title', 'Show Advertisment')


@section('content')
<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2>Show  Advertisment</h2>
            </div>
            <div class="body">
                <form method="POST" enctype="multipart/form-data" action="" id="advanced-form" data-parsley-validate
                    novalidate class="confirm">
              
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="type_id">Advertisment Title</label>
                                <input type="text" class="form-control" placeholder="Enter Advertisment Title" name="title"
                                    value="{{$advertisment->title}}" disabled><br>
                                @error('title')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" rows="5" cols="30"
                                   disabled >{{$advertisment->description}}</textarea>
                                @error('description')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="city_id">City</label>
                     
                                @php
                                $selected = json_decode($advertisment->city_id,true);
                                @endphp
                                @if($selected !=null)
                                <select  name="city_id[]" multiple="multiple"  class="mul-select" id="city" disabled>
                                    @foreach($cities as $city)
                                      <option value="{{ $city->id }}" {{ (in_array($city->id, $selected)) ? 'selected' : '' }} >{{ $city->name}}</option>
                                    @endforeach
                                 </select>
                                
                                 @else
                                 <input type="text" class="form-control"
                                 value="no selected cities" disabled><br>
                                 @endif
 
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="tax_id">Area</label>
                                @php
                                $selectar = json_decode($advertisment->area_id,true);
                                @endphp
                        @if($selectar !=null)
                                <select  name="area_id[]" multiple="multiple"  class="mul-select" id="city" disabled>
                                    @foreach($areas as $area)
                                      <option value="{{ $area->id }}" {{ (in_array($area->id, $selectar)) ? 'selected' : '' }} >{{ $area->name}}</option>
                                    @endforeach
                                 </select>
     
                                 @else
                                 <input type="text" class="form-control"
                                 value="no selected areas" disabled><br>
                                 @endif
                               
                            </div>
                        </div>
                    </div>
                
                   
                    <div class="row mt-4 mb-4">
                        <div class="col-6">
                  
                          <img id="preview" src="{{$advertisment->image}}" width="50%">
                        </div>
                  
                                          </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Date From</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div>
                                    <input data-provide="datepicker" data-date-autoclose="true" class="form-control"
                                        name="from" data-date-format="yyyy-mm-dd" disabled
                                        value="{{$advertisment->from}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Date To</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div>
                                    <input data-provide="datepicker" data-date-autoclose="true" class="form-control"
                                        name="to" data-date-format="yyyy-mm-dd" disabled
                                        value="{{$advertisment->to}}">
                                </div>
                            </div>
                        </div>
                     
                    </div>
               
               
                </form>
            </div>
        </div>
    </div>
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
@stop
