<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class couponsController extends Controller
{
    //

    public function create(Request $request){

        $valid = Validator::make($request->all() , [
            'coupon_name' => 'required | unique:App\Models\API\coupons,coupon_name',
            'product_hash' => 'required',
            'company_hash' => 'required',
            'coupon_code' => 'required',
            'coupon_amount' => 'required',
            'c_token' => 'required',
            'c_hash' => 'required',
            'c_sec_key' => 'required',
            'company_db_user_hash' => 'required',
        ]);

        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else{

            $coupon_hash = md5($request->coupon_name);
            $coupon_name = $request->coupon_name;
            $product_hash = $request->product_hash;
            $company_hash = $request->company_hash;
            $coupon_code = $request->coupon_code;
            $coupon_amount = $request->coupon_amount;
            $coupon_description = $request->coupon_description;
            $total_stock = $request->total_stock;
            $active_date = $request->active_date;
            $expiry_date = $request->expiry_date;
            $c_token = $request->c_token;
            $c_hash = $request->c_hash;
            $c_sec_key = $request->c_sec_key;
            $company_db_user_hash = $request->company_db_user_hash;

            $data = array(
                'coupon_hash' => $coupon_hash,
                'coupon_name' => $coupon_name,
                'product_hash' => $product_hash,
                'company_hash' => $company_hash,
                'coupon_code' => $coupon_code,
                'coupon_amount' => $coupon_amount,
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
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            );

            DB::table('coupons')->where('c_token', $c_token)->where('c_hash', $c_hash)->where('c_sec_key', $c_sec_key)->where('product_hash', $product_hash)->where('company_hash', $company_hash)->where('company_db_user_hash', $company_db_user_hash)->insert($data);

            return response()->json(array(
                'status' => 1,
                'message' => 'Added Successfully'
            ));

        }

    }

    public function views(){

        $coupons = DB::table('coupons')->where('status', 1)->get();
        return response()->json($coupons);

    }

    public function view($id){
        $coupons = DB::table('coupons')->where('coupon_hash', $id)->where('status', 1)->get();
        return response()->json($coupons);
    }

    public function update(Request $request){

        $valid = Validator::make($request->all() , [
            'coupon_name' => 'required | unique:App\Models\API\coupons,coupon_name',
            'product_hash' => 'required',
            'company_hash' => 'required',
            'coupon_code' => 'required',
            'coupon_amount' => 'required',
            'c_token' => 'required',
            'c_hash' => 'required',
            'c_sec_key' => 'required',
            'company_db_user_hash' => 'required',
        ]);

        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else{

            $coupon_hash = $request->id;
            $coupon_name = $request->coupon_name;
            $product_hash = $request->product_hash;
            $company_hash = $request->company_hash;
            $coupon_code = $request->coupon_code;
            $coupon_amount = $request->coupon_amount;
            $coupon_description = $request->coupon_description;
            $total_stock = $request->total_stock;
            $active_date = $request->active_date;
            $expiry_date = $request->expiry_date;
            $c_token = $request->c_token;
            $c_hash = $request->c_hash;
            $c_sec_key = $request->c_sec_key;
            $company_db_user_hash = $request->company_db_user_hash;

            $data = array(
                'coupon_name' => $coupon_name,
                'product_hash' => $product_hash,
                'company_hash' => $company_hash,
                'coupon_code' => $coupon_code,
                'coupon_amount' => $coupon_amount,
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
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            );

            DB::table('coupons')->where('coupon_hash', $coupon_hash)->where('c_token', $c_token)->where('c_hash', $c_hash)->where('c_sec_key', $c_sec_key)->where('product_hash', $product_hash)->where('company_hash', $company_hash)->where('company_db_user_hash', $company_db_user_hash)->update($data);

            return response()->json(array(
                'status' => 1,
                'message' => 'Updated Successfully'
            ));

        }

    }

    public function delete(Request $request){

        $coupon_hash = $request->id;

        $data = array(
            'status' => 0,
            'updated_at' => date('Y-m-d H:i:s'),
        );

        $coupons = DB::table('coupons')->where('coupon_hash', $coupon_hash)->update($data);

        if($coupons){

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

    }

}
