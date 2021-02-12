<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\API\companies;

class cEmployeesController extends Controller
{
    //

    public function create(Request $request){

        $valid = Validator::make($request->all() , [
            'email' => 'required | unique:App\Models\API\cEmployees,email',
            'first_name' => 'required',
            'password' => 'required',
            'last_name' => 'required',
            'birth_date' => 'required',
            'home_phone' => 'required',
            'company_hash' => 'required',
            'c_role_hash' => 'required',
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
                
                $employee_hash = md5($request->email.now());
                $company_hash = $request->company_hash;
                $c_role_hash = $request->c_role_hash;
                $first_name = $request->first_name;
                $password = md5($request->password);
                $last_name = $request->last_name;
                $email = $request->email;
                $birth_date = $request->birth_date;
                $address = $request->address;
                $city = $request->city;
                $region = $request->region;
                $postal_code = $request->postal_code;
                $country = $request->country;
                $home_phone = $request->home_phone;
                $salary = $request->salary;
                $c_token = $request->c_token;
                $c_hash = $request->c_hash;
                $c_sec_key = $request->c_sec_key;
    
                $data = array(
                    'employee_hash' => $employee_hash,
                    'company_hash' => $company_hash,
                    'c_role_hash' => $c_role_hash,
                    'first_name' => $first_name,
                    'password' => $password,
                    'last_name' => $last_name,
                    'email' => $email,
                    'birth_date' => $birth_date,
                    'address' => $address,
                    'city' => $city,
                    'region' => $region,
                    'postal_code' => $postal_code,
                    'country' => $country,
                    'home_phone' => $home_phone,
                    'salary' => $salary,
                    'c_token' => $c_token,
                    'c_hash' => $c_hash,
                    'c_sec_key' => $c_sec_key,
                    'created_by' => $first_name,
                    'updated_by' => $first_name,
                    'created_at' => now(),
                    'updated_at' => now(),
                );
    
                $cemployees = DB::table('c_employees')->where('company_hash', $company_hash)->where('c_role_hash', $c_role_hash)->where('c_token', $c_token)->where('c_hash', $c_hash)->where('c_sec_key', $c_sec_key)->insert($data);
    
                if ($cemployees) {
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
                
                $cemployees = DB::table('c_employees')->where('c_hash', $c_hash)->where('c_token', $c_token)->where('c_sec_key', $c_sec_key)->where('status', 1)->get();

                if ($cemployees) {
                    return response()->json($cemployees);
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

                $employee_hash = $request->id;
                
                $cemployees = DB::table('c_employees')->where('employee_hash', $employee_hash)->where('c_hash', $c_hash)->where('c_token', $c_token)->where('c_sec_key', $c_sec_key)->where('status', 1)->get();

                if ($cemployees) {
                    return response()->json($cemployees);
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
            'email' => 'required | unique:App\Models\API\cEmployees,email',
            'first_name' => 'required',
            'password' => 'required',
            'last_name' => 'required',
            'birth_date' => 'required',
            'home_phone' => 'required',
            'company_hash' => 'required',
            'c_role_hash' => 'required',
            'c_hash' => 'required',
            'c_token' => 'required',
            'c_sec_key' => 'required',
        ]);

        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }else{

            $c_hash = $request->c_hash;
            $c_token = $request->c_token;
            $c_sec_key = $request->c_sec_key;

            $status = companies::where('c_hash', $c_hash)->where('c_token', $c_token)->where('c_sec_key', $c_sec_key)->where('status', 1)->get();

            if ($status) {
                
                $employee_hash = $request->id;
                $company_hash = $request->company_hash;
                $c_role_hash = $request->c_role_hash;
                $first_name = $request->first_name;
                $password = md5($request->password);
                $last_name = $request->last_name;
                $email = $request->email;
                $birth_date = $request->birth_date;
                $address = $request->address;
                $city = $request->city;
                $region = $request->region;
                $postal_code = $request->postal_code;
                $country = $request->country;
                $home_phone = $request->home_phone;
                $salary = $request->salary;
                $c_token = $request->c_token;
                $c_hash = $request->c_hash;
                $c_sec_key = $request->c_sec_key;
    
                $data = array(
                    'company_hash' => $company_hash,
                    'c_role_hash' => $c_role_hash,
                    'first_name' => $first_name,
                    'password' => $password,
                    'last_name' => $last_name,
                    'email' => $email,
                    'birth_date' => $birth_date,
                    'address' => $address,
                    'city' => $city,
                    'region' => $region,
                    'postal_code' => $postal_code,
                    'country' => $country,
                    'home_phone' => $home_phone,
                    'salary' => $salary,
                    'updated_by' => $first_name,
                    'updated_at' => now(),
                );
    
                $cemployees = DB::table('c_employees')->where('employee_hash', $employee_hash)->where('c_token', $c_token)->where('c_hash', $c_hash)->where('c_sec_key', $c_sec_key)->update($data);
    
                if ($cemployees) {
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
                
                $employee_hash = $request->id;
                $company_hash = $request->company_hash;
                $c_role_hash = $request->c_role_hash;
                $first_name = $request->first_name;
        
                $data = array(
                    'status' => 0,
                    'updated_by' => $first_name,
                    'updated_at' => now(),
                );
        
                $cemployees = DB::table('c_employees')->where('employee_hash', $employee_hash)->where('company_hash', $company_hash)->where('c_role_hash', $c_role_hash)->where('c_token', $c_token)->where('c_hash', $c_hash)->where('c_sec_key', $c_sec_key)->update($data);
        
                if($cemployees){
        
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
