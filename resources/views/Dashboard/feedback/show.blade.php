@extends('Dashboard.layout.master')
@section('parentPageTitle', 'Dashboard')
@section('title', 'Feedback Details')


@section('content')
<div class="row justify-content-center">
    @if(session()->has('error'))
    <div class="alert alert-danger" role="alert">
        {{session('error') }}
      </div>
    @endif

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
                <h2>Show Feedback</h2>
            </div>
            <div class="body">
                <form method="POST" action=""
                    id="advanced-form" data-parsley-validate novalidate>
                 
                    <div class="row justify-content-center">
                        <div class="col-4">
                            <div class="form-group">
                                <div class="form-group">
                                    <b>feedback  Id</b>
                                    <input type="text" class="form-control" value="{{$feedback->id}}" name="id" disabled><br>
                              
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <div class="form-group">
                                    <b> Customer Name</b>
                                    <input type="text" class="form-control" value="{{optional($feedback->customer)->name}}" name="customer" disabled><br>
                              
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <div class="form-group">
                                    <b>Feedback  Status</b>
                                    <input type="text" class="form-control" value="{{$feedback->status==1?'Answered':'Not Answered'}}" name="status" disabled><br>
                              
                                </div>
                            </div>
                        </div>
       
                    </div>
                   
               <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <div class="form-group">
                            <b>Feedback</b>
                            <textarea class="form-control"name="" id="" cols="30" rows="5" disabled>{{$feedback->feedback_text}}</textarea>
                            
                      
                        </div>
                    </div>
                </div>
             
               </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <b>  Product</b>
                                    <input type="text" class="form-control" value="{{optional($feedback->product)->title}}" name="method" disabled><br>
                              
                                </div>
                            </div>
                        </div>
                      
                        <div class="col-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <b>Supplier</b>
                                    <input type="text" class="form-control" value="{{optional($feedback->supplier)->name}}" name="transaction_id" disabled><br>
                              
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($feedback->reply==null)
                    <div class="row justify-content-center">
                        <!-- Button trigger modal -->
                   
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
    Reply
  </button>
 
  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Reply</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           
            <form method="POST" action="{{route('admin.feedback.update',['feedback'=>$feedback->id])}}"
                id="advanced-form" data-parsley-validate novalidate class="edit">
                @csrf
                @method('PUT')
           
           
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Reply Messsage</label>
                            <textarea class="form-control" name="reply" rows="5"
                                cols="30"></textarea>
                    
                        </div>
                    </div>
                </div>
             
     
<div class="row justify-content-md-center">
<button type="submit" class="btn btn-primary mx-auto">Reply</button>
</div>
               
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
   
        </div>
      </div>
    </div>
  </div>
                    </div>
                    @else
                    <div class="row">
                      <div class="col-12">
                          <div class="form-group">
                              <div class="form-group">
                                  <b>Reply</b>
                                  <textarea class="form-control"name="" id="" cols="30" rows="5" disabled>{{$feedback->reply}}</textarea>
                                  
                            
                              </div>
                          </div>
                      </div>
                   
                     </div>
                    @endif
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
