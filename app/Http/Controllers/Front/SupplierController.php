<?php

namespace App\Http\Controllers\Front;

use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\FrontController;

class SupplierController extends FrontController
{
     public function __construct()
    {
            parent::__construct();
    }
    
    public function index($supplier){
          $data=Supplier::where('name',$supplier)->first();
         if(!$data){
        return $this->error404();
      }
      $this->data['supplier']=$data;

      return $this->_view('suppliers.index', 'Front');

    }
}
