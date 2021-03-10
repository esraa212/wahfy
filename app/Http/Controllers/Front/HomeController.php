<?php

namespace App\Http\Controllers\Front;

use App\Models\Deal;
use App\Models\Banner;
use App\Models\Industry;
use App\Models\Advertisment;
use Illuminate\Http\Request;
use App\Http\Controllers\FrontController;

class HomeController extends FrontController
{
    // protected $industries;
        public function __construct()
    {
            parent::__construct();
    }

    public function index(){
        $banners=Banner::orderBy('order')->get();
        $hotdeals=Deal::join('products','deals.product_id','products.id')
        ->leftJoin('ratings','ratings.product_id','products.id')
        ->where('deals.active',1)
        ->select(['deals.id',\DB::raw('AVG(ratings.value) as rating'),
        'products.title as product_name','products.price as price_before','products.description as product_description','products.image as product_image','deals.price_after as product_price','deals.discount_type','deals.discount_value'])
       ->groupBy('deals.id')->get();
       $advertisings=Advertisment::take(3)->get();
       $home_industries=Industry::all();
            $this->data['banners']=$banners;
            $this->data['hotdeals']=$hotdeals;
            $this->data['advertisings']=$advertisings;
            $this->data['home_industries']=$home_industries;
      return $this->_view('index', 'Front');
    }
}
