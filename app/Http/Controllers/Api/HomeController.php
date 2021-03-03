<?php

namespace App\Http\Controllers\Api;

use App\Models\Deal;
use App\Models\Banner;
use App\Models\Industry;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;

class HomeController extends ApiController
{
    public function home(){
        $data=array();
        $banners = Banner::take(3)->get();
        $industries = Industry::all();
        $data['banners']=$banners;
        $data['industries']=$industries;
        $hotdeals=Deal::join('products','deals.product_id','products.id')
        ->leftJoin('ratings','ratings.product_id','products.id')
        ->where('deals.active',1)
        ->select(['deals.id',\DB::raw('AVG(ratings.value) as rating'),
        'products.title as product_name','products.image as product_image','deals.price_after as product_price'])
        ->take(2)->groupBy('deals.id')->get();
        $data['hot_deals']=$hotdeals;
    if ($data) {
        return $this->successResponse($data);
    } else {
        return $this->failedResponse($data, 'data not found', 200);
    }
    }
    
  
}
