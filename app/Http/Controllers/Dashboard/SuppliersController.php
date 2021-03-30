<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Area;
use App\Models\City;
use App\Models\Category;
use App\Models\Industry;
use App\Models\Supplier;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Supplier\CreateSupplierRequest;
use App\Http\Requests\Admin\Supplier\UpdateSupplierRequest;
use App\Traits\dashbordTrait;


class SuppliersController extends Controller
{
       use dashbordTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::latest()->get();
        return view('Dashboard.suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::latest()->get();
        $cities = City::latest()->get();
        $industries = Industry::latest()->get();

        return view('Dashboard.suppliers.create',compact('cities','categories','industries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSupplierRequest $request)
    {
         $data=$request->all();
        $data['image'] = $this->upload($request->file('image'),'suppliers');
        $supplier = Supplier::create($data);
        return redirect(route('admin.suppliers.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('Dashboard.suppliers.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);
        $categories = Category::latest()->get();
        $cities = City::latest()->get();
        $areas=Area::latest()->get();
        $sub_categories=SubCategory::latest()->get();
        $industries = Industry::latest()->get();
        return view('Dashboard.suppliers.edit', compact('supplier','categories','industries','cities','areas','sub_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSupplierRequest $request, $id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->name=$request->input('name');
        $supplier->address=$request->input('address');
        $supplier->industry_id=$request->input('industry_id');
        $supplier->city_id=$request->input('city_id');
        $supplier->area_id=$request->input('area_id');
        $supplier->category_id=$request->input('category_id');
        $supplier->sub_category_id=$request->input('sub_category_id');
         if($request->file('image')){

            $supplier->image = $this->upload($request->file('image'),'suppliers');
        }
        $supplier->save();
        return redirect(route('admin.suppliers.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
        return back();
    }
}
