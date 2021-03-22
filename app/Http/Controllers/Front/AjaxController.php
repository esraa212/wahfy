<?php

namespace App\Http\Controllers\Front;

use App\Models\Area;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AjaxController extends Controller
{
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
   public function getSuppliers(Request $request){
     $supplier=array();
   if($request->area){
    $suppliers = Supplier::where('area_id', '=',$request->area)->select('*')->get()->toArray();
   
   }
     
      if($request->category){   
      $suppliers = Supplier::where('category_id', '=',$request->category)->select('*')->get()->toArray();
      }
      
    return response()->json($suppliers);
  }
  public function getSuppliersBySearch($search){
   $suppliers = Supplier::where('name', 'like',"%{$search}%")->select('*')->get()->toArray();
    return response()->json($suppliers);

  }
  public function filterProducts(Request $request){
    if($request->p_subcategory){
         $products = Product::where('product_sub_category_id', '=',$request->p_subcategory)->select('*')->get()->toArray();
    return response()->json($products);
    }

  }
  
}
