<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\API\companies;

class companyDbUsersController extends Controller
{
    //

    public function create(Request $request){

        $valid = Validator::make($request->all() , [
            'company_db_user_email' => 'required | unique:App\Models\API\companyDbUsers,company_db_user_email',
            'company_db_user_name' => 'required',
            'company_db_user_password' => 'required',
            'mobile' => 'required',
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
                
                $company_db_user_hash = md5($request->company_db_user_email.now());
                $company_db_user_name = $request->company_db_user_name;
                $company_db_user_email = $request->company_db_user_email;
                $company_db_user_password = md5($request->company_db_user_password);
                $mobile = $request->mobile;
                $c_token = $request->c_token;
                $c_hash = $request->c_hash;
                $c_sec_key = $request->c_sec_key;

                $data = array(
                    'company_db_user_hash' => $company_db_user_hash,
                    'company_db_user_name' => $company_db_user_name,
                    'company_db_user_email' => $company_db_user_email,
                    'company_db_user_password' => $company_db_user_password,
                    'mobile' => $mobile,
                    'c_token' => $c_token,
                    'c_hash' => $c_hash,
                    'c_sec_key' => $c_sec_key,
                    'created_by' => $company_db_user_name,
                    'updated_by' => $company_db_user_name,
                    'created_at' => now(),
                    'updated_at' => now(),
                );

                $cdbusers = DB::table('company_db_users')->where('c_token', $c_token)->where('c_hash', $c_hash)->where('c_sec_key', $c_sec_key)->insert($data);

                if ($cdbusers) {
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
                
                $cdbusers = DB::table('company_db_users')->where('c_hash', $c_hash)->where('c_token', $c_token)->where('c_sec_key', $c_sec_key)->where('status', 1)->get();

                if ($cdbusers) {
                    return response()->json($cdbusers);
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

                $company_db_user_hash = $request->id; 
                
                $cdbusers = DB::table('company_db_users')->where('company_db_user_hash', $company_db_user_hash)->where('c_hash', $c_hash)->where('c_token', $c_token)->where('c_sec_key', $c_sec_key)->where('status', 1)->get();

                if ($cdbusers) {
                    return response()->json($cdbusers);
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
            'company_db_user_email' => 'required | unique:App\Models\API\companyDbUsers,company_db_user_email',
            'company_db_user_name' => 'required',
            'company_db_user_password' => 'required',
            'mobile' => 'required',
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
                
                $company_db_user_hash = $request->id;
                $company_db_user_name = $request->company_db_user_name;
                $company_db_user_email = $request->company_db_user_email;
                $company_db_user_password = md5($request->company_db_user_password);
                $mobile = $request->mobile;
                $c_token = $request->c_token;
                $c_hash = $request->c_hash;
                $c_sec_key = $request->c_sec_key;

                $data = array(
                    'company_db_user_name' => $company_db_user_name,
                    'company_db_user_email' => $company_db_user_email,
                    'company_db_user_password' => $company_db_user_password,
                    'mobile' => $mobile,
                    'updated_by' => $company_db_user_name,
                    'updated_at' => now(),
                );

                $cdbusers = DB::table('company_db_users')->where('company_db_user_hash', $company_db_user_hash)->where('c_token', $c_token)->where('c_hash', $c_hash)->where('c_sec_key', $c_sec_key)->update($data);

                if ($cdbusers) {
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
                
                $company_db_user_hash = $request->id;
                $c_token = $request->c_token;
                $c_hash = $request->c_hash;
                $c_sec_key = $request->c_sec_key;
                $company_db_user_name = $request->company_db_user_name;

                $data = array(
                    'status' => 0,
                    'updated_by' => $company_db_user_name,
                    'updated_at' => now()
                );
        
                $cdbusers = DB::table('company_db_users')->where('company_db_user_hash', $company_db_user_hash)->where('c_token', $c_token)->where('c_hash', $c_hash)->where('c_sec_key', $c_sec_key)->update($data);
        
                if($cdbusers){
        
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
