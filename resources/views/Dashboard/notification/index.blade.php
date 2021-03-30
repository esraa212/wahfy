@extends('Dashboard.layout.master')
@section('parentPageTitle', 'Dashboard')
@section('title', 'Notifications')


@section('content')
<div class="row justify-content-end">
    <div class="col-3">
        <a class="btn btn-round btn-p btn-primary buttons-html5"href="{{url('dashboard/notifications/create')}}">
            <span>Add New Notification</span>
        </a>
    </div>

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
                                <th>Title</th>
                                <th>cities</th>
                                <th>areas</th>
                                <th>Options</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($notifications as $notificatioon)
{{-- @php 
$cities=json_decode($notificatioon->city_id,true);
$areas=json_decode($notificatioon->area_id,true);
$implode = array();



@endphp
@foreach($cities as $single)
    $implode[] = implode(', ', $single);
    @endforeach --}}

                            <tr>
                                <td>{{$notificatioon->id}}</td>
                                <td>{{$notificatioon->title}}</td>
                                <td>
                                    @if(json_decode($notificatioon->city_id)!=null)
                                    @foreach (json_decode($notificatioon->city_id) as $city)
                                    @php $ncity=\App\Models\City::where('id',$city)->first(); @endphp
                                    {{$ncity->name}},
                                @endforeach
                                @endif
                                    
                                   </td>
                                <td>@if(json_decode($notificatioon->area_id)!=null)
                                    @foreach (json_decode($notificatioon->area_id) as $area)
                                    @php $narea=\App\Models\Area::where('id',$area)->first(); @endphp
                                    {{ $narea!=null? $narea->name:''}},
                                @endforeach
                                @endif
                                </td>
                             
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-primary dropdown-toggle"
                                            data-toggle="dropdown">
                                            Options
                                        </button>
                                        <div class="dropdown-menu row">
                                            
                                            <div class="col-12">
                                                <form action="{{route('admin.notifications.destroy',['notification'=>$notificatioon->id])}}" method="post" class="delete" type="submit">
                                                    <button style="background-color: white;border:thick;"
                                                        class="text-danger">
                                                        <i class="fa fa-trash-o"></i>Delete
                                                    </button>
                                                    @method('DELETE')
                                                    @csrf
                                                </form>
                                            </div>
                                            <div class="col-12 ml-2">
                                                <a href="{{route('admin.notifications.show',['notification'=>$notificatioon->id])}}"><i
                                                        class="fa fa-eye"></i>Show</a>
                                            </div>


                                        </div>
                                    </div>
                                </td>

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
@stop
