@extends('Dashboard.layout.master')
@section('parentPageTitle', 'Dashboard')
@section('title', 'Deal')

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
                <h2> Deal Details</h2>
            </div>
            <div class="body">
                <form method="POST" action="" id="advanced-form" data-parsley-validate
                    novalidate class="confirm">
               
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="tax_id">Supplier</label>
                                <select name="supplier_id" class="form-control" style="width: 100%;" data-select2-id="1"
                                    tabindex="-1" aria-hidden="true" id="Supplier">
                                    <option value="">Choose Supplier</option>

                               
                                    <option value="{{$deal->supplier_id}}" selected disabled>{{$deal->product->supplier->name}}</option>
                                 
                                </select>
                             
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="item_id">Products</label>
                            <div class="form-group">
                                <select class="form-control" name="product_id" id="product">
                                    <option value="">Choose Product</option>

                               
                                    <option value="{{$deal->product_id}}" selected disabled>{{$deal->product->title}}</option>
                       

                                </select>
                            </div>


                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Disccount Type</label>
                                <select name="discount_type" class="form-control" style="width: 100%;"
                                    data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option value="">Choose</option>
                                    <option value="precentage"{{$deal->discount_type=='precentage'?'selected':''}} disabled>Precentage</option>
                                    <option value="amount"{{$deal->discount_type=='amount'?'selected':''}} disabled>Amount</option>
                                </select>
                             
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
                                        value="{{$deal->discount_value}}"><br>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="email">Price Before</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-percent"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Ex:" name="price_before"
                                        value="{{$deal->price_before}}" disabled><br>
                                </div>

                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="email">Price Atfer Discount</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-percent"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Ex:" name="price_after"
                                        value="{{$deal->price_after}}"disabled><br>
                                </div>

                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label>Active</label>
                                <select name="active" class="form-control" style="width: 100%;"
                                  aria-hidden="true" disabled>
                                    <option value="">Choose</option>
                                    <option value="1"{{$deal->active==1?'selected':''}}>Yes</option>
                                    <option value="0"{{$deal->active==0?'selected':''}}>No</option>
                                </select>
                              
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
<link rel="stylesheet" href="{{ asset('assets/vendor/parsleyjs/css/parsley.css') }}">
@stop

@section('page-script')

<script src="{{ asset('assets/vendor/parsleyjs/js/parsley.min.js') }}"></script>
<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>


@stop
