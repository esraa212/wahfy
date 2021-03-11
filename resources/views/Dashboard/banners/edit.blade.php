@extends('Dashboard.layout.master')
@section('parentPageTitle', 'Dashboard')
@section('title', 'Edit Banner')


@section('content')
<div class="row justify-content-center">
    @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{session('success') }}
      </div>
    @endif
</div>
<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2>Edits Banner</h2>
            </div>
            <div class="body">
                <form method="POST" enctype="multipart/form-data" action="{{route('admin.banners.update',['banner'=>$banner->id])}}" id="advanced-form" data-parsley-validate
                    novalidate class="edit">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="type_id">Banner Title</label>
                                <input type="text" class="form-control" placeholder="Enter banner Title" name="title"
                                    value="{{$banner->title}}"><br>
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
                                 >{{$banner->description}}</textarea>
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

                        <div class="form-group">
                            <label for="image">Banner Image</label><br>
                            <img id="preview" style="width:150px;" src=""><br><br>
                            <div class="input-group">
                              <div class="custom-file">
                                <input name="image" type="file" class="custom-file-input" id="image">
                                <label class="custom-file-label" for="image">Choose Image to Change</label>
                              </div>
                            </div>
                          </div>
                    </div>
             
                    <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="tax_id">Active</label>
                            <select name="active" class="form-control" >
                                <option value="1"{{$banner->active==1?'selected':''}}>Yes</option>
                                <option value="0"{{$banner->active==0?'selected':''}}>No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="type_id">banner Order</label>
                            <input type="text" class="form-control" placeholder="Enter banner Order" name="order"
                                value="{{$banner->order}}"><br>
                        </div>
                    </div>
                </div>
                    <div class="row justify-content-center">
                        <button type="submit" class="btn btn-primary mx-auto">Update</button>
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
<script>
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function(e) {
          $('#preview').attr('src', e.target.result);
        }
        
        reader.readAsDataURL(input.files[0]);
      }
    }
    
    $("#image").change(function() {
      readURL(this);
    });
    </script>

@stop
