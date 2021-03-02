@extends('Dashboard.layout.master')
@section('parentPageTitle', 'Dashboard')
@section('title', 'Create Offer')

@section('content')
<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2>Create New Deal</h2>
            </div>
            <div class="body">
                <form method="POST" action="{{route('admin.deals.store')}}" id="advanced-form" data-parsley-validate
                    novalidate class="confirm">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="tax_id">Spplier</label>
                                <select name="supplier_id" class="form-control" style="width: 100%;" data-select2-id="1"
                                    tabindex="-1" aria-hidden="true" id="Spplier">
                                    <option value="">Choose Supplier</option>

                                    @foreach($suppliers as $supplier)
                                    <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                    @endforeach
                                </select>
                                @error('supplier_id')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="item_id">Products</label>
                            <div class="form-group">
                                <select class="form-control" name="product_id" id="product">
                                    <option value="">Choose Product</option>

                                </select>
                            </div>

                            @error('item_id')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
<div class="row">
    <div class="col-6">
        <label for="item_id">Products</label>
        <div class="form-group">
            <select class="form-control" name="product_id" id="product">
                <option value="">Choose Product</option>

            </select>
        </div>

        @error('item_id')
        <small class="form-text text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Disccount Type</label>
                                <select name="discount_type" class="form-control" style="width: 100%;"
                                    data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option value="">Choose</option>
                                    <option value="precentage">Precentage</option>
                                    <option value="amount">amount</option>
                                </select>
                                @error('discount_type')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="email">Discount Value</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-percent"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Ex:" name="discount_value"
                                        value="{{old('discount_value')}}"><br>
                                </div>

                            </div>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary mx-auto">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@section('page-styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/parsleyjs/css/parsley.css') }}">
@stop

@section('page-script')

<script src="{{ asset('assets/vendor/parsleyjs/js/parsley.min.js') }}"></script>
<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<script>
    var config ={
        p_url:"{{url('/getProducts/')}}"
    }
</script>
<script src="{{ asset('assets/js/pages/ajaxrequests.js') }}"></script>
<script src="{{ asset('assets/js/pages/get_items.js') }}"></script>


@stop
