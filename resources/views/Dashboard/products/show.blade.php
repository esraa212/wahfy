@extends('Dashboard.layout.master')
@section('parentPageTitle', 'Dashboard')
@section('title', 'Product Info')


@section('content')
<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2>Product Info</h2>
            </div>
            <div class="body">
                <form method="POST" enctype="multipart/form-data" action="" id="advanced-form" data-parsley-validate
                    novalidate class="confirm">
                  
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="type_id">Product Title</label>
                                <input type="text" class="form-control" placeholder="Enter Product Name" name="title"
                                    value="{{$product->title}}" disabled><br>
                                @error('title')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="supplier_id">Supplier</label>
                                <select name="supplier_id" class="form-control select2 select2-hidden-accessible"
                                    style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" disabled id="supplier">
                                    <option value="">Choose Supplier</option>

                                    @foreach($suppliers as $supplier)
                                    <option value="{{$supplier->id}}"{{$product->supplier_id==$supplier->id ? 'selected':''}}>{{$supplier->name}}</option>
                                    @endforeach
                                </select>
                                @error('supplier_id')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                       
                    </div>
                    <div class="row">
         
                        <div class="col-6">
                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select name="product_category_id" class="form-control select2 select2-hidden-accessible"
                                    style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" disabled id="category">
                                    <option value="">Choose Category</option>

                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}"{{$product->product_category_id==$category->id ? 'selected':''}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('product_category_id')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="tax_id">SubCategory</label>
                                <select name="product_sub_category_id" class="form-control select2 select2-hidden-accessible"
                                    style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" disabled id="subCategory">
                                 <option value="">Choose SubCategory</option>
                                 @foreach($sub_categories as $sub_category)
                                 <option value="{{$sub_category->id}}"{{$product->product_sub_category_id==$sub_category->id ? 'selected':''}}>{{$sub_category->name}}</option>
                                 @endforeach
    
                                </select>
                             
                            </div>
                        </div>
                       
                    </div>
                
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" rows="5" cols="30"
                                   disabled >{{$product->description}}</textarea>
                                @error('description')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="price">Price</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-dollar"></i></span>
                                    </div>
                                    <input type="text" class="form-control money-dollar" placeholder="Ex: 99,99"
                                        name="price" value="{{$product->price}}" disabled><br>
                                </div>
                                @error('price')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="type_id">Product tax</label>
                                <input type="number" class="form-control" placeholder="tax" name="tax"
                                    value="{{$product->tax}}" disabled>
                                @error('tax')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                 
                    </div>
                    <div class="row justify-content-center">
      <div class="col-6">

        <img id="preview" src="{{$product->image}}" width="50%">
      </div>

                       
    
                       
                        </div>
                 
               <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="tax_id">Availability</label>
                        <select name="active" class="form-control select2 select2-hidden-accessible"
                            style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" disabled>
                            <option value="">Choose</option>
                            <option value="0"{{$product->active==0?'selected':''}}>not available</option>
                            <option value="1" {{$product->active==1?'selected':''}}>available</option>

                        </select>
                        @error('active')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="type_id">Product quantity</label>
                        <input type="text" class="form-control" placeholder="quantity" name="quantity"
                            value="{{$product->quantity}}" disabled>
                        @error('quantity')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
               </div>
          @foreach ($attributes as $attribute )
                   
            
                <div id="add_attributes">
               <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="color">color</label>
                     <select name="color[]" class="form-control"
                            style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" disabled>
                         <option value="">Choose Color</option>
                         @foreach ($colors as $color )
                         <option value="{{$color->id}}"{{$attribute->color_id==$color->id?'selected':''}}>{{$color->name}}</option>      
                         @endforeach
               
                        </select>
                        @error('color')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="">size</label>
                        <select name="size[]" class="form-control"
                            style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" disabled>
                         <option value="">Choose size</option>
                       @foreach ($sizes as $size )
                         <option value="{{$size->id}}"{{$attribute->size_id==$size->id?'selected':''}}>{{$size->value}}</option>      
                         @endforeach
                        </select>
                     
                    </div>
                </div>
         <div class="col-4">
                    <div class="form-group">
                            <label for="type_id"> quantity</label>
                        <input type="number" class="form-control" placeholder="quantity" name="quantity[]"
                            value="{{$attribute->quantity}}" disabled>
                   
                    </div>
                </div>
            </div>
        </div>
           @endforeach
               
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
    var config ={
    c_url:"{{url('/dashboard/getSubByCategory/')}}"
    }
</script>
<script src="{{ asset('assets/js/pages/ajaxrequests.js') }}"></script>

@stop
