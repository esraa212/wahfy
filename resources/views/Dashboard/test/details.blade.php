@extends('Dashboard.layout.master')
@section('parentPageTitle', 'Dashboard')
@section('title', 'products check')


@section('content')

<div class="row">
 
    <div class="col-6">
       
        <div class="card" style="width:400px">
            <img class="card-img-top" src="{{url('/')}}{{$product->image}}" alt="Card image">
            <div class="card-body">
              <h4 class="card-title">{{$product->name}}</h4>
              <p class="card-text" id="price">{{$product->price}}</p>
              <input type="hidden" name="id" value="{{$product->id}}" id="id">
        
              {{-- <a id="Checkout" onclick="test();"  class="btn btn-primary" role="button">Buy</a> --}}
              <button id="Checkout"  onclick="startAjax();" class="btn btn-primary" >Buy</button>
            </div>
          </div>
    </div>
    <div class="col-6">

        @if(session()->has('success'))
        <div class="alret alret-success">
            {{session('success') }}
            
        </div>
        @endif
        <div id="showPayForm">
       
        </div>
       
    </div>

    
</div>


@stop

@section('page-styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet"
    href="{{ asset('assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css') }}">
<link rel="stylesheet"
    href="{{ asset('assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert/sweetalert.css') }}" />
<style>
    td.details-control {
        background: url('../assets/images/details_open.png') no-repeat center center;
        cursor: pointer;
    }

    tr.shown td.details-control {
        background: url('../assets/images/details_close.png') no-repeat center center;
    }
</style>
@stop

@section('page-script')

<script src="{{ asset('assets/bundles/datatablescripts.bundle.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/vendor/sweetalert/sweetalert.min.js') }}"></script>

<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/js/pages/tables/jquery-datatable.js') }}"></script>


 <script type="text/javascript">
    
    //AJAX function
    function startAjax() {
          price=$('#price').text();

        $.ajax({
                type:'get',
                url:"{{route('admin.products.checkout',"price")}}",
                data:{
                    price:$('#price').text(),
                    id:$('#id').val(),
                },
                
                success:function(data){
                if(data.status==true){
                    $('#showPayForm').empty().html(data.content);
                }
                }
            });
        };
    
    
    //Call AJAX:
    $(document).ready(startAjax);

</script>
{{-- <script>
    //  var test= function(e) {
    //         console.log('b');
    //         price=$('#price').text();
    //         e.preventDefault();
    //         $.ajax({
    //             type:'get',
    //             url:"{{route('admin.products.checkout',".price.")}}",
    //             data:{
    //                 price:$('#price').text(),
    //             },
                
    //             success:function(data){
    //             if(data.status==true){
    //                 $('#showPayForm').empty().html(data.content);
    //             }
    //             }
    //         })
    //     };

    </script> --}}
    
@stop
