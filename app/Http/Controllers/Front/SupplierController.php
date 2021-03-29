<?php

namespace App\Http\Controllers\Front;

use Validator;
use App\Models\Color;
use App\Models\Rating;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Attribute;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\FrontController;

class SupplierController extends FrontController
{
     public function __construct()
    {
            parent::__construct();
    }
  
   //the store(supplier) Details with Products 
    public function index($supplier){
          $data=Supplier::where('name',$supplier)->first();
         if(!$data){
        return $this->error404();
      }
      $categories=ProductCategory::where('supplier_id',$data->id)->get();
      $this->data['supplier']=$data;
      $this->data['categories']=$categories;

         $this->data['sizes']=Attribute::where('type','size')->get();
         $this->data['colors']=Color::all();
      
      return $this->_view('suppliers.index', 'Front');

    }

  
}
