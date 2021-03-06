@extends('Dashboard.layout.master')
@section('parentPageTitle', 'Dashboard')
@section('title', 'Edit Product')


@section('content')
<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2>Edit Product Info</h2>
            </div>
            <div class="body">
                <form method="POST" enctype="multipart/form-data" action="{{route('admin.products.update',['product'=>$product->id])}}" id="advanced-form" data-parsley-validate
                    novalidate class="edit">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="type_id">Product Title</label>
                                <input type="text" class="form-control" placeholder="Enter Product Name" name="title"
                                    value="{{$product->title}}" required><br>
                                @error('title')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="supplier_id">Supplier</label>
                                <select name="supplier_id" class="form-control select2 select2-hidden-accessible"
                                    style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" required id="supplier">
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
                                    style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" required id="product_category">
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
                                    style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" required id="subCategory">
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
                                    >{{$product->description}}</textarea>
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
                                        name="price" value="{{$product->price}}" required><br>
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
                                    value="{{$product->tax}}">
                                @error('tax')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                 
                    </div>
                    <div class="row">
      <div class="col-6">

        <img id="preview" src="{{$product->image}}" width="50%">
      </div>

                       
                            <div class="form-group">
                              <label for="image">Product Image</label><br>
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
                        <label for="tax_id">Availability</label>
                        <select name="active" class="form-control select2 select2-hidden-accessible"
                            style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" required>
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
              <a class="btn btn-primary block" id="add_new_atribute" class="add_new_attribute mt-5"
                        style="margin-left:40%; margin-top:5%"><i class="icon-plus"></i>Add Attributes</a>
                    </div>
                </div>
               </div>
                <div id="add_attributes">
               @foreach ($attributes as $key =>$attribute)
                   
            
               
               <div class="row" id="{{$key}}">
                <div class="col-4">
                    <div class="form-group">
                        <label for="color">color</label>
                     <select name="color[]" class="form-control"
                            style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" required>
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
                            style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" required>
                         <option value="">Choose size</option>
                       @foreach ($sizes as $size )
                         <option value="{{$size->id}}"{{$attribute->size_id==$size->id?'selected':''}}>{{$size->value}}</option>      
                         @endforeach
                        </select>
                     
                    </div>
                </div>
         <div class="col-3">
                    <div class="form-group">
                            <label for="type_id"> quantity</label>
                        <input type="number" class="form-control" placeholder="quantity" name="quantity[]"
                            value="{{$attribute->quantity}}" required>
                   
                    </div>
                </div>
                        <div class="col-1">
                    <div class="form-group">
                        <a class="btn btn-danger block" onClick="Delete({{$key}})" class=" mt-5"style="margin-top:28px;"><i class="icon-trash"></i></a>
                    </div>
                </div>
            </div>
     
           @endforeach
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
    c_url:"{{url('/dashboard/getSubByCategory/')}}",
    s_url:"{{url('/dashboard/getCategories/')}}",
    cp_url:"{{url('/dashboard/getProductSubByCategory/')}}"
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

var i =1;

$('#add_new_atribute').on('click', function (event) {

$(this).data('clicked', true);
event.preventDefault();
var append = '<div class ="row" id="'+i+'">';
append += '<div class="col-4"><div class="form-group"><label for="color">color</label><select name="color[]" class="form-control"style="width:100%;" tabindex="-1" aria-hidden="true" required ><option value="">Choose Color</option>';
@foreach ($colors as $color )
 append+='<option value="{{$color->id}}">{{$color->name}}</option>';      
@endforeach
append+='</select></div></div><div class="col-4"><div class="form-group"><label for="">size</label><select name="size[]" class="form-control"  style="width: 100%;" aria-hidden="true" required><option value="">Choose size</option>';
 @foreach ($sizes as $size )
append+='<option value="{{$size->id}}">{{$size->value}}</option>';      
@endforeach
append+='</select></div></div><div class="col-3"><div class="form-group"><label for="quantity"> quantity</label><input type="number" class="form-control" placeholder="quantity" name="quantity[]"value="{{old('quantity')}}" required></div></div><div class="col-1><div class="form-group"><a class="btn btn-danger block" onClick="Delete('+i+')" class=" mt-5"style="margin-top:28px;"><i class="icon-trash"></i></a></div></div>';
append += '</div>';

$("#add_attributes").last().append(append);
i++;
console.log(i);
});

//DElete Function
function Delete(i){
$('#'+i+'').remove();
}
    </script>
@stop
