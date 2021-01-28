<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class productCategoriesController extends Controller
{
    //

    public function create(Request $request){

        $valid = Validator::make($request->all() , [
            'product_categories_name' => 'required | unique:App\Models\API\productCategories,product_categories_name',
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

            $product_categories_type_hash = md5($request->product_categories_name);
            $product_categories_name = $request->product_categories_name;
            $product_categories_image = $request->product_categories_image;
            $c_token = $request->c_token;
            $c_hash = $request->c_hash;
            $c_sec_key = $request->c_sec_key;
            $company_db_user_hash = $request->company_db_user_hash;

            $data = array(
                'product_categories_type_hash' => $product_categories_type_hash,
                'product_categories_name' => $product_categories_name,
                'product_categories_image' => $product_categories_image,
                'c_token' => $c_token,
                'c_hash' => $c_hash,
                'c_sec_key' => $c_sec_key,
                'company_db_user_hash' => $company_db_user_hash,
                'created_by' => "NULL",
                'updated_by' => "NULL",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            );

            DB::table('product_categories')->where('c_token', $c_token)->where('c_hash', $c_hash)->where('c_sec_key', $c_sec_key)->where('company_db_user_hash', $company_db_user_hash)->insert($data);

            return response()->json(array(
                'status' => 1,
                'message' => 'Added Successfully'
            ));

        }
    }

    public function views(){

        $procat = DB::table('product_categories')->where('status', 1)->get();
        return response()->json($procat);

    }

    public function view($id){

        $procat = DB::table('product_categories')->where('product_categories_type_hash', $id)->where('status', 1)->get();
        return response()->json($procat);

    }

    public function update(Request $request){

        $valid = Validator::make($request->all() , [
            'product_categories_name' => 'required | unique:App\Models\API\productCategories,product_categories_name',
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

            $product_categories_type_hash = $request->id;
            $product_categories_name = $request->product_categories_name;
            $product_categories_image = $request->product_categories_image;
            $c_token = $request->c_token;
            $c_hash = $request->c_hash;
            $c_sec_key = $request->c_sec_key;
            $company_db_user_hash = $request->company_db_user_hash;

            $data = array(
                'product_categories_name' => $product_categories_name,
                'product_categories_image' => $product_categories_image,
                'c_token' => $c_token,
                'c_hash' => $c_hash,
                'c_sec_key' => $c_sec_key,
                'company_db_user_hash' => $company_db_user_hash,
                'created_by' => "NULL",
                'updated_by' => "NULL",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            );

            DB::table('product_categories')->where('product_categories_type_hash', $product_categories_type_hash)->where('c_token', $c_token)->where('c_hash', $c_hash)->where('c_sec_key', $c_sec_key)->where('company_db_user_hash', $company_db_user_hash)->update($data);

            return response()->json(array(
                'status' => 1,
                'message' => 'Updated Successfully'
            ));

        }

    }

    public function delete(Request $request){

        $product_categories_type_hash = $request->id;

        $data = array(
            'status' => 0,
            'updated_at' => date('Y-m-d H:i:s'),
        );

        $procat = DB::table('product_categories')->where('product_categories_type_hash', $product_categories_type_hash)->update($data);

        if($procat){

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
