@extends('Dashboard.layout.master')
@section('parentPageTitle', 'Dashboard')
@section('title', 'Edit Category')


@section('content')
<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2>Edit Category</h2>
            </div>
            <div class="body">
                <form method="POST"  enctype="multipart/form-data" action="{{route('admin.categories.update', ['category' => $category->id])}}"
                    id="advanced-form" data-parsley-validate novalidate class="edit">
                    @method('PUT')
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <b>Category Name</b>
                                    <input type="text" class="form-control" value="{{$category->name}}" name="name"><br>
                                    @error('name')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="industry_id">industry</label>
                                <select name="industry_id" class="form-control select2 select2-hidden-accessible"
                                    style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" required>
                                    <option value="">Choose industry</option>

                                    @foreach($industries as $industry)
                                    <option value="{{$industry->id}}"{{$industry->id==$category->industry_id?'selected':''}}>{{$industry->name}}</option>
                                    @endforeach
                                </select>
                                @error('industry_id')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                                  <div class="row mt-4 mb-4">
                        <div class="col-6">
                  
                          <img id="preview" src="{{$category->image}}" width="50%">
                        </div>
                  
                                         
                                              <div class="form-group">
                                                <label for="image">Category Image</label><br>
                                                <img id="preview" style="width:150px;" src=""><br><br>
                                                <div class="input-group">
                                                  <div class="custom-file">
                                                    <input name="image" type="file" class="custom-file-input" id="image">
                                                    <label class="custom-file-label" for="image">Choose Image to Change</label>
                                                  </div>
                                                </div>
                                              </div>
                                         
                                          </div> 
                   <div class="row justify-content-center">
                    <button type="submit" class="btn btn-primary">Update</button>
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
