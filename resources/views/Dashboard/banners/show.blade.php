@extends('Dashboard.layout.master')
@section('parentPageTitle', 'Dashboard')
@section('title', 'Show banner')


@section('content')

<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2>Show  banner</h2>
            </div>
            <div class="body">
                <form method="POST" enctype="multipart/form-data" action="" id="advanced-form" data-parsley-validate
                    novalidate class="confirm">
              
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="type_id">Banner Title</label>
                                <input type="text" class="form-control" placeholder="Enter banner Title" name="title"
                                    value="{{$banner->title}}" disabled><br>
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
                                   disabled >{{$banner->description}}</textarea>
                                @error('description')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
            
                
                   
                    <div class="row mt-4 mb-4">
                        <div class="col-6">
                  
                          <img id="preview" src="{{$banner->image}}" width="50%">
                        </div>
                    </div>
             
                                          <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="tax_id">Active</label>
                                                    <select name="active" class="form-control"disabled >
                                                        <option value="1"{{$banner->active==1?'selected':''}}>Yes</option>
                                                        <option value="0"{{$banner->active==0?'selected':''}}>No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="type_id">banner Order</label>
                                                    <input type="text" class="form-control" placeholder="Enter banner Order" name="order"
                                                        value="{{$banner->order}}" disabled><br>
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
<link rel="stylesheet" href="{{ asset('assets/vendor/dropify/css/dropify.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/parsleyjs/css/parsley.css') }}">
@stop

@section('page-script')
<script src="{{ asset('assets/vendor/parsleyjs/js/parsley.min.js') }}"></script>
<script src="{{ asset('assets/vendor/dropify/js/dropify.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/forms/dropify.js') }}"></script>
<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
@stop
