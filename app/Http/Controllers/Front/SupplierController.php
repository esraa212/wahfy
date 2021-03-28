<?php

namespace App\Http\Controllers\Front;

use Validator;
use App\Models\Rating;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\FrontController;

class SupplierController extends FrontController
{
     public function __construct()
    {
            parent::__construct();
    }
      private $review_rules = array(
        'value'  => 'required',
        'description'  => 'required',

    );
   //the store Details with Products 
    public function index($supplier){
          $data=Supplier::where('name',$supplier)->first();
         if(!$data){
        return $this->error404();
      }
      $categories=ProductCategory::where('supplier_id',$data->id)->get();
      $this->data['supplier']=$data;
      $this->data['categories']=$categories;


      return $this->_view('suppliers.index', 'Front');

    }
    public function product($product){
          $product=Product::where('title',$product)->first();
         if(!$product){
        return $this->error404();
      }
      $this->data['product']=$product;
      $this->data['attributes']=\DB::table('products_attributes')->join('attributes','attributes.id','=','products_attributes.attribute_id')
         ->join('colors','colors.id','=','products_attributes.color_id')
         ->where('products_attributes.product_id',$product->id)
         ->select('colors.name as color','colors.id as color_id','attributes.type as size_type','attributes.value as size_value','attributes.id as size_id','products_attributes.quantity')->get();
      $this->data['brands']=Supplier::where('industry_id',$product->supplier->industry_id)->get()->random(1);
      $this->data['related_products']=Product::where('product_category_id',$product->product_category_id)->limit(5)->get();
      return $this->_view('products.show', 'Front');

    }
    public function review(Request $request){
         $product=Product::where('id',$request->input('product_id'))->first();
         if(!$product){
        return $this->error404();
      }
           try {
            $validator = Validator::make($request->all(), $this->review_rules);
            if ($validator->fails()) {
                if ($request->ajax()) {
                    $errors =$validator->errors()->all();
             
                      return response()->json(['errors'=>$errors]);

                } else {
                          return redirect()->back()->with('error','error inRating');

                }
            }
            
            $rating = new Rating;
            $rating->value = $request->input('value');
            $rating->description = $request->input('description');
            $rating->product_id=$request->input('product_id');
            if(\Auth::guard('customers')->user()){
          $rating->customer_id=\Auth::guard('customers')->user()->id;
            }else{
               return response()->json(['error'=>'you have to login First to Sumbit Your Rating']);
            }
          
            $rating->supplier_id=$product->supplier_id;
            $rating->save();
            $ratings=Rating::where('product_id',$product->id)->get();
                if ($request->ajax()) {
                return response()->json(['message'=>'Your Review  Has Been added Successfully','count'=>$ratings->count()]);

                } else {
                    return redirect()->back()->with('success','Your Review  Has Been added Successfully');
                }
        } catch (\Exception $ex) {
            dd($ex);
        }
    }
}
