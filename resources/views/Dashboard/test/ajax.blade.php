@section('content')
<script src="https://test.oppwa.com/v1/paymentWidgets.js?checkoutId={{$responseData['id']}}"></script>
<form action="{{route('admin.testPayments.show',$id)}}" class="paymentWidgets" data-brands="VISA MASTER AMEX"></form>
@stop