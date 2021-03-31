<?php

namespace App\Http\Controllers\Front;

use Validator;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\FrontController;


class OrderController extends FrontController
{
      public function __construct()
    {
            parent::__construct();
    }
     private $method_rules = array(
        'payment_method'  => 'required',
    
    );
    public function store(Request $request){
            try {
            $validator = Validator::make($request->all(), $this->method_rules);
            if ($validator->fails()) {
                if ($request->ajax()) {
                    $errors =$validator->errors()->all();
             
                      return response()->json(['errors'=>$errors]);

                } else {
                return redirect()->back()->with('error','error inRating');

                }
            }
            $total=0;
            $cart=session('cart');
            foreach ($cart as $key => $value){
             $total += $value['price'] * $value['quantity']; 
            }
           $payment=new Payment;
           $payment->amount=$total;
           $payment->status='pendding';
           $payment->payment_date=Carbon::now();
           $payment->method=$request->input('payment_method');
            if(\Auth::guard('customers')->user()){
          $payment->customer_id=\Auth::guard('customers')->user()->id;
            }else{
               return response()->json(['error'=>'you have to login First to Sumbit Your Order']);
            }
            $payment->save();
            $order= new Order;
            $order->payment_id=$payment->id;
            $order->order_date=Carbon::now();
            $order->customer_id=$payment->customer_id;
            $order->subtotal=0;
            $order->shipping=0;
            $order->tax=0;
            $order->total_value=$total;
            $order->save();
                foreach (session('cart') as $key => $value) {
            \DB::table('order_product')->insert(
                array(
                    'order_id' => $order->id,
                    'product_id' => $value['product_id'],
                    'quantity' => $value['quantity'], 
                )
            );
        }
         session()->forget('cart');
                if ($request->ajax()) {
                return response()->json(['message'=>'Your Order  Has Been Applied Successfully']);

                } else {
                    return redirect()->back()->with('success','Your Order  Has Been Applied Successfully');
                }
        } catch (\Exception $ex) {
            dd($ex);
        }
    }
}
