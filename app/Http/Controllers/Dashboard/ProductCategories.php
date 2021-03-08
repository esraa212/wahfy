<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductCategory\CreateCategoryRequest;
use App\Http\Requests\Admin\ProductCategory\UpdateCategoryRequest;

class ProductCategories extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $categories = ProductCategory::all();
         return view('Dashboard.product_categories.index', compact('categories'));
     }
 
     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
         $suppliers=Supplier::all();
         return view('Dashboard.product_categories.create',compact('suppliers'));
     }
 
     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(CreateCategoryRequest $request)
     {
         $category = ProductCategory::create($request->all());
         return redirect(route('admin.product_categories.index'));
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
        $suppliers=Supplier::all();
         $category = ProductCategory::findOrFail($id);
 
         return view('Dashboard.product_categories.edit', compact('category','suppliers'));
     }
 
     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function update(UpdateCategoryRequest $request, $id)
     {
         $category = ProductCategory::findOrFail($id);
         $category->update($request->all());
         return redirect(route('admin.product_categories.index'));
     }
 
     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
         $category = ProductCategory::findOrFail($id);
         $category->delete();
         return back();
     }
 
}
