@extends('Dashboard.layout.master')
@section('parentPageTitle', 'Dashboard')
@section('title', 'Edit Attribute')


@section('content')
<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2>Edit Attribute</h2>
            </div>
            <div class="body">
                <form method="POST" action="{{route('admin.attributes.update', ['attribute' => $attribute->id])}}" id="advanced-form"
                    data-parsley-validate novalidate class="edit">
                    @method('PUT')
                    @csrf
                <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="text-input1">attribute Value</label>
                        <input type="text" id="text-input1" class="form-control" required name="value"
                            value="{{$attribute->value}}">
                        @error('value')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="type">Type</label>
                        <select name="type" class="form-control select2 select2-hidden-accessible"
                            style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
         
                            <option value="material" {{$attribute->type=='material'?'selected':''}}>material</option>
                     <option value="size" {{$attribute->type=='size'?'selected':''}}>size</option>
                     <option value="width" {{$attribute->type=='width'?'selected':''}}>width</option>
                     <option value="length" {{$attribute->type=='length'?'selected':''}}>length</option>


                        </select>
                    </div>
                </div>
                </div>
               
               <div class="row justify-content-center">
                <button type="submit" class="btn btn-primary">Edit</button>
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
    $(function() {
    // validation needs name of the element
    $('#food').multiselect();

    // initialize after multiselect
    $('#basic-form').parsley();
});
</script>
@stop
