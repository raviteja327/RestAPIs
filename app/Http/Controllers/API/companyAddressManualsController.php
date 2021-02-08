<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class companyAddressManualsController extends Controller
{
    //

    public function create(Request $request){

        $valid = Validator::make($request->all() , [
            'pincode' => 'required | unique:App\Models\API\companyAddressManuals,pincode',
            'mobile_number' => 'required',
            'contact_person_name' => 'required',
        ]);

        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else{
            $company_address_manuals_hash = md5($request->pincode.now());
            $address1 = $request->address1;
            $address2 = $request->address2;
            $street = $request->street;
            $landmark = $request->landmark;
            $pincode = $request->pincode;
            $contact_person_name = $request->contact_person_name;
            $mobile_number = $request->mobile_number;
            $c_token = $request->c_token;
            $c_hash = $request->c_hash;
            $c_sec_key = $request->c_sec_key;
            $dist_hash = $request->dist_hash;
            $state_hash = $request->state_hash;
            $country_hash = $request->country_hash;

            $data = array(
                'company_address_manuals_hash' => $company_address_manuals_hash,
                'address1' => $address1,
                'address2' => $address2,
                'street' => $street,
                'landmark' => $landmark,
                'pincode' => $pincode,
                'contact_person_name' => $contact_person_name,
                'mobile_number' => $mobile_number,
                'c_token' => $c_token,
                'c_hash' => $c_hash,
                'c_sec_key' => $c_sec_key,
                'dist_hash' => $dist_hash,
                'state_hash' => $state_hash,
                'country_hash' => $country_hash,
                'created_by' => $contact_person_name,
                'updated_by' => $contact_person_name,
                'created_at' => now(),
                'updated_at' => now(),
            );

            $cam = DB::table('company_address_manuals')->where('c_token', $c_token)->where('c_hash', $c_hash)->where('c_sec_key', $c_sec_key)->insert($data);

            if ($cam) {
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
            
        }

    }

    public function views(){

        $cam = DB::table('company_address_manuals')->where('status', 1)->get();
        return response()->json($cam);

    }

    public function view($id){

        $cam = DB::table('company_address_manuals')->where('company_address_manuals_hash', $id)->where('status', 1)->get();
        return response()->json($cam);

    }

    public function update(Request $request){

        $valid = Validator::make($request->all() , [
            'pincode' => 'required | unique:App\Models\API\companyAddressManuals,pincode',
            'mobile_number' => 'required',
            'contact_person_name' => 'required',
        ]);

        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else{
            $company_address_manuals_hash = $request->id;
            $address1 = $request->address1;
            $address2 = $request->address2;
            $street = $request->street;
            $landmark = $request->landmark;
            $pincode = $request->pincode;
            $contact_person_name = $request->contact_person_name;
            $mobile_number = $request->mobile_number;
            $c_token = $request->c_token;
            $c_hash = $request->c_hash;
            $c_sec_key = $request->c_sec_key;
            $dist_hash = $request->dist_hash;
            $state_hash = $request->state_hash;
            $country_hash = $request->country_hash;

            $data = array(
                'address1' => $address1,
                'address2' => $address2,
                'street' => $street,
                'landmark' => $landmark,
                'pincode' => $pincode,
                'contact_person_name' => $contact_person_name,
                'mobile_number' => $mobile_number,
                'dist_hash' => $dist_hash,
                'state_hash' => $state_hash,
                'country_hash' => $country_hash,
                'updated_by' => $contact_person_name,
                'updated_at' => now(),
            );

            $cam = DB::table('company_address_manuals')->where('company_address_manuals_hash', $company_address_manuals_hash)->where('c_token', $c_token)->where('c_hash', $c_hash)->where('c_sec_key', $c_sec_key)->update($data);

            if ($cam) {
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
            

        }

    }

    public function delete(Request $request){

        $company_address_manuals_hash = $request->id;
        $contact_person_name = $request->contact_person_name;
        $c_token = $request->c_token;
        $c_hash = $request->c_hash;
        $c_sec_key = $request->c_sec_key;

        $data = array(
            'status' => 0,
            'updated_by' => $contact_person_name,
            'updated_at' => now(),
        );

        $cam = DB::table('company_address_manuals')->where('company_address_manuals_hash', $company_address_manuals_hash)->where('c_token', $c_token)->where('c_hash', $c_hash)->where('c_sec_key', $c_sec_key)->update($data);

        if($cam){

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
