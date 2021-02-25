<?php

namespace App\Http\Controllers\Api\Customer\Auth;

use App\Models\Token;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Api\Customer\CreateCustomerRequest;
use App\Http\Requests\Api\Customer\UpdateCustomerRequest;
use App\Http\Requests\Api\Customer\RegisterTokenRequest;

class CustomerAuthController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:customer-api', ['except' => ['login', 'register']]);
    }


    public function login()
    {
        $credentials = request(['email', 'password']);
        if (!$token = Auth::guard('customer-api')->attempt($credentials)) {
            return response()->json([
                "status" => 0,
                'msg' => 'Unauthorized'
            ], 401);
        }

        return $this->respondWithToken($token);
    }

    public function register(Request $request)
    {

        $customer = new Customer;
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->mobile = $request->mobile;
        $customer->city_id = $request->city_id;
        $customer->area_id = $request->area_id;
        $customer->address = $request->address;
        $customer->categories =json_encode($request->categories);
        $customer->password=Hash::make($request->password);
        $customer->save();

        $credentials = request(['email', 'password']);
        if (!$token =Auth::guard('customer-api')->attempt($credentials)) {
            return response()->json([
                "status" => 0,
                'msg' => 'Unauthorized'
            ], 401);
        }
        return $this->respondWithToken($token);
    }

    public function refresh()
    {
        return $this->respondWithToken(Auth::guard('customer-api')->refresh());
    }
   
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::guard('customer-api')->factory()->getTTL() * 60
        ]);
    }

     public function logout()
     {

         $customer = Auth::guard('customer-api')->user();
         Auth::guard('customer-api')->logout();
         return response()->json([
             'status' => 1,
             'msg' => 'success'
         ]);
     }

     public function registerToken(RegisterTokenRequest $request)
     {
         $customer = Auth::guard('customer-api')->user();
 
         $getToken = Token::where('customer_id', $customer->id)->where('device_id', $request->device_id)->first();
         if ($getToken) {
             $getToken->token = $request->token;
             $getToken->save();
             return response()->json([
                 'status' => 1,
                 'msg' => 'updated',
             ]);
         } else {
             $token = new Token;
             $token->token = $request->token;
             $token->platform = $request->platform;
             $token->device_id = $request->device_id;
             $token->customer_id = $customer->id;
             $token->save();
 
             return response()->json([
                 'status' => 1,
                 'msg' => 'success',
             ]);
         }
     }
}
