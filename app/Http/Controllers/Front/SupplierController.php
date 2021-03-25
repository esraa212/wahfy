<?php

namespace App\Http\Controllers\Front;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\FrontController;

class SupplierController extends FrontController
{
     public function __construct()
    {
            parent::__construct();
    }
   //the store Details with Products 
    public function index($supplier){
          $data=Supplier::where('name',$supplier)->first();
         if(!$data){
        return $this->error404();
      }
      $categories=ProductCategory::where('supplier_id',$data->id)->get();
      $this->data['supplier']=$data;
      $this->data['categories']=$categories;


      return $this->_view('suppliers.index', 'Front');

    }
    public function product($product){
          $product=Product::where('title',$product)->first();
         if(!$product){
        return $this->error404();
      }
      $this->data['product']=$product;
      $this->data['brands']=Supplier::where('industry_id',$product->supplier->industry_id)->get()->random(1);
      $this->data['related_products']=Product::where('product_category_id',$product->product_category_id)->limit(5)->get();
      return $this->_view('products.show', 'Front');

    }
}
