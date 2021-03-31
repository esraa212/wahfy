@extends('Front.layout.master')
@section('content')
 <div class="ps-section--shopping ps-shopping-cart">
<div class="container">
     <div class="row justify-content-center">
                @if(session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{session('success') }}
                </div>
                @endif
            </div> 
            <form action="" id="orderForm" method="post">
  @csrf
         
<div class="row">
    <div class="col-4 text-center">
                    <h2 class="text-info">Payment Method</h2>
                </div>
  
    <div class="col-6">
             <div class="form-group">
                <select name="payment_method" class="form-control"
                    style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true"  required id="Checkout">
                    <option value="">Choose Payment Method</option>

                    <option value="cash_on_delivery">Cash On Delivery</option>
                    <option value="online_Payment">online Payment</option>

    
                </select>
            </div>
      </div>
            <input type="hidden" name="id" value="{{Request::segment(2)}}" id="id">
            <input type="hidden" name="price" value="{{Request::segment(2)}}" id="price">

            </div>
    <div class="row justify-content-center">
           <div class="col-6">
                <div id="showPayForm">

            </div>
         </div>

    </div>
    <div class="row justify-content-center" id="confirm" style="display: none;">
        <div class="col-3 text-center mx-auto">
 <button class="ps-btn ps-btn--fullwidth submit-form" id="order" type="submit">Confirm</button>
        </div>
 
    </div>
       </form>
</div>
 </div>
@endsection
@section('scripts')
<script src="{{ asset('front/pages/order.js') }}"></script>
 <script type="text/javascript">
    
    //AJAX function
    function startAjax() {
          price=$('#price').val();

        $.ajax({
                type:'get',
                url:"{{route('front.checkout',"price")}}",
                data:{
                    price:$('#price').val(),
                    id:$('#id').val(),
                },
                
                success:function(data){
                if(data.status==true){
                    $('#showPayForm').empty().html(data.content);
                }
                }
            });
        };
    
    $('#Checkout').on('change', function() {
    $("#confirm").css("display", "block");
        if(this.value=='online_Payment'){
           //Call AJAX:
    $(document).ready(startAjax);  
        }

});
   

</script>
@stop