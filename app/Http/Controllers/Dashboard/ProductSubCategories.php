<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductSubCategory\CreateRequest;
use App\Http\Requests\Admin\ProductSubCategory\UpdateRequest;

class ProductSubCategories extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $subcategories = ProductSubCategory::latest()->get();
         return view('Dashboard.product_Subcategories.index', compact('subcategories'));
     }
 
     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
         $categories = ProductCategory::all();
         return view('Dashboard.product_Subcategories.create', compact('categories'));
     }
 
     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(CreateRequest $request)
     {
         $subCategory= new ProductSubCategory;
         $subCategory->name = $request->input('name');
         $subCategory->product_category_id = $request->input('product_category_id');
         $subCategory->save();
         return redirect(route('admin.product_subCategories.index'));
     }
 
     /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function show($id)
     {
         //
     }
 
     /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function edit($id)
     {
         $subCategory=ProductSubCategory::findOrFail($id);
         $categories = ProductCategory::all();
 
         return view('Dashboard.product_Subcategories.edit',compact('subCategory','categories'));
     }
 
     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function update(UpdateRequest $request, $id)
     {
         $subCategory=ProductSubCategory::findOrFail($id);
         $subCategory->update($request->all());
         return redirect(route('admin.product_subCategories.index'));
         
     }
 
     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
         $subCategory=ProductSubCategory::findOrFail($id);
         $subCategory->delete();
         return back();
     }
}
