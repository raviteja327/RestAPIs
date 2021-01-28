<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

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

            $customer_hash = md5($request->email);
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
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            );

            DB::table('customers')->where('c_token', $c_token)->insert($data);

            return response()->json(array(
                'status' => 1,
                'message' => 'Added Successfully'
            ));

        }

    }

    public function views(){

        $customers = DB::table('customers')->where('status', 1)->get();
        return response()->json($customers);

    }

    public function view($id){
        $customers = DB::table('customers')->where('customer_hash', $id)->where('status', 1)->get();
        return response()->json($customers);
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
                'c_token' => $c_token,
                'created_by' => "NULL",
                'updated_by' => "NULL",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            );

            DB::table('customers')->where('customer_hash', $customer_hash)->where('c_token', $c_token)->update($data);

            return response()->json(array(
                'status' => 1,
                'message' => 'Updated Successfully'
            ));

        }

    }

    public function delete(Request $request){

        $customer_hash = $request->id;

        $data = array(
            'status' => 0,
            'updated_at' => date('Y-m-d H:i:s'),
        );

        $customers = DB::table('customers')->where('customer_hash', $customer_hash)->update($data);

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

    }

}
