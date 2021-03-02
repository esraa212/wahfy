@extends('Dashboard.layout.master')
@section('parentPageTitle', 'Dashboard')
@section('title', 'Create banner')


@section('content')
<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2>Create New banner</h2>
            </div>
            <div class="body">
                <form method="POST" enctype="multipart/form-data" action="{{route('admin.banners.store')}}" id="advanced-form" data-parsley-validate
                    novalidate class="confirm">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="type_id">banner Title</label>
                                <input type="text" class="form-control" placeholder="Enter banner Title" name="title"
                                    value="{{old('title')}}" required><br>
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
                                    >{{old('description')}}</textarea>
                                @error('description')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
              
                  
                    <div class="row">
                        <div class="col-12">
                            <input type="file" class="dropify" name="image">
                            @error('image')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                            <div class="mt-3"></div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="tax_id">Active</label>
                                <select name="active" class="form-control"
                                   >
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="type_id">banner Order</label>
                                <input type="text" class="form-control" placeholder="Enter banner Order" name="order"
                                    value="{{$order}}"><br>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <button type="submit" class="btn btn-primary mx-auto">Create</button>
                    </div>
               
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@section('page-styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/dropify/css/dropify.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/parsleyjs/css/parsley.css') }}">

@stop

@section('page-script')
<script src="{{ asset('assets/vendor/parsleyjs/js/parsley.min.js') }}"></script>
<script src="{{ asset('assets/vendor/dropify/js/dropify.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/forms/dropify.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>

@stop
