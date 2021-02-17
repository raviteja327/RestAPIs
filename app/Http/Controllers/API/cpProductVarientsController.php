<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\API\cpProductVarients;
use App\Models\API\companies;

class cpProductVarientsController extends Controller
{
    //

    public function create(Request $request){

        $valid = Validator::make($request->all() , [
            'product_varient_name' => 'required | unique:App\Models\API\cpProductVarients,product_varient_name',
            'product_hash' => 'required',
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
                
                $provar = new cpProductVarients;

                $provar->product_varient_hash = md5($request->product_varient_name.now());
                $provar->product_varient_name = $request->product_varient_name;
                $provar->product_hash = $request->product_hash;
                $provar->employee_hash = $request->employee_hash;
                $provar->c_hash = $request->c_hash;
                $provar->c_token = $request->c_token;
                $provar->created_by = "NULL";
                $provar->updated_by = "NULL";
                $provar->created_at = now();
                $provar->updated_at = now();

                $pro = $provar->save();
    
                if ($pro) {
                    return response()->json(array(
                        'status' => 1,
                        'message' => $provar
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
                
                $pro = cpProductVarients::where('c_hash', $c_hash)->where('c_token', $c_token)->where('status', 1)->get();

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
                
                $product_varient_hash = $request->id;
                
                $pro = cpProductVarients::where('product_varient_hash', $product_varient_hash)->where('c_hash', $c_hash)->where('c_token', $c_token)->where('status', 1)->get();

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
            'product_varient_name' => 'required | unique:App\Models\API\cpProductVarients,product_varient_name',
            'product_hash' => 'required',
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
                
                $product_varient_hash = $request->id;

                $pro = cpProductVarients::where('product_varient_hash', $product_varient_hash)->where('c_hash', $c_hash)->where('c_token', $c_token)
                ->update([
                    'product_varient_name' => $request->product_varient_name,
                    'product_hash' => $request->product_hash,
                    'employee_hash' => $request->employee_hash,
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

                $product_varient_hash = $request->id;
                
                $pro = cpProductVarients::where('product_varient_hash', $product_varient_hash)->where('c_hash', $c_hash)->where('c_token', $c_token)
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
