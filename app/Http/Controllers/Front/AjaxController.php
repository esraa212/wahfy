<?php

namespace App\Http\Controllers\Front;

use App\Models\Area;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AjaxController extends Controller
{
    //get areas
    public function getAreas($city_id)
    {
        $areas = Area::where('city_id', '=', $city_id)->select('*')->get()->toArray();
        return response()->json($areas);
    }

      //return subCategories of selcted category
   public function getSubByCategory($category_id){
      $subCategories = SubCategory::where('category_id', '=', $category_id)->select('*')->get()->toArray();
      return response()->json($subCategories);
  }
}
