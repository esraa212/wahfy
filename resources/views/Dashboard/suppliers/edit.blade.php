@extends('Dashboard.layout.master')
@section('parentPageTitle', 'Dashboard')
@section('title', 'Edit Supplier')


@section('content')
<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2>Edit Supplier info</h2>
            </div>
            <div class="body">
                <form method="POST" enctype="multipart/form-data" action="{{route('admin.suppliers.update',['supplier'=>$supplier->id])}}"
                    id="advanced-form" data-parsley-validate novalidate class="edit">
                    @csrf
                    @method('PUT')
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
                                                name="name" value="{{$supplier->name}}" required><br>
                                            @error('name')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="industry_id">industry</label>
                                            <select name="industry_id" class="form-control select2 select2-hidden-accessible"
                                                style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" id="industry"
                                                required>
                                                <option value="">Choose industry</option>
            
                                                @foreach($industries as $industry)
                                                <option value="{{$industry->id}}"{{$industry->id==$supplier->industry_id?'selected':''}}>{{$industry->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('industry_id')
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
                                                style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" required id="category">
                                                <option value="">Choose Category</option>
            
                                                @foreach($categories as $category)
                                                <option value="{{$category->id}}"{{$category->id==$supplier->category_id?'selected':''}}>{{$category->name}}</option>
                                                @endforeach
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
                                                style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" required id="subCategory">
                                             <option value="">Choose SubCategory</option>
                                             @foreach($sub_categories as $sub_category)
                                             <option value="{{$sub_category->id}}"{{$sub_category->id==$supplier->sub_category_id?'selected':''}}>{{$sub_category->name}}</option>
                                             @endforeach
                                            </select>
                                            @error('sub_category_id')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="tax_id">City</label>
                                            <select name="city_id" class="form-control select2 select2-hidden-accessible"
                                                style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" id="city">
                                                <option value="">Choose City</option>
            
                                                @foreach($cities as $city)
                                                <option value="{{$city->id}}"{{$city->id==$supplier->city_id?'selected':''}}>{{$city->name}}</option>
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
                                            <select name="area_id" class="form-control select2 select2-hidden-accessible"
                                                style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" id="area">
                                                <option value="">Choose Area</option>
                                                @foreach($areas as $area)
                                                <option value="{{$area->id}}"{{$area->id==$supplier->area_id?'selected':''}}>{{$area->name}}</option>
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
                                            <textarea class="form-control" name="address" rows="5" cols="30"
                                                required>{{$supplier->address}}</textarea>
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
                                                style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" required id="category">
                                                <option value="">Choose Category</option>
            
                                                @foreach($categories as $category)
                                                <option value="{{$category->id}}"{{$category->id==$supplier->category_id?'selected':''}}>{{$category->name}}</option>
                                                @endforeach
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
                                                style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" required id="subCategory">
                                             <option value="">Choose SubCategory</option>
                                             @foreach($sub_categories as $sub_category)
                                             <option value="{{$sub_category->id}}"{{$sub_category->id==$supplier->sub_category_id?'selected':''}}>{{$sub_category->name}}</option>
                                             @endforeach
                                            </select>
                                            @error('sub_category_id')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                   
                                </div>
                                  <div class="row mt-4 mb-4">
                        <div class="col-6">
                  
                          <img id="preview" src="{{$supplier->image}}" width="50%">
                        </div>
                  
                        
                            <div class="form-group">
                                <label for="image">supplier Image</label><br>
                                <img id="preview" style="width:150px;" src=""><br><br>
                                <div class="input-group">
                                <div class="custom-file">
                                    <input name="image" type="file" class="custom-file-input" id="image">
                                    <label class="custom-file-label" for="image">Choose Image to Change</label>
                                </div>
                                </div>
                            </div>
                        
                             </div> 
                                  
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
    c_url:"{{url('/dashboard/getSubByCategory/')}}",
    i_url:"{{url('/dashboard/getCategoriesByIndustry/')}}"
    }
</script>
<script src="{{ asset('assets/js/pages/ajaxrequests.js') }}"></script>
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
<script>
    $(function() {
    // validation needs name of the element
    $('#food').multiselect();

    // initialize after multiselect
    $('#basic-form').parsley();
});
</script>
@stop
