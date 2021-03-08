<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Area;
use App\Models\City;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Industry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\Customer\CreateCustomerRequest;
use App\Http\Requests\Admin\Customer\UpdateCustomerRequest;

class CustomersController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $customers = Customer::latest()->get();
         return view('Dashboard.customers.index', compact('customers'));
     }
 
     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
         $cities = City::all();
         $categories = Industry::all();

         return view('Dashboard.customers.create', compact('cities','categories'));
     }
 
     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(CreateCustomerRequest $request)
     {
         try {
 
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
         } catch (\Exception $ex) {
             dd($ex);
         }
 
         return redirect(route('admin.customers.index'));
     }
 
     /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function show($id)
     {
         $cities = City::all();
         $areas = Area::all();
         $customer = Customer::findOrFail($id);
         $categories = Industry::all();
         return view('Dashboard.customers.show', compact('customer', 'cities', 'areas', 'categories'));
     }
 
     /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function edit($id)
     {
         $cities = City::all();
         $areas = Area::all();
         $customer = Customer::findOrFail($id);
         $categories = Industry::all();
         return view('Dashboard.customers.edit', compact('customer', 'cities', 'areas','categories'));
     }
 
     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function update(UpdateCustomerRequest $request, $id)
     {
         $customer = Customer::findOrFail($id);
         $customer->name = $request->input('name');
         $customer->email = $request->input('email');
         $customer->mobile = $request->input('mobile');
         $customer->city_id = $request->input('city_id');
         $customer->area_id = $request->input('area_id');
         $customer->address = $request->input('address');
         if($request->input('category_id')){
            $customer->categories =json_encode($request->input('category_id'));
         }
      
         if($request->input('password')){
            $customer->password=Hash::make($request->input('password'));
         }
        $customer->save();
         return redirect(route('admin.customers.index'));
     }
 
     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
         $customer = Customer::findOrFail($id);
         $customer->delete();
         return back();
     }
}
