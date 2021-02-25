@extends('Dashboard.layout.master')
@section('parentPageTitle', 'Dashboard')
@section('title', 'Feedback')


@section('content')
<div class="row justify-content-center">
    @if(session()->has('error'))
    <div class="alert alert-danger" role="alert">
        {{session('error') }}
      </div>
    @endif
  
</div>
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                
                <ul class="header-dropdown dropdown">
                    
                    <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                   
                </ul>
            </div>
            <div class="body">
                <div class="table-responsive">
                    
                    <table class="table table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Text</th>
                                <th>Customer</th>
                                <th>Product</th>
                            
                                <th>Status</th>
                                <th>show</th>
                            </tr>
                        </thead>
                      
                        <tbody>
                            @foreach ($feedbacks as $feedback)
                                
                      
                            <tr>
                            <td>{{$feedback->id}}</td>
                            <td>{{\Illuminate\Support\Str::limit($feedback->feedback_text,30)}}</td>
                            <td>{{optional($feedback->Customer)->name}}</td>
                            <td>{{optional($feedback->product)->title}}</td>
                            @if($feedback->status==1)
                            <td class="btn btn-success btn-xs mt-1 ml-2">Answered
                            </td>
                            @else
                            <td class="btn btn-danger btn-xs mt-2 ml-2">
                                Not Answered
                            </td>
                            @endif
 
                                <td><a href="{{route('admin.feedback.show',$feedback->id)}}"
                                    class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></a></td>
                               
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('page-styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert/sweetalert.css') }}"/>
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
@stop