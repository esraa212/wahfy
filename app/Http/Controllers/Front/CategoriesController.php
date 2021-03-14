<?php

namespace App\Http\Controllers\Front;

use App\Models\Category;
use App\Models\Industry;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\FrontController;

class CategoriesController extends FrontController
{
    public function __construct()
    {
            parent::__construct();
    }
    public function show($industry){
      $data=Industry::where('name',$industry)->first();
      $categories=Category::where('industry_id',$data->id)->get();
      $suppliers=Supplier::where('industry_id',$data->id)->get();
      $this->data['categories']=$categories;
      $this->data['suppliers']=$suppliers;
      if(!$data){
        return $this->error404();

      }
      $this->data['industry']=$data;
      return $this->_view('industries.show', 'Front');

    }
}
