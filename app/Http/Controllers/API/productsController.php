<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\API\companies;

class productsController extends Controller
{
    //

    public function create(Request $request){

        $valid = Validator::make($request->all() , [
            'product_categories_image' => 'required | unique:App\Models\API\products,product_categories_image',
            'product_categories_type_hash' => 'required',
            'company_hash' => 'required',
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
                
                $product_hash = md5($request->product_categories_image.now());
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
                    'created_at' => now(),
                    'updated_at' => now(),
                );
    
                $pro = DB::table('products')->where('c_token', $c_token)->where('c_hash', $c_hash)->where('c_sec_key', $c_sec_key)->where('product_categories_type_hash', $product_categories_type_hash)->where('company_hash', $company_hash)->where('company_db_user_hash', $company_db_user_hash)->insert($data);
    
                if ($pro) {
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
                
                $products = DB::table('products')->where('c_hash', $c_hash)->where('c_token', $c_token)->where('c_sec_key', $c_sec_key)->where('status', 1)->get();

                if ($products) {
                    return response()->json($products);
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

                $product_hash = $request->id;
                
                $products = DB::table('products')->where('product_hash', $product_hash)->where('c_hash', $c_hash)->where('c_token', $c_token)->where('c_sec_key', $c_sec_key)->where('status', 1)->get();

                if ($products) {
                    return response()->json($products);
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
            'product_categories_image' => 'required | unique:App\Models\API\products,product_categories_image',
            'product_categories_type_hash' => 'required',
            'company_hash' => 'required',
            'product_categories_image' => 'required',
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
                    'company_db_user_hash' => $company_db_user_hash,
                    'updated_by' => "NULL",
                    'updated_at' => now(),
                );
    
    
                $pro = DB::table('products')->where('product_hash', $product_hash)->where('c_token', $c_token)->where('c_hash', $c_hash)->where('c_sec_key', $c_sec_key)->update($data);
    
                if ($pro) {
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
                
                $product_hash = $request->id;

                $data = array(
                    'status' => 0,
                    'updated_by' => "NULL",
                    'updated_at' => now(),
                );
        
                $products = DB::table('products')->where('product_hash', $product_hash)->where('c_token', $c_token)->where('c_hash', $c_hash)->where('c_sec_key', $c_sec_key)->update($data);
        
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

            } else {
                
                return response()->json(array(
                    'status' => 0,
                    'message' => 'Invalid access details Saved'
                ));

            }
            
        }

    }

}


