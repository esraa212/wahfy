@extends('Dashboard.layout.master')
@section('parentPageTitle', 'Dashboard')
@section('title', 'Create Ctategory')


@section('content')
<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2>Create New Category</h2>
            </div>
            <div class="body">
                <form method="POST" enctype="multipart/form-data" action="{{route('admin.categories.store')}}" id="advanced-form"
                    data-parsley-validate novalidate class="confirm">
                    @csrf
                    <div class="row justify-content-md-center">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="industry_id">Industry</label>
                                <select name="industry_id" class="form-control select2 select2-hidden-accessible"
                                    style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option value="">Choose Industry</option>
            
                                    @foreach($industries as $industry)
                                    <option value="{{$industry->id}}">{{$industry->name}}</option>
                                    @endforeach
                                </select>
                                @error('industry_id')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <b>Category Name</b>
        
        
                                <input type="text" class="form-control mt-2" placeholder="Enter Category Name" name="name"><br>
        
                                @error('name')
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
    <div class="row justify-content-center">
        <button type="submit" class="btn btn-primary">Create</button>
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
@stop

@section('page-script')
<script src="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>
<script src="{{ asset('assets/vendor/parsleyjs/js/parsley.min.js') }}"></script>
<script src="{{ asset('assets/vendor/dropify/js/dropify.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/forms/dropify.js') }}"></script>
<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<script>
    $(function() {
    // validation needs name of the element
    $('#food').multiselect();

    // initialize after multiselect
    $('#basic-form').parsley();
});
</script>
@stop
