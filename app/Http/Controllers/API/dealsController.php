<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\API\deals;
use App\Models\API\companies;

class dealsController extends Controller
{
    //

    public function create(Request $request){

        $valid = Validator::make($request->all() , [
            'deals_name' => 'required | unique:App\Models\API\deals,deals_name',
            'pipeline_hash' => 'required',
            'employee_hash' => 'required',
            'sales_company_hash' => 'required',
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
                
                $deal = new deals;

                $deal->deals_hash = md5($request->deals_name.now());
                $deal->deals_name = $request->deals_name;
                $deal->date = $request->date;
                $deal->notes = $request->notes;
                $deal->pipeline_hash = $request->pipeline_hash;
                $deal->employee_hash = $request->employee_hash;
                $deal->sales_company_hash = $request->sales_company_hash;
                $deal->c_token = $request->c_token;
                $deal->c_hash = $request->c_hash;
                $deal->c_sec_key = $request->c_sec_key;
                $deal->created_by = "NULL";
                $deal->updated_by = "NULL";
                $deal->created_at = now();
                $deal->updated_at = now();

                $deals = $deal->save();
    
                if ($deals) {
                    return response()->json(array(
                        'status' => 1,
                        'message' => $deal
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
                
                $deals = deals::where('c_hash', $c_hash)->where('c_token', $c_token)->where('c_sec_key', $c_sec_key)->where('status', 1)->get();

                if ($deals) {
                    return response()->json($deals);
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
                
                $deals_hash = $request->id;
                
                $deals = deals::where('deals_hash', $deals_hash)->where('c_hash', $c_hash)->where('c_token', $c_token)->where('c_sec_key', $c_sec_key)->where('status', 1)->get();

                if ($deals) {
                    return response()->json($deals);
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
            'deals_name' => 'required | unique:App\Models\API\deals,deals_name',
            'pipeline_hash' => 'required',
            'employee_hash' => 'required',
            'sales_company_hash' => 'required',
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
                
                $deals_hash = $request->id;
                
                $deals = deals::where('deals_hash', $deals_hash)->where('c_hash', $c_hash)->where('c_token', $c_token)->where('c_sec_key', $c_sec_key)
                ->update([
                    'deals_name' => $request->deals_name,
                    'date' => $request->date,
                    'notes' => $request->notes,
                    'pipeline_hash' => $request->pipeline_hash,
                    'employee_hash' => $request->employee_hash,
                    'sales_company_hash' => $request->sales_company_hash,
                    'updated_by' => "NULL",
                    'updated_at' => now(),
                ]);

                if ($deals) {
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
                
                
                $deals_hash = $request->id;

                $deals = deals::where('deals_hash', $deals_hash)->where('c_hash', $c_hash)->where('c_token', $c_token)->where('c_sec_key', $c_sec_key)
                ->update([
                    'status' => 0,
                    'updated_by' => "NULL",
                    'updated_at' => now(),
                ]);

                if($deals){
        
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
