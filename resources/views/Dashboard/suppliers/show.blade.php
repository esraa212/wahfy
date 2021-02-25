@extends('Dashboard.layout.master')
@section('parentPageTitle', 'Dashboard')
@section('title', 'Supplier')


@section('content')
<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2>Supplier info</h2>
            </div>
            <div class="body">
                <form method="POST" action=""
                    id="advanced-form" data-parsley-validate novalidate class="edit">
                   
                    <div class="row">
                        <div class="card">
                            <div class="header text-primary">
                                Supplier information
                            </div>
                            <div class="body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="type_id">Supplier Name</label>
                                            <input type="text" class="form-control" placeholder="Enter Supplier Name"
                                                name="name" value="{{$supplier->name}}" disabled><br>
                                            @error('name')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="industry_id">industry</label>
                                            <select name="industry_id" class="form-control select2 select2-hidden-accessible"
                                                style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" disabled>
                              
                                                <option value="{{$supplier->industry_id}}"selected>{{$supplier->industry->name}}</option>
                                           
                                            </select>
                                      
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="tax_id">City</label>
                                            <select name="city_id" class="form-control select2 select2-hidden-accessible"
                                                style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" id="city" disabled>
                                                <option value="">Choose City</option>
            

                                                <option value="{{$supplier->city_id}}"selected>{{$supplier->city->name}}</option>
                                        
                                            </select>
                                            @error('city_id')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="tax_id">Area</label>
                                            <select name="area_id" class="form-control select2 select2-hidden-accessible"
                                                style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" id="area" disabled>
                                                <option value="">Choose Area</option>
                                              
                                                <option value="{{$supplier->area_id}}"selected>{{$supplier->area->name}}</option>
                                      
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
                                            <textarea class="form-control" name="address" rows="5" cols="30"
                                            disabled>{{$supplier->address}}</textarea>
                                            @error('address')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                  
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="category_id">Category</label>
                                            <select name="category_id" class="form-control select2 select2-hidden-accessible"
                                                style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" disabled id="category">
                                                <option value="">Choose Category</option>
            
                       
                                                <option value="{{$supplier->category_id}}"selected>{{$supplier->category->name}}</option>

                                            </select>
                                            @error('category_id')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="tax_id">SubCategory</label>
                                            <select name="sub_category_id" class="form-control select2 select2-hidden-accessible"
                                                style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" disabled id="subCategory">
                                             <option value="">Choose SubCategory</option>
              
                                             <option value="{{$supplier->sub_category_id}}"selected>{{$supplier->sub_category->name}}</option>
                                      
                                            </select>
                                            @error('sub_category_id')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                   
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
<link rel="stylesheet" href="{{ asset('assets/vendor/parsleyjs/css/parsley.css') }}">
@stop

@section('page-script')
<script src="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>
<script src="{{ asset('assets/vendor/parsleyjs/js/parsley.min.js') }}"></script>

<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<script>
    var config ={
    _url:"{{url('/dashboard/get_areas/')}}",
    c_url:"{{url('/dashboard/getSubByCategory/')}}"
    }
</script>
<script src="{{ asset('assets/js/pages/ajaxrequests.js') }}"></script>
<script>
    $(function() {
    // validation needs name of the element
    $('#food').multiselect();

    // initialize after multiselect
    $('#basic-form').parsley();
});
</script>
@stop
