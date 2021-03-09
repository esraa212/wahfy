@extends('Front.layout.master')
@section('content')
  <div class="ps-my-account">
            <div class="container">
                <div class="row">
                  
    <form class="ps-form--account ps-tab-root mt-0" method="POST" action="{{route('front.register')}}" style="max-width:622px !important; padding-top:56px !important;">
        @csrf
                 
                    <div class="ps-tabs">
                        <div class="ps-tab active">
                            <div class="ps-form__content">
                                <h5 class="text-info">Register new account</h5>
                <div class="row">
                    <div class="col-12">
                         <div class="form-group">
                    <label for="name">Fullname</label>  
                         <input class="form-control" type="text" placeholder="Enter Your Name" name="name"
                                value="{{old('name')}}"required>
                                @error('name')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                            </div>
                        </div>
                   
                </div>
                    <div class="row">
                        <div class="col-12">
                        <div class="form-group">  
                        <label for="email">Email</label>      
                    <input type="email" class="form-control" placeholder="Ex: example@example.com"
                                        name="email" value="{{old('email')}}" required><br>
                            
                                @error('email')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            </div>
                            </div>    
    <div class="row">
        <div class="col-6">
             <div class="form-group">
                    <label for="type_id">Password</label>
                    <input type="password" class="form-control"  name="password"
                        value=""required><br>
                    @error('password')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
        </div>
        <div class="col-6">
            <div class="form-group">
        <label>Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>
       
        </div>
    </div>
    <div class="row">
        <div class="col-12">
              <div class="form-group">
                    <label for="type_id">Mobile</label>    
                        <input type="number" class="form-control key" placeholder="Ex: 01234567890"
                            name="mobile" value="{{old('mobile')}}"required>
                    @error('mobile')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
              <div class="form-group">
                            <label for="tax_id">City</label>
                            <select name="city_id" class="form-control"
                                style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" id="city" required>
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
        <div class="col-6">
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
    <div class="row">
        <div class="col-12">
    <div class="form-group">
                    <label>Address</label>
                    <textarea class="form-control" name="address" rows="5"
                        cols="30" required>{{old('description')}}</textarea>
                    @error('address')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
        </div>
    </div>
    <div class="row">
          <h5>Select your favorite industries ( these industries will appear on navbar )</h5>
          <div class="col-12">
                  <div class="form-group">
                    <div class="row text-center justify-content-center">
                        <div class="col-12" style="position: relative;">
                            <label><strong class="text-info">Hint : You Have To Choose 7 Categories</strong></label><br>
                        </div>
                        @foreach ($favindustries as $favindustry )
                        <div class="col-6">
                            <input style="position: absolute; left:30%;" type="checkbox" name="category_id[]" value="{{$favindustry->id}}" ><label>{{$favindustry->name}}</label>
                        </div>     
                        @endforeach
                      
                        
                    </div>
          </div>
    </div>
    </div> 
                                <div class="form-group submtit">
                                    <button class="ps-btn ps-btn--fullwidth">Register</button>
                                </div>
                            
                            <div class="ps-form__footer mb-5">
                                <p>Connect with:</p>
                                <ul class="ps-list--social">
                                    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a class="google" href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        </div>
                    </div>
                </form>
                </div>
            
            </div>
        </div>


@endsection
@section('scripts')
<script>
    var config ={
        _url:"{{url('/get_areas/')}}",
    }
</script>
<script src="{{ asset('assets/js/pages/ajaxrequests.js') }}"></script>

@stop