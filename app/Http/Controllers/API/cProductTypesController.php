<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\API\cProductTypes;
use App\Models\API\companies;

class cProductTypesController extends Controller
{
    //

    public function create(Request $request){

        $valid = Validator::make($request->all() , [
            'product_type_name' => 'required | unique:App\Models\API\cProductTypes,product_type_name',
            'c_hash' => 'required',
            'c_token' => 'required',
            'employee_hash' => 'required',
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
                
                $protype = new cProductTypes;

                $protype->product_type_hash = md5($request->product_type_name.now());
                $protype->employee_hash = $request->employee_hash;
                $protype->product_type_name = $request->product_type_name;
                $protype->product_type_description = $request->product_type_description;
                $protype->physical_product = $request->physical_product;
                $protype->virtual_product = $request->virtual_product;
                $protype->downloadable_product = $request->downloadable_product;
                $protype->c_hash = $request->c_hash;
                $protype->c_token = $request->c_token;
                $protype->created_by = "NULL";
                $protype->updated_by = "NULL";
                $protype->created_at = now();
                $protype->updated_at = now();

                $pro = $protype->save();
    
                if ($pro) {
                    return response()->json(array(
                        'status' => 1,
                        'message' => $protype
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

                $pro = cProductTypes::where('c_hash', $c_hash)->where('c_token', $c_token)->where('status', 1)->get();

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
                
                $product_type_hash = $request->id;
                
                $pro = cProductTypes::where('product_type_hash', $product_type_hash)->where('c_hash', $c_hash)->where('c_token', $c_token)->where('status', 1)->get();

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
            'product_type_name' => 'required | unique:App\Models\API\cProductTypes,product_type_name',
            'c_hash' => 'required',
            'c_token' => 'required',
            'employee_hash' => 'required',
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
                
                $product_type_hash = $request->id;

                $pro = cProductTypes::where('product_type_hash', $product_type_hash)->where('c_hash', $c_hash)->where('c_token', $c_token)
                ->update([
                    'product_type_name' => $request->product_type_name,
                    'employee_hash' => $request->employee_hash,
                    'product_type_description' => $request->product_type_description,
                    'physical_product' => $request->physical_product,
                    'virtual_product' => $request->virtual_product,
                    'downloadable_product' => $request->downloadable_product,
                    'updated_by' => "NULL",
                    'updated_at' => now(),
                ]);
    
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
                
                $product_type_hash = $request->id;
                
                $pro = cProductTypes::where('product_type_hash', $product_type_hash)->where('c_hash', $c_hash)->where('c_token', $c_token)
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
