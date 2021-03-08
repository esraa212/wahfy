<?php

namespace App\Http\Controllers\Front;

use App\Models\Deal;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        $banners=Banner::orderBy('order')->get();
        $hotdeals=Deal::join('products','deals.product_id','products.id')
        ->leftJoin('ratings','ratings.product_id','products.id')
        ->where('deals.active',1)
        ->select(['deals.id',\DB::raw('AVG(ratings.value) as rating'),
        'products.title as product_name','products.description as product_description','products.image as product_image','deals.price_after as product_price'])
       ->groupBy('deals.id')->get();
        return view('Front.index',compact('banners','hotdeals'));
    }
}
