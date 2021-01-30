<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class companyAddressAutomationsController extends Controller
{
    //

    public function create(Request $request){

        $valid = Validator::make($request->all() , [
            'contact_person_name' => 'required | unique:App\Models\API\companyAddressAutomations,contact_person_name',
            'mobile_number' => 'required',
            'c_token' => 'required',
            'c_hash' => 'required',
            'c_sec_key' => 'required',
        ]);

        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else{
            $caa_hash = md5($request->contact_person_name);
            $latitude = $request->latitude;
            $logitude = $request->logitude;
            $contact_person_name = $request->contact_person_name;
            $mobile_number = $request->mobile_number;
            $c_token = $request->c_token;
            $c_hash = $request->c_hash;
            $c_sec_key = $request->c_sec_key;

            $data = array(
                'caa_hash' => $caa_hash,
                'latitude' => $latitude,
                'logitude' => $logitude,
                'contact_person_name' => $contact_person_name,
                'mobile_number' => $mobile_number,
                'c_token' => $c_token,
                'c_hash' => $c_hash,
                'c_sec_key' => $c_sec_key,
                'created_by' => $contact_person_name,
                'updated_by' => $contact_person_name,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            );

            DB::table('company_address_automations')->where('c_token', $c_token)->where('c_hash', $c_hash)->where('c_sec_key', $c_sec_key)->insert($data);

            return response()->json(array(
                'status' => 1,
                'message' => 'Added Successfully'
            ));

        }

    }

    public function views(){

        $caa = DB::table('company_address_automations')->where('status', 1)->get();
        return response()->json($caa);

    }

    public function view($id){

        $caa = DB::table('company_address_automations')->where('caa_hash', $id)->where('status', 1)->get();
        return response()->json($caa);

    }

    public function update(Request $request){

        $valid = Validator::make($request->all() , [
            'contact_person_name' => 'required | unique:App\Models\API\companyAddressAutomations,contact_person_name',
            'mobile_number' => 'required',
            'c_token' => 'required',
            'c_hash' => 'required',
            'c_sec_key' => 'required',
        ]);

        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else{
            $caa_hash = $request->id;
            $latitude = $request->latitude;
            $logitude = $request->logitude;
            $contact_person_name = $request->contact_person_name;
            $mobile_number = $request->mobile_number;
            $c_token = $request->c_token;
            $c_hash = $request->c_hash;
            $c_sec_key = $request->c_sec_key;

            $data = array(
                'latitude' => $latitude,
                'logitude' => $logitude,
                'contact_person_name' => $contact_person_name,
                'mobile_number' => $mobile_number,
                'c_token' => $c_token,
                'c_hash' => $c_hash,
                'c_sec_key' => $c_sec_key,
                'updated_by' => $contact_person_name,
                'updated_at' => date('Y-m-d H:i:s'),
            );

            DB::table('company_address_automations')->where('caa_hash', $caa_hash)->where('c_token', $c_token)->where('c_hash', $c_hash)->where('c_sec_key', $c_sec_key)->update($data);

            return response()->json(array(
                'status' => 1,
                'message' => 'Updated Successfully'
            ));

        }

    }

    public function delete(Request $request){

        $caa_hash = $request->id;

        $data = array(
            'status' => 0,
            'updated_at' => date('Y-m-d H:i:s'),
        );

        $caa = DB::table('company_address_automations')->where('caa_hash', $caa_hash)->update($data);

        if($caa){

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
