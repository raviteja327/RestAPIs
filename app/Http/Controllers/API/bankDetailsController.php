<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\API\bankDetails;
use App\Models\API\companies;

class bankDetailsController extends Controller
{
    //

    public function create(Request $request){

        $valid = Validator::make($request->all() , [
            'account_number' => 'required | unique:App\Models\API\bankDetails,account_number',
            'account_holder_name' => 'required',
            'bank_name' => 'required',
            'branch_name' => 'required',
            'ifsc_code' => 'required',
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
                
                $bank = new bankDetails;

                $bank->account_hash = md5($request->account_number.now());
                $bank->account_number = $request->account_number;
                $bank->account_holder_name = $request->account_holder_name;
                $bank->bank_name = $request->bank_name;
                $bank->branch_name = $request->branch_name;
                $bank->sort_code = $request->sort_code;
                $bank->routing_number = $request->routing_number;
                $bank->swift_bic_code = $request->swift_bic_code;
                $bank->ifsc_code = $request->ifsc_code;
                $bank->routing_code = $request->routing_code;
                $bank->c_token = $request->c_token;
                $bank->c_hash = $request->c_hash;
                $bank->c_sec_key = $request->c_sec_key;
                $bank->created_by = "NULL";
                $bank->updated_by = "NULL";
                $bank->created_at = now();
                $bank->updated_at = now();

                $bd = $bank->save();

                if ($bd) {
                    return response()->json(array(
                        'status' => 1,
                        'message' => $bank
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
        else{

            $c_hash = $request->c_hash;
            $c_token = $request->c_token;
            $c_sec_key = $request->c_sec_key;

            $status = companies::where('c_hash', $c_hash)->where('c_token', $c_token)->where('c_sec_key', $c_sec_key)->where('status', 1)->get();

            if ($status) {
                $bank = bankDetails::where('status', 1)->get();

                if ($bank) {
                    return response()->json($bank);
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
        else{

            $c_hash = $request->c_hash;
            $c_token = $request->c_token;
            $c_sec_key = $request->c_sec_key;

            $status = companies::where('c_hash', $c_hash)->where('c_token', $c_token)->where('c_sec_key', $c_sec_key)->where('status', 1)->get();

            if ($status) {
                $account_hash = $request->account_hash;
                $bank = bankDetails::where('account_hash', $account_hash)->get();
                if ($bank) {
                    return response()->json($bank);
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
            'account_number' => 'required | unique:App\Models\API\bankDetails,account_number',
            'account_holder_name' => 'required',
            'bank_name' => 'required',
            'branch_name' => 'required',
            'ifsc_code' => 'required',
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

                $account_hash = $request->account_hash;

                $bank = bankDetails::where('account_hash', $account_hash)->where('c_hash', $c_hash)->where('c_token', $c_token)->where('c_sec_key', $c_sec_key)
                ->update([
                    'account_holder_name' => $request->account_holder_name,
                    'account_number' => $request->account_number,
                    'bank_name' => $request->bank_name,
                    'branch_name' => $request->branch_name,
                    'sort_code' => $request->sort_code,
                    'routing_number' => $request->routing_number,
                    'swift_bic_code' => $request->swift_bic_code,
                    'ifsc_code' => $request->ifsc_code,
                    'routing_code' => $request->routing_code,
                    'updated_by' => "NULL",
                    'updated_at' => now(),
                ]);

                if ($bank) {
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
        else{

            $c_hash = $request->c_hash;
            $c_token = $request->c_token;
            $c_sec_key = $request->c_sec_key;

            $status = companies::where('c_hash', $c_hash)->where('c_token', $c_token)->where('c_sec_key', $c_sec_key)->where('status', 1)->get();

            if ($status) {

                $account_hash = $request->account_hash;

                $bank = bankDetails::where('account_hash', $account_hash)->where('c_hash', $c_hash)->where('c_token', $c_token)->where('c_sec_key', $c_sec_key)
                ->update([
                    'status' => 0,
                    'updated_by' => "NULL",
                    'updated_at' => now(),
                ]);

                if($bank){

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
