<?php

namespace App\Http\Controllers\Front;

use Validator;
use App\Models\Color;
use App\Models\Rating;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Attribute;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\FrontController;

class ProductController extends FrontController
{

      public function __construct()
    {
            parent::__construct();
    }

      private $review_rules = array(
        'value'  => 'required',
        'description'  => 'required',

    );
    //all products by filterby category and subCategory view
    //id=1 for category 2 for subCatgeory
     public function index($id,$value){
   
         $this->data['sizes']=Attribute::where('type','size')->get();
         $this->data['colors']=Color::all();
         $suppliers=array();
         if($id==1){
                $subcategory=Category::where('name',$value)->first();
                $suppliers=Supplier::where('category_id',$subcategory->id)->pluck('id');
           
            }
            if($id==2){
                $subcategory=SubCategory::where('name',$value)->first();
                $suppliers=Supplier::where('sub_category_id',$subcategory->id)->pluck('id');
            }
             $products=Product::whereIn('supplier_id',$suppliers)->get();
             $this->data['products']=$products;
      return $this->_view('products.index', 'Front');
     }


//view product Details
      public function product($product){
          $product=Product::where('title',$product)->first();
         if(!$product){
        return $this->error404();
      }

      $this->data['product']=$product;
      $this->data['attributes']=\DB::table('products_attributes')->join('attributes','attributes.id','=','products_attributes.attribute_id')
         ->join('colors','colors.id','=','products_attributes.color_id')
         ->where('products_attributes.product_id',$product->id)
         ->select('colors.name as color','colors.id as color_id','attributes.type as size_type','attributes.value as size_value','attributes.id as size_id','products_attributes.quantity')->groupBy('products_attributes.color_id')->get();

      $this->data['brands']=Supplier::where('industry_id',$product->supplier->industry_id)->get()->random(1);
      $this->data['related_products']=Product::where('product_category_id',$product->product_category_id)->limit(5)->get();
      return $this->_view('products.show', 'Front');

    }
//sumbit Rating For Product
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

    ///cart
       public function cart()
    {
    if(request('id')&&request('resourcePath')){
            $payment_status=$this->getPaymentStatus(request('id'),request('resourcePath'));
            if(isset($payment_status['id'])){
                $showPaymentMessage=true;
            }else{
                $showPaymentMessage=true;

            }
            $this->data['success']=$showPaymentMessage;
            return $this->_view('cart', 'Front');
    }
            return $this->_view('cart', 'Front');
  }


  //add product to cart
  public function addToCart($id)
  {
      $product = Product::find($id);
      if(!$product) {
                return $this->error404();
      }
      $cart = session()->get('cart');
  // if cart is empty then this the first product
  if(!$cart) {
      $cart = [
              $id => [
                  "title" => $product->title,
                  "quantity" => 1,
                  "price" => $product->price,
                  "image" => $product->image,
                  "brand"=>$product->supplier->name
              ]
      ];
      session()->put('cart', $cart);
      return redirect()->back()->with('success', 'Product added to cart successfully!');
  }
      // if cart not empty then check if this product exist then increment quantity
      if(isset($cart[$id])) {
          $cart[$id]['quantity']++;
          session()->put('cart', $cart);
          return redirect()->back()->with('success', 'Product added to cart successfully!');
      }
      // if item not exist in cart then add to cart with quantity = 1
      $cart[$id] = [
          "title" => $product->title,
          "quantity" => 1,
          "price" => $product->price,
          "image" => $product->image,
          "brand"=>$product->supplier->name
      ];
      session()->put('cart', $cart);
      return redirect()->back()->with('success', 'Product added to cart successfully!');
  }


   

   public function checkout(Request $request){
        $url = "https://test.oppwa.com/v1/checkouts";
        $data = "entityId=8a8294174b7ecb28014b9699220015ca" .
                    "&amount=9" .$request->price.
                    "&currency=EUR" .
                    "&paymentType=DB";
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                       'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if(curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
         $res=json_decode($responseData,true);
         $view =view('Front.payment.formajax')->with(['responseData'=>$res,'id'=>$request->id])->renderSections();
         return response()->json([
              'status'=>true,
              'content'=>$view['content']
         ]);
        
    }

    //payment Status
      private function getPaymentStatus($id,$resourcePath){
        $url = "https://test.oppwa.com/";
        $url .=$resourcePath;
	$url .= "?entityId=8a8294174b7ecb28014b9699220015ca";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                   'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$responseData = curl_exec($ch);
	if(curl_errno($ch)) {
		return curl_error($ch);
	}
	curl_close($ch);
	return json_decode($responseData,true);

    }

}
