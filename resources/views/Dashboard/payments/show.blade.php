@extends('Dashboard.layout.master')
@section('parentPageTitle', 'Dashboard')
@section('title', 'Payment Details')


@section('content')
<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2>Show Payment</h2>
            </div>
            <div class="body">
                <form method="POST" action=""
                    id="advanced-form" data-parsley-validate novalidate>
                 
                    <div class="row justify-content-center">
                        <div class="col-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <b>Payment  Id</b>
                                    <input type="text" class="form-control" value="{{$payment->id}}" name="id" disabled><br>
                              
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <b>Payment  Amount</b>
                                    <input type="text" class="form-control" value="{{$payment->amount}}" name="amount" disabled><br>
                              
                                </div>
                            </div>
                        </div>
                    </div>
                   
               <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <div class="form-group">
                            <b>Payment  Date</b>
                            <input type="text" class="form-control" value="{{$payment->payment_date}}" name="payment_date" disabled><br>
                      
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <div class="form-group">
                            <b>Payment  Status</b>
                            <input type="text" class="form-control" value="{{$payment->status}}" name="status" disabled><br>
                      
                        </div>
                    </div>
                </div>
               </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <div class="form-group">
                                    <b>Payment  Method</b>
                                    <input type="text" class="form-control" value="{{$payment->method}}" name="method" disabled><br>
                              
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <div class="form-group">
                                    <b>Payment  Customer</b>
                                    <input type="text" class="form-control" value="{{optional($payment->customer)->name}}" name="customer" disabled><br>
                              
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <div class="form-group">
                                    <b>Payment  Transaction ID</b>
                                    <input type="text" class="form-control" value="{{$payment->transaction_id}}" name="transaction_id" disabled><br>
                              
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
    $(function() {
    // validation needs name of the element
    $('#food').multiselect();

    // initialize after multiselect
    $('#basic-form').parsley();
});
</script>
@stop
