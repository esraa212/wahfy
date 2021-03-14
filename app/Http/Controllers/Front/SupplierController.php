<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\FrontController;
use Illuminate\Http\Request;

class SupplierController extends FrontController
{
     public function __construct()
    {
            parent::__construct();
    }
    
    public function index(){
      return $this->_view('suppliers.index', 'Front');

    }
}
