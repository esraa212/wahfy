<?php

namespace App\Http\Controllers\Api;

use App\Models\Rating;
use App\Models\Product;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\ApiController;

class ProductsController extends ApiController
{
    public function index(request $request){
       $products=Product::where('supplier_id',$request->supplier_id)->paginate(6);
       if($products->count()==0){
        return $this->failedResponse($products, 'there is no data for this supplier store', 200);
       }
        return $this->successResponse($products);
    }


    public function show(Request $request,$id){
        $product=Product::find($id);
        if(!$product){
            return $this->failedResponse($product, 'Product Not Found', 200);
           }   
      
         if($request->like||$request->rating_value){
            if(Auth::guard('customer-api')->user()==null){
                return response()->json([
                    'status' => 1,
                    'msg' => 'please login to rate The Product',
                ]);
            }
            $rating=Rating::where('product_id',$product->id)->first();
           if(!$rating){
            $rating=new Rating;
            $rating->product_id=$product->id;
            $rating->customer_id=Auth::guard('customer-api')->user()->id;
           }

      
           if($request->like){
               $rating->like=$request->like;
            
           }
           if($request->rating_value){
            $rating->value=$request->rating_value;
         
           }
           if($request->description){
            $rating->description=$request->description;
         
        }
           $rating->save();
            return response()->json([
                'status' => 1,
                'msg' => 'success ratting has been added successfully',
            ]);
        }
        if($request->feedback){
            if(Auth::guard('customer-api')->user()==null){
                return response()->json([
                    'status' => 1,
                    'msg' => 'please login to insert your Feedback',
                ]);
            }
            $feedback=new Feedback;
            $feedback->feedback_text=$request->feedback;
            $feedback->product_id = $product->id;
            $feedback->customer_id=Auth::guard('customer-api')->user()->id;
            $feedback->supplier_id=$product->supplier_id;
            $feedback->save();
            return response()->json([
                'status' => 1,
                'msg' => 'success,Feedback has been added successfully',
            ]);
        }
           return $this->successResponse($product);  
            
    }
    
}
