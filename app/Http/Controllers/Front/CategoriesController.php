<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\FrontController;
use Illuminate\Http\Request;

class CategoriesController extends FrontController
{
    public function __construct()
    {
            parent::__construct();
    }
    public function show($industry){
      return $this->_view('industries.show', 'Front');

    }
}
