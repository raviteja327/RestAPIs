<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\API\companies;

class ordersController extends Controller
{
    //

    public function create(Request $request){

        $valid = Validator::make($request->all() , [
            'coupon_name' => 'required | unique:App\Models\API\orders,coupon_name',
            'product_hash' => 'required',
            'company_hash' => 'required',
            'customer_hash' => 'required',
            'coupon_amount' => 'required',
            'company_db_user_hash' => 'required',
            'c_hash' => 'required',
            'c_token' => 'required',
            'c_sec_key' => 'required',
        ]);

        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else{

            $c_hash = $request->c_hash;
            $c_token = $request->c_token;
            $c_sec_key = $request->c_sec_key;

            $status = companies::where('c_hash', $c_hash)->where('c_token', $c_token)->where('c_sec_key', $c_sec_key)->where('status', 1)->get();

            if ($status) {
                
                $order_hash = md5($request->coupon_name.now());
                $product_hash = $request->product_hash;
                $company_hash = $request->company_hash;
                $customer_hash = $request->customer_hash;
                $coupon_amount = $request->coupon_amount;
                $coupon_name = $request->coupon_name;
                $coupon_description = $request->coupon_description;
                $total_stock = $request->total_stock;
                $active_date = $request->active_date;
                $expiry_date = $request->expiry_date;
                $c_token = $request->c_token;
                $c_hash = $request->c_hash;
                $c_sec_key = $request->c_sec_key;
                $company_db_user_hash = $request->company_db_user_hash;
    
                $data = array(
                    'order_hash' => $order_hash,
                    'product_hash' => $product_hash,
                    'company_hash' => $company_hash,
                    'customer_hash' => $customer_hash,
                    'coupon_amount' => $coupon_amount,
                    'coupon_name' => $coupon_name,
                    'coupon_description' => $coupon_description,
                    'total_stock' => $total_stock,
                    'active_date' => $active_date,
                    'expiry_date' => $expiry_date,
                    'c_token' => $c_token,
                    'c_hash' => $c_hash,
                    'c_sec_key' => $c_sec_key,
                    'company_db_user_hash' => $company_db_user_hash,
                    'created_by' => "NULL",
                    'updated_by' => "NULL",
                    'created_at' => now(),
                    'updated_at' => now(),
                );
    
                $orders = DB::table('orders')->where('product_hash', $product_hash)->where('company_hash', $company_hash)->where('customer_hash', $customer_hash)->where('c_token', $c_token)->where('c_hash', $c_hash)->where('c_sec_key', $c_sec_key)->where('company_db_user_hash', $company_db_user_hash)->insert($data);
    
                if ($orders) {
                    return response()->json(array(
                        'status' => 1,
                        'message' => $data
                    ));
                } else {
                    return response()->json(array(
                        'status' => 0,
                        'message' => 'Not Saved'
                    ));
                }

            } else {
                
                return response()->json(array(
                    'status' => 0,
                    'message' => 'Invalid access details Saved'
                ));
                
            }
       
        }

    }

    public function views(Request $request){

        $valid = Validator::make($request->all() , [
            'c_hash' => 'required',
            'c_token' => 'required',
            'c_sec_key' => 'required',
        ]);
 
        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else {
            
            $c_hash = $request->c_hash;
            $c_token = $request->c_token;
            $c_sec_key = $request->c_sec_key;

            $status = companies::where('c_hash', $c_hash)->where('c_token', $c_token)->where('c_sec_key', $c_sec_key)->where('status', 1)->get();

            if ($status) {
                
                $orders = DB::table('orders')->where('c_hash', $c_hash)->where('c_token', $c_token)->where('c_sec_key', $c_sec_key)->where('status', 1)->get();

                if ($orders) {
                    return response()->json($orders);
                } else {
                    return response()->json(array(
                        'status' => 0,
                        'message' => 'No Data Found'
                    ));
                }

            } else {
                
                return response()->json(array(
                    'status' => 0,
                    'message' => 'Invalid access details Saved'
                ));

            }
            
        }

    }

    public function view(Request $request){

        $valid = Validator::make($request->all() , [
            'c_hash' => 'required',
            'c_token' => 'required',
            'c_sec_key' => 'required',
        ]);
 
        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else {
            
            $c_hash = $request->c_hash;
            $c_token = $request->c_token;
            $c_sec_key = $request->c_sec_key;

            $status = companies::where('c_hash', $c_hash)->where('c_token', $c_token)->where('c_sec_key', $c_sec_key)->where('status', 1)->get();

            if ($status) {

                $order_hash = $request->id;
                
                $orders = DB::table('orders')->where('order_hash', $order_hash)->where('c_hash', $c_hash)->where('c_token', $c_token)->where('c_sec_key', $c_sec_key)->where('status', 1)->get();

                if ($orders) {
                    return response()->json($orders);
                } else {
                    return response()->json(array(
                        'status' => 0,
                        'message' => 'No Data Found'
                    ));
                }

            } else {
                
                return response()->json(array(
                    'status' => 0,
                    'message' => 'Invalid access details Saved'
                ));

            }
            
        }

    }

    public function update(Request $request){

        $valid = Validator::make($request->all() , [
            'coupon_name' => 'required | unique:App\Models\API\orders,coupon_name',
            'product_hash' => 'required',
            'company_hash' => 'required',
            'customer_hash' => 'required',
            'coupon_amount' => 'required',
            'company_db_user_hash' => 'required',
            'c_hash' => 'required',
            'c_token' => 'required',
            'c_sec_key' => 'required',
        ]);

        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else{

            $c_hash = $request->c_hash;
            $c_token = $request->c_token;
            $c_sec_key = $request->c_sec_key;

            $status = companies::where('c_hash', $c_hash)->where('c_token', $c_token)->where('c_sec_key', $c_sec_key)->where('status', 1)->get();

            if ($status) {
                
                $order_hash = $request->id;
                $product_hash = $request->product_hash;
                $company_hash = $request->company_hash;
                $customer_hash = $request->customer_hash;
                $coupon_amount = $request->coupon_amount;
                $coupon_name = $request->coupon_name;
                $coupon_description = $request->coupon_description;
                $total_stock = $request->total_stock;
                $active_date = $request->active_date;
                $expiry_date = $request->expiry_date;
                $c_token = $request->c_token;
                $c_hash = $request->c_hash;
                $c_sec_key = $request->c_sec_key;
                $company_db_user_hash = $request->company_db_user_hash;
    
                $data = array(
                    'product_hash' => $product_hash,
                    'company_hash' => $company_hash,
                    'customer_hash' => $customer_hash,
                    'coupon_amount' => $coupon_amount,
                    'coupon_name' => $coupon_name,
                    'coupon_description' => $coupon_description,
                    'total_stock' => $total_stock,
                    'active_date' => $active_date,
                    'expiry_date' => $expiry_date,
                    'company_db_user_hash' => $company_db_user_hash,
                    'updated_by' => "NULL",
                    'updated_at' => now(),
                );
    
                $orders = DB::table('orders')->where('order_hash', $order_hash)->where('c_token', $c_token)->where('c_hash', $c_hash)->where('c_sec_key', $c_sec_key)->update($data);
    
                if ($orders) {
                    return response()->json(array(
                        'status' => 1,
                        'message' => 'Updated Successfully'
                    ));
                } else {
                    return response()->json(array(
                        'status' => 0,
                        'message' => 'Not Updated'
                    ));
                }

            } else {
                
                return response()->json(array(
                    'status' => 0,
                    'message' => 'Invalid access details Saved'
                ));
                
            }
            
        }

    }

    public function delete(Request $request){

        $valid = Validator::make($request->all() , [
            'c_hash' => 'required',
            'c_token' => 'required',
            'c_sec_key' => 'required',
        ]);
 
        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else {
            
            $c_hash = $request->c_hash;
            $c_token = $request->c_token;
            $c_sec_key = $request->c_sec_key;

            $status = companies::where('c_hash', $c_hash)->where('c_token', $c_token)->where('c_sec_key', $c_sec_key)->where('status', 1)->get();

            if ($status) {
                
                $order_hash = $request->id;
                $company_db_user_hash = $request->company_db_user_hash;
                $product_hash = $request->product_hash;
                $company_hash = $request->company_hash;
                $customer_hash = $request->customer_hash;
        
                $data = array(
                    'status' => 0,
                    'updated_by' => "NULL",
                    'updated_at' => now(),
                );
        
                $orders = DB::table('orders')->where('order_hash', $order_hash)->where('product_hash', $product_hash)->where('company_hash', $company_hash)->where('customer_hash', $customer_hash)->where('c_token', $c_token)->where('c_hash', $c_hash)->where('c_sec_key', $c_sec_key)->where('company_db_user_hash', $company_db_user_hash)->update($data);
        
                if($orders){
        
                    return response()->json(array(
                        'status' => 1,
                        'message' => 'Deleted Successfully'
                    ));
        
                }else{
        
                    return response()->json(array(
                        'status' => 0,
                        'message' => 'Not Deleted'
                    ));
        
                }

            } else {
                
                return response()->json(array(
                    'status' => 0,
                    'message' => 'Invalid access details Saved'
                ));

            }
            
        }

    }

}
