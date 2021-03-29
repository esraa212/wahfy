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

  //get suppliers by category area or subCategory id=1 area 2 category 3 subcategory 
   public function getSuppliers($id,$value){
     $supplier=array();
   if($id==1){
    $suppliers = Supplier::where('area_id', '=',$value)->select('*')->get()->toArray();
   
   }
     
      if($id==2){   
      $suppliers = Supplier::where('category_id', '=',$value)->select('*')->get()->toArray();
      }
         if($id==3){   
      $suppliers = Supplier::where('sub_category_id', '=',$value)->select('*')->get()->toArray();
      }
      
    return response()->json($suppliers);
  }
  public function getSuppliersBySearch($search){
   $suppliers = Supplier::where('name', 'like',"%{$search}%")->select('*')->get()->toArray();
    return response()->json($suppliers);

  }


  public function filterProducts($id,$value){
    $products=array();
    //2 for product_sub_category
    if($id==2){
         $products = Product::where('product_sub_category_id', '=',$value)->select('*')->get()->toArray();
    }
    //1 for product_category
     if($id==1){
         $products = Product::where('product_category_id', '=',$value)->select('*')->get()->toArray();
    }
    //3 for price
     if($id==3){
       $max=max(explode(',',$value));
       $min=min(explode(',',$value));
         $products = Product::whereBetween('price',[$min, $max])->select('*')->get()->toArray();
    }
    //4 for size
     if($id==4){
       $sizes=  explode(',', $value);
      //dd($sizes);
    $products = Product::leftjoin('products_attributes','products.id','=','products_attributes.product_id')
    ->whereIn('products_attributes.attribute_id',$sizes)
    ->select('products.*')->groupBy('products_attributes.product_id')->get()->toArray();

    }

     //4 for size
     if($id==5){
      //dd($sizes);
    $products = Product::leftjoin('products_attributes','products.id','=','products_attributes.product_id')
    ->where('products_attributes.color_id',$value)
    ->select('products.*')->groupBy('products_attributes.product_id')->get()->toArray();

    }
  return response()->json($products);
  }
  
}
