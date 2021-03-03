<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;

class StoresController extends ApiController
{
     public function index(Request $request){
   
        $data=array();
        $categories = Category::take(4)->get();
        $suppliers = Supplier::where('industry_id',$request->industry_id)->get();
        $data['categories']=$categories;
        $data['suppliers']=$suppliers;
    if ($data) {
        return $this->successResponse($data);
    } else {
        return $this->failedResponse($data, 'data not found', 200);
    }
     }
}
