<?php

namespace App\Http\Controllers;

use App\Models\Industry;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    protected $data=array();
    public function __construct()
        {
            $this->data['industries']=$this->getIndustries();
        }

    protected function getIndustries(){
             $industries = Industry::take(7)->get();
            return  $industries;
    }
     protected function _view($main_content, $type = 'Front')
    {
        $main_content = "$type/$main_content";
        return view($main_content, $this->data);
    }
    
}
