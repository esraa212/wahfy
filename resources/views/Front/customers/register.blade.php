@extends('Front.layout.master')
@section('content')
<div class="container">
    <form method="POST" action="{{route('front.register')}}" id="advanced-form" data-parsley-validate
    novalidate class="confirm">
    @csrf
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    
        <div class="sidebar2 clearfix">
            <h5>Register new account</h5>
        
            
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          
               
            
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
              
                <div class="form-group">
                    <label for="type_id">Full Name</label>
                    <input type="text" class="form-control" placeholder="Enter Your Name" name="name"
                        value="{{old('name')}}"><br>
                    @error('name')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="form-group">
                    <label for="email">Email</label>
                 
                       
                        <input type="text" class="form-control" placeholder="Ex: example@example.com"
                            name="email" value="{{old('email')}}"><br>
                 
                    @error('email')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="form-group">
                    <label for="type_id">Password</label>
                    <input type="password" class="form-control" placeholder="Enter Strong password" name="password"
                        value=""><br>
                    @error('password')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <label>Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control">
                </div>
            
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="form-group">
                    <label for="type_id">Mobile</label>    
                        <input type="text" class="form-control key" placeholder="Ex: 01234567890"
                            name="mobile" value="{{old('mobile')}}">
                    @error('mobile')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                </div>
                
             
                
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="tax_id">City</label>
                            <select name="city_id" class="form-control"
                                style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" id="city">
                                <option value="">Choose City</option>

                                @foreach($cities as $city)
                                <option value="{{$city->id}}">{{$city->name}}</option>
                                @endforeach
                            </select>
                            @error('city_id')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="tax_id">Area</label>
                            <select name="area_id" class="form-control"
                                style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" id="area">
                                <option value="">Choose Area</option>
                            </select>
                            @error('area_id')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
            
  
          
        
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom:10px;">
                <div class="form-group">
                    <label>Address</label>
                    <textarea class="form-control" name="address" rows="5"
                        cols="30">{{old('description')}}</textarea>
                    @error('address')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                </div>
                
            
        
            
                
                
            
            </div>
        
        </div>
                <div class="sidebar2 clearfix">
            <h5>Select your favorite categories ( these categories appear on navbar ) <strong style="color:black; cursor:help;" class="helpme">HELP??</strong></h5>
        
            
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            
                <div class="form-group">
                    <div class="row text-center justify-content-center">
                        <div class="col-sm-12">
                            <label><strong>Hint : You Have To Choose & Categories</strong></label><br>
                        </div>
                        @foreach ($categories as $category )
                        <div class="col-sm-6">
                            <label><input type="checkbox" name="category_id[]" value="{{$category->id}}">{{$category->name}}</label>
                        </div>     
                        @endforeach
                      
                        
                    </div>
                 

                </div> 
              
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
             
                </div>
            
            
        
                
                <div class="row text-center justify-content-center">
                    <div class="col-sm-3 text-center">
                        <br>
                        <button class="btn btn-info" style="width:100%; margin-top:5px; margin-bottom:10px; margin-left:113px;">Register</button>
                    </div>
                   
                </div>
            </div>
        
        </div>

    </div>
</form>
</div>


@endsection
@section('after-styles')


@stop

@section('scripts')
<script>
    var config ={
        _url:"{{url('/get_areas/')}}",
    }
</script>
<script src="{{ asset('assets/js/pages/ajaxrequests.js') }}"></script>

@stop