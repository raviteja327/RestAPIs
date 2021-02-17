<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class cProductStockDetailsController extends Controller
{
    //

    public function create(Request $request){

        $valid = Validator::make($request->all() , [
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
                
                $prodetails = new cProductStockDetails;

                $prodetails->product_hash = $request->product_hash;
                $prodetails->product_stock_nos = $request->product_stock_nos;
                $prodetails->product_sku_start_no = $request->product_sku_start_no;
                $prodetails->product_sku_end_no = $request->product_sku_end_no;
                $prodetails->employee_hash = $request->employee_hash;
                $prodetails->c_hash = $request->c_hash;
                $prodetails->c_token = $request->c_token;
                $prodetails->created_by = "NULL";
                $prodetails->updated_by = "NULL";
                $prodetails->created_at = now();
                $prodetails->updated_at = now();

                $pro = $prodetails->save();
    
                if ($pro) {
                    return response()->json(array(
                        'status' => 1,
                        'message' => $prodetails
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
                
                $pro = cProductStockDetails::where('c_hash', $c_hash)->where('c_token', $c_token)->where('status', 1)->get();

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
                
                $pro = cProductStockDetails::where('product_hash', $product_hash)->where('c_hash', $c_hash)->where('c_token', $c_token)->where('status', 1)->get();

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
                
                $product_hash = $request->id;

                $act = cProductStockDetails::where('product_hash', $product_hash)->where('c_hash', $c_hash)->where('c_token', $c_token)
                ->update([
                    'product_hash' => $request->product_hash,
                    'product_stock_nos' => $request->product_stock_nos,
                    'product_sku_start_no' => $request->product_sku_start_no,
                    'product_sku_end_no' => $request->product_sku_end_no,
                    'employee_hash' => $request->employee_hash,
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
                
                $pro = cProductStockDetails::where('product_hash', $product_hash)->where('c_hash', $c_hash)->where('c_token', $c_token)
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
