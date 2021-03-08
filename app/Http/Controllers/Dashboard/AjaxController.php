<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Area;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use App\Http\Controllers\Controller;

class AjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

      //get areas
      public function getAreas($city_id)
      {
          $areas = Area::where('city_id', '=', $city_id)->select('*')->get()->toArray();
          return response()->json($areas);
      }

        //return subCategories of selcted category
     public function getSubByCategory($category_id){
        $subCategories = SubCategory::where('category_id', '=', $category_id)->select('*')->get()->toArray();
        return response()->json($subCategories);
    }
           //return subCategories of selcted categoryProduct
           public function getProductSubByCategory($product_category_id){
            $subCategories = ProductSubCategory::where('product_category_id', '=', $product_category_id)->select('*')->get()->toArray();
            return response()->json($subCategories);
        }
    //return products of selcted category
    public function getProductsByCategory($supplier_id){
        $products = Product::where('supplier_id', '=', $supplier_id)->select('*')->get()->toArray();
        return response()->json($products);
    }
       //return categories of selcted Supplier
       public function getCategoriesBySupplier($supplier_id){
        $categories = ProductCategory::where('supplier_id', '=', $supplier_id)->select('*')->get()->toArray();
        return response()->json($categories);
    }
  //return categories of selcted industry
  public function getCategoriesByIndustry($industry_id){
    $categories = Category::where('industry_id', '=', $industry_id)->select('*')->get()->toArray();
    return response()->json($categories);
}
}
