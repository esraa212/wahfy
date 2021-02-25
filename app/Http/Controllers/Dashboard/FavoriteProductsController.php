<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FavoriteProductsController extends Controller
{
    public function index(){
        $favorites = \DB::table('favorites')->select('*')->get();
        return view('Dashboard.favorite_products.index', compact('favorites'));
    }
    
    public function show($id){
        $product = Product::findOrFail($id);
        $categories = ProductCategory::all();
        $sub_categories=ProductSubCategory::all();
        $suppliers=Supplier::all();


        return view('Dashboard.favorite_products.show', compact('product', 'categories','sub_categories','suppliers'));
    }
    
}
