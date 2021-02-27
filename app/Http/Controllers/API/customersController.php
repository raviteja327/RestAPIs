<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\API\companies;

class customersController extends Controller
{
    //

    public function create(Request $request){

        $valid = Validator::make($request->all() , [
            'email' => 'required | unique:App\Models\API\customers,email',
            'first_name' => 'required',
            'last_name' => 'required',
            'home_phone' => 'required',
            'contact_number' => 'required',
            'c_token' => 'required',
        ]);

        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else{

            $c_token = $request->c_token;

            $status = companies::where('c_token', $c_token)->where('status', 1)->get();

            if ($status) {

                $customer_hash = md5($request->email.now());
                $first_name = $request->first_name;
                $last_name = $request->last_name;
                $email = $request->email;
                $home_phone = $request->home_phone;
                $contact_number = $request->contact_number;
                $door_no = $request->door_no;
                $region = $request->region;
                $city = $request->city;
                $postal_code = $request->postal_code;
                $country = $request->country;
                $c_token = $request->c_token;

                $data = array(
                    'customer_hash' => $customer_hash,
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'email' => $email,
                    'home_phone' => $home_phone,
                    'contact_number' => $contact_number,
                    'door_no' => $door_no,
                    'region' => $region,
                    'city' => $city,
                    'postal_code' => $postal_code,
                    'country' => $country,
                    'c_token' => $c_token,
                    'created_by' => "NULL",
                    'updated_by' => "NULL",
                    'created_at' => now(),
                    'updated_at' => now(),
                );

                $customers = DB::table('customers')->where('c_token', $c_token)->insert($data);

                if ($customers) {
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
            'c_token' => 'required',
        ]);
 
        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else {
            
            $c_token = $request->c_token;

            $status = companies::where('c_token', $c_token)->where('status', 1)->get();

            if ($status) {
                
                $customers = DB::table('customers')->where('c_token', $c_token)->where('status', 1)->get();

                if ($customers) {
                    return response()->json($customers);
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
            'c_token' => 'required',
        ]);
 
        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else {
            
            $c_token = $request->c_token;

            $status = companies::where('c_token', $c_token)->where('status', 1)->get();

            if ($status) {
                
                $customer_hash = $request->id;

                $customers = DB::table('customers')->where('customer_hash', $customer_hash)->where('c_token', $c_token)->where('status', 1)->get();

                if ($customers) {
                    return response()->json($customers);
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
            'email' => 'required | unique:App\Models\API\customers,email',
            'first_name' => 'required',
            'last_name' => 'required',
            'home_phone' => 'required',
            'contact_number' => 'required',
            'c_token' => 'required',
        ]);

        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else{

            $c_token = $request->c_token;

            $status = companies::where('c_token', $c_token)->where('status', 1)->get();

            if ($status) {
                
                $customer_hash = $request->id;
                $first_name = $request->first_name;
                $last_name = $request->last_name;
                $email = $request->email;
                $home_phone = $request->home_phone;
                $contact_number = $request->contact_number;
                $door_no = $request->door_no;
                $region = $request->region;
                $city = $request->city;
                $postal_code = $request->postal_code;
                $country = $request->country;
                $c_token = $request->c_token;

                $data = array(
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'email' => $email,
                    'home_phone' => $home_phone,
                    'contact_number' => $contact_number,
                    'door_no' => $door_no,
                    'region' => $region,
                    'city' => $city,
                    'postal_code' => $postal_code,
                    'country' => $country,
                    'updated_by' => "NULL",
                    'updated_at' => now(),
                );

                $customers = DB::table('customers')->where('customer_hash', $customer_hash)->where('c_token', $c_token)->update($data);

                if ($customers) {
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
            'c_token' => 'required',
        ]);
 
        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else {
            
            $c_token = $request->c_token;

            $status = companies::where('c_token', $c_token)->where('status', 1)->get();

            if ($status) {
                
                $customer_hash = $request->id;
                $c_token = $request->c_token;

                $data = array(
                    'status' => 0,
                    'updated_by' => "NULL",
                    'updated_at' => now(),
                );

                $customers = DB::table('customers')->where('customer_hash', $customer_hash)->where('c_token', $c_token)->update($data);

                if($customers){

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
