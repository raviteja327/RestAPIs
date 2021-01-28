<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class productsController extends Controller
{
    //

    public function create(Request $request){

        $valid = Validator::make($request->all() , [
            'product_categories_image' => 'required | unique:App\Models\API\products,product_categories_image',
            'product_categories_type_hash' => 'required',
            'company_hash' => 'required',
            'product_categories_image' => 'required',
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

            $product_hash = md5($request->product_categories_image);
            $product_categories_image = $request->product_categories_image;
            $product_categories_type_hash = $request->product_categories_type_hash;
            $company_hash = $request->company_hash;
            $tags = $request->tags;
            $attributes = $request->get('attributes');
            $unit_price = $request->unit_price;
            $total_stock = $request->total_stock;
            $units_in_stock = $request->units_in_stock;
            $units_in_order = $request->units_in_order;
            $c_token = $request->c_token;
            $c_hash = $request->c_hash;
            $c_sec_key = $request->c_sec_key;
            $company_db_user_hash = $request->company_db_user_hash;

            $data = array(
                'product_hash' => $product_hash,
                'product_categories_image' => $product_categories_image,
                'product_categories_type_hash' => $product_categories_type_hash,
                'company_hash' => $company_hash,
                'tags' => $tags,
                'attributes' => $attributes,
                'unit_price' => $unit_price,
                'total_stock' => $total_stock,
                'units_in_stock' => $units_in_stock,
                'units_in_order' => $units_in_order,
                'c_token' => $c_token,
                'c_hash' => $c_hash,
                'c_sec_key' => $c_sec_key,
                'company_db_user_hash' => $company_db_user_hash,
                'created_by' => "NULL",
                'updated_by' => "NULL",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            );


            DB::table('products')->where('c_token', $c_token)->where('c_hash', $c_hash)->where('c_sec_key', $c_sec_key)->where('product_categories_type_hash', $product_categories_type_hash)->where('company_hash', $company_hash)->where('company_db_user_hash', $company_db_user_hash)->insert($data);

            return response()->json(array(
                'status' => 1,
                'message' => 'Added Successfully'
            ));

        }

    }

    public function views(){

        $products = DB::table('products')->where('status', 1)->get();
        return response()->json($products);

    }

    public function view($id){
        $products = DB::table('products')->where('product_hash', $id)->where('status', 1)->get();
        return response()->json($products);
    }

    public function update(Request $request){

        $valid = Validator::make($request->all() , [
            'product_categories_image' => 'required | unique:App\Models\API\products,product_categories_image',
            'product_categories_type_hash' => 'required',
            'company_hash' => 'required',
            'product_categories_image' => 'required',
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

            $product_hash = $request->id;
            $product_categories_image = $request->product_categories_image;
            $product_categories_type_hash = $request->product_categories_type_hash;
            $company_hash = $request->company_hash;
            $tags = $request->tags;
            $attributes = $request->get('attributes');
            $unit_price = $request->unit_price;
            $total_stock = $request->total_stock;
            $units_in_stock = $request->units_in_stock;
            $units_in_order = $request->units_in_order;
            $c_token = $request->c_token;
            $c_hash = $request->c_hash;
            $c_sec_key = $request->c_sec_key;
            $company_db_user_hash = $request->company_db_user_hash;

            $data = array(
                'product_categories_image' => $product_categories_image,
                'product_categories_type_hash' => $product_categories_type_hash,
                'company_hash' => $company_hash,
                'tags' => $tags,
                'attributes' => $attributes,
                'unit_price' => $unit_price,
                'total_stock' => $total_stock,
                'units_in_stock' => $units_in_stock,
                'units_in_order' => $units_in_order,
                'c_token' => $c_token,
                'c_hash' => $c_hash,
                'c_sec_key' => $c_sec_key,
                'company_db_user_hash' => $company_db_user_hash,
                'created_by' => "NULL",
                'updated_by' => "NULL",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            );


            DB::table('products')->where('product_hash', $product_hash)->where('c_token', $c_token)->where('c_hash', $c_hash)->where('c_sec_key', $c_sec_key)->where('product_categories_type_hash', $product_categories_type_hash)->where('company_hash', $company_hash)->where('company_db_user_hash', $company_db_user_hash)->update($data);

            return response()->json(array(
                'status' => 1,
                'message' => 'Updated Successfully'
            ));

        }

    }

    public function delete(Request $request){

        $product_hash = $request->id;

        $data = array(
            'status' => 0,
            'updated_at' => date('Y-m-d H:i:s'),
        );

        $products = DB::table('products')->where('product_hash', $product_hash)->update($data);

        if($products){

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


