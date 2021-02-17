<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\API\cpProductGeneralDetails;
use App\Models\API\companies;

class cpProductGeneralDetailsController extends Controller
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
                
                $progen = new cpProductGeneralDetails;

                $progen->product_hash = $request->product_hash;
                $progen->regular_price = $request->regular_price;
                $progen->selling_price = $request->selling_price;
                $progen->product_sku = $request->product_sku;
                $progen->scheduled_from_date = $request->scheduled_from_date;
                $progen->scheduled_to_date = $request->scheduled_to_date;
                $progen->employee_hash = $request->employee_hash;
                $progen->c_hash = $request->c_hash;
                $progen->c_token = $request->c_token;
                $progen->created_by = "NULL";
                $progen->updated_by = "NULL";
                $progen->created_at = now();
                $progen->updated_at = now();

                $pro = $progen->save();
    
                if ($pro) {
                    return response()->json(array(
                        'status' => 1,
                        'message' => $progen
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
                
                $pro = cpProductGeneralDetails::where('c_hash', $c_hash)->where('c_token', $c_token)->where('status', 1)->get();

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
                
                $pro = cpProductGeneralDetails::where('product_hash', $product_hash)->where('c_hash', $c_hash)->where('c_token', $c_token)->where('status', 1)->get();

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

                $act = cpProductGeneralDetails::where('product_hash', $product_hash)->where('c_hash', $c_hash)->where('c_token', $c_token)
                ->update([
                    'product_hash' => $request->product_hash,
                    'regular_price' => $request->regular_price,
                    'selling_price' => $request->selling_price,
                    'product_sku' => $request->product_sku,
                    'scheduled_from_date' => $request->scheduled_from_date,
                    'scheduled_to_date' => $request->scheduled_to_date,
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
                
                $pro = cpProductGeneralDetails::where('product_hash', $product_hash)->where('c_hash', $c_hash)->where('c_token', $c_token)
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
