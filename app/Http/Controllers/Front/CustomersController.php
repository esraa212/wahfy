<?php

namespace App\Http\Controllers\Front;

use App\Models\Area;
use Illuminate\Support\Facades\Hash;
use App\Models\City;
use App\Models\Category;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Front\Customer\CreateCustomerRequest;
use App\Http\Requests\Front\Customer\UpdateCustomerRequest;
class CustomersController extends Controller
{
    protected $redirectTo = '';

    protected $redirectPath = '/';

    public function __construct()
    {
        if (request()->redirectTo) {
            $this->redirectTo = request()->redirectTo;
        }
        $this->middleware('guest:customers')->except('logout');
    }
    public function showLoginForm(){
     
    }
    public function login(Request $request){
        // dd('here');
        $this->validate($request, [
            'email'    => 'required|email|exists:customers',
            'password' => 'required',
        ]);

        if (Auth::guard('customers')->attempt(
            ['email' => $request->email, 'password' => $request->password],
            $request->remember
        )) {
            return redirect()->intended(url($this->redirectTo));
        }

        return redirect()->back()->withInput($request->only(['email', 'remember']));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:customers'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    protected function create(array $data)
    {
        return Customer::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
    public function registerForm(){
        $cities = City::all();
        $categories = Category::all();
        return view('Front.customers.register',compact('cities','categories'));
    }
    public function register(CreateCustomerRequest $request){
        $customer = new Customer;
        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->mobile = $request->input('mobile');
        $customer->city_id = $request->input('city_id');
        $customer->area_id = $request->input('area_id');
        $customer->address = $request->input('address');
        $customer->categories =json_encode($request->input('category_id'));
        $customer->password=Hash::make($request->input('password'));
        $customer->save();
        $this->login($request);
        return redirect($this->redirectPath);
    }
    public function logout(Request $request)
    {
        Auth::guard('customers')->logout();

        $request->session()->invalidate();

        return redirect($this->redirectPath);
    }
}
