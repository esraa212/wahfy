@extends('Dashboard.layout.master')
@section('parentPageTitle', 'Dashboard')
@section('title', 'Edit Customer')


@section('content')
<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2>Edit Customer</h2>
            </div>
            <div class="body">
                <form method="POST" action="{{route('admin.customers.update',['customer'=>$customer->id])}}"
                    id="advanced-form" data-parsley-validate novalidate class="edit">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="type_id">Customer Name</label>
                                <input type="text" class="form-control" placeholder="enter Customer Name" name="name"
                                    value="{{$customer->name}}"><br>
                                @error('name')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-at"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Ex: example@example.com"
                                        name="email" value="{{$customer->email}}"><br>
                                </div>
                                @error('email')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="type_id">Mobile</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                    </div>
                                    <input type="text" class="form-control key" placeholder="Ex: 01234567890"
                                        name="mobile" value="{{$customer->mobile}}">
                                </div>
                                @error('mobile')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="tax_id">City</label>
                                <select name="city_id" class="form-control"
                                    style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" id="city">
                                    <option value="">Choose City</option>

                                    @foreach($cities as $city)
                                    <option value="{{$city->id}}" {{$customer->city_id==$city->id?'selected':''}}>
                                        {{$city->name}}</option>
                                    @endforeach
                                </select>
                                @error('city_id')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="tax_id">Area</label>
                                <select name="area_id" class="form-control"
                                    style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" id="area">
                                    <option value="">Choose Area</option>
                                    @foreach($areas as $area)
                                    <option value="{{$area->id}}" {{$customer->area_id==$area->id?'selected':''}}>
                                        {{$area->name}}</option>
                                    @endforeach
                                </select>
                                @error('area_id')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control" name="address" rows="5"
                                    cols="30">{{$customer->address}}</textarea>
                                @error('address')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                 
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="tax_id">Favorite Categories</label>
                                <select name="category_id[]" class="mul-select" multiple="true"
                                id="category">
                                    <option value="">Choose Categories</option>
                              @php
                              $selected=json_decode($customer->categories)
                              @endphp
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}"{{in_array($category->id,$selected) ?'selected':''}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="type_id">Password</label>
                                <input type="password" class="form-control" placeholder="Update password" name="password"
                                    value=""><br>
                              
                            </div>
                        </div>
                    </div>
<div class="row justify-content-md-center">
    <button type="submit" class="btn btn-primary mx-auto">Edit</button>
</div>
                   
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@section('page-styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css') }}">
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
@stop
