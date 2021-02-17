<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\API\cProducts;
use App\Models\API\companies;

class cProductsController extends Controller
{
    //

    public function create(Request $request){

        $valid = Validator::make($request->all() , [
            'product_name' => 'required | unique:App\Models\API\cProducts,product_name',
            'c_hash' => 'required',
            'c_token' => 'required',
            'product_type_hash' => 'required',
            'product_categories_hash' => 'required',
            'employee_hash' => 'required',
            'order_type_hash' => 'required',
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

            $status = companies::where('c_hash', $c_hash)->where('c_token', $c_token)->where('status', 1)->get();

            if ($status) {
                
                $cpro = new cProducts;

                $cpro->product_hash = md5($request->product_name.now());
                $cpro->product_name = $request->product_name;
                $cpro->product_img_type = $request->product_img_type;
                $cpro->product_description = $request->product_description;
                $cpro->product_short_description = $request->product_short_description;
                $cpro->product_type_hash = $request->product_type_hash;
                $cpro->product_categories_hash = $request->product_categories_hash;
                $cpro->product_featured_img_url = $request->product_featured_img_url;
                $cpro->product_tags = $request->product_tags;
                $cpro->meta_tags = $request->meta_tags;
                $cpro->employee_hash = $request->employee_hash;
                $cpro->order_type_hash = $request->order_type_hash;
                $cpro->c_hash = $request->c_hash;
                $cpro->c_token = $request->c_token;
                $cpro->created_by = "NULL";
                $cpro->updated_by = "NULL";
                $cpro->created_at = now();
                $cpro->updated_at = now();

                $pro = $cpro->save();
    
                if ($pro) {
                    return response()->json(array(
                        'status' => 1,
                        'message' => $cpro
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

            $status = companies::where('c_hash', $c_hash)->where('c_token', $c_token)->where('status', 1)->get();

            if ($status) {
                
                $pro = cProducts::where('c_hash', $c_hash)->where('c_token', $c_token)->where('status', 1)->get();

                if ($pro) {
                    return response()->json($pro);
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

            $status = companies::where('c_hash', $c_hash)->where('c_token', $c_token)->where('status', 1)->get();

            if ($status) {
                
                $product_hash = $request->id;
                
                $pro = cProducts::where('product_hash', $product_hash)->where('c_hash', $c_hash)->where('c_token', $c_token)->where('status', 1)->get();

                if ($pro) {
                    return response()->json($pro);
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
            'product_name' => 'required | unique:App\Models\API\cProducts,product_name',
            'c_hash' => 'required',
            'c_token' => 'required',
            'product_type_hash' => 'required',
            'product_categories_hash' => 'required',
            'employee_hash' => 'required',
            'order_type_hash' => 'required',
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

            $status = companies::where('c_hash', $c_hash)->where('c_token', $c_token)->where('status', 1)->get();

            if ($status) {
                
                $product_hash = $request->id;

                $act = cProducts::where('product_hash', $product_hash)->where('c_hash', $c_hash)->where('c_token', $c_token)
                ->update([
                    'product_name' => $request->product_name,
                    'product_img_type' => $request->product_img_type,
                    'product_description' => $request->product_description,
                    'product_short_description' => $request->product_short_description,
                    'product_type_hash' => $request->product_type_hash,
                    'product_categories_hash' => $request->product_categories_hash,
                    'product_featured_img_url' => $request->product_featured_img_url,
                    'product_tags' => $request->product_tags,
                    'meta_tags' => $request->meta_tags,
                    'employee_hash' => $request->employee_hash,
                    'order_type_hash' => $request->order_type_hash,
                    'updated_by' => "NULL",
                    'updated_at' => now(),
                ]);
    
                if ($act) {
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

            $status = companies::where('c_hash', $c_hash)->where('c_token', $c_token)->where('status', 1)->get();

            if ($status) {
                
                $product_hash = $request->id;
                
                $pro = cProducts::where('product_hash', $product_hash)->where('c_hash', $c_hash)->where('c_token', $c_token)
                ->update([
                    'status' => 0,
                    'updated_by' => "NULL",
                    'updated_at' => now(),
                ]);
        
                if($pro){
        
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
