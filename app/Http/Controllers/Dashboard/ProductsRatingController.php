<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use App\Http\Controllers\Controller;

class ProductsRatingController extends Controller
{
    public function index(){
        $ratings = \DB::table('ratings')->select('*')->get();
        return view('Dashboard.products_rating.index', compact('ratings'));
    }

    public function show($id){
        $product = Product::findOrFail($id);
        $categories = ProductCategory::all();
        $sub_categories=ProductSubCategory::all();
        $suppliers=Supplier::all();


        return view('Dashboard.products_rating.show', compact('product', 'categories','sub_categories','suppliers'));
    }
}
