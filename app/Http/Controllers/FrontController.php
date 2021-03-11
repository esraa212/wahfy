<?php

namespace App\Http\Controllers;

use App\Models\Industry;
use App\Models\Subscription;

use Illuminate\Http\Request;
use Validator;

class FrontController extends Controller
{
    protected $data=array();
      private $subscription_rules = array(
        'email'  => 'required|unique:subscriptions,email|email',
    );
    public function __construct()
        {
            $this->data['industries']=$this->getIndustries();
        }

    protected function getIndustries(){
             $industries = Industry::take(7)->get();
            return  $industries;
    }
     protected function _view($main_content, $type = 'Front')
    {
        $main_content = "$type/$main_content";
        return view($main_content, $this->data);
    }
    public function subscribe(Request $request){
                try {
            $validator = Validator::make($request->all(), $this->subscription_rules);
            if ($validator->fails()) {
                if ($request->ajax()) {
                    $errors =$validator->errors()->all();
             
                      return response()->json(['errors'=>$errors]);

                } else {
                          return redirect()->back()->with('error','this email is added before');

                }
            }
            
            $subscriber = new Subscription;
            $subscriber->email = $request->input('email');
            $subscriber->save();
            
                if ($request->ajax()) {
                return response()->json(['message'=>'email Has Been added Successfully']);

                } else {
                    return redirect()->back()->with('success','email Has Been added Successfully');
                }
        } catch (\Exception $ex) {
            dd($ex);
        }
     


    }
    
}
