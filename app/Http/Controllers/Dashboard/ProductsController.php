<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\CreateRequest;
use App\Http\Requests\Admin\Product\UpdateRequest;



class ProductsController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $products = Product::latest()->get();
         return view('Dashboard.products.index', compact('products'));
     }
 
     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
         $categories = ProductCategory::all();
         $suppliers = Supplier::all();

         return view('Dashboard.products.create', compact('categories','suppliers'));
     }
 
     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(CreateRequest $request)
     {
        
         $product = new Product;
         $product->title = $request->input('title');
         $product->description = $request->input('description');
         $product->price = $request->input('price');
         $product->tax = $request->input('tax');
         $product->supplier_id = $request->input('supplier_id');
         $product->product_category_id = $request->input('product_category_id');
         $product->product_sub_category_id = $request->input('product_sub_category_id');
         $product->quantity = $request->input('quantity');
         $product->active = $request->input('active');
         $product->image = $this->upload($request->file('image'));
         $product->size = $request->input('size');       
          $product->color = $request->input('color');
         $product->save();
         return redirect(route('admin.products.index'));
     }
 
     /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function show($id)
     {
         
        $product = Product::findOrFail($id);
        $categories = ProductCategory::all();
        $sub_categories=ProductSubCategory::all();
        $suppliers=Supplier::all();


        return view('Dashboard.products.show', compact('product', 'categories','sub_categories','suppliers'));
     }
 
     /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function edit($id)
     {
         $product = Product::findOrFail($id);
         $categories = ProductCategory::all();
         $sub_categories=ProductSubCategory::all();
         $suppliers=Supplier::all();

 
         return view('Dashboard.products.edit', compact('product', 'categories','sub_categories','suppliers'));
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
        $product=Product::findOrFail($id);
        $product->title = $request->input('title');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->tax = $request->input('tax');
        $product->supplier_id = $request->input('supplier_id');
        $product->product_category_id = $request->input('product_category_id');
        $product->product_sub_category_id = $request->input('product_sub_category_id');
        $product->quantity = $request->input('quantity');
        $product->active = $request->input('active');
        if($request->file('image')){
    
            $product->image = $this->upload($request->file('image'));
        }
        $product->save();
        return redirect(route('admin.products.index'));
     }
 
     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
        $product=Product::findOrFail($id);
         $product->delete();
         return back();
     }

     public function upload($image)
     {
         $file = $image;
         $extension = $file->getClientOriginalExtension();
         $filename = time() . '.' . $extension;
         $file->move('uploads/products', $filename);
         return '/uploads/products/' . $filename;
     }
 
}
