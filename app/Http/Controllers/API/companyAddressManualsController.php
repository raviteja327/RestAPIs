<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\API\companies;

class companyAddressManualsController extends Controller
{
    //

    public function create(Request $request){

        $valid = Validator::make($request->all() , [
            'pincode' => 'required | unique:App\Models\API\companyAddressManuals,pincode',
            'mobile_number' => 'required',
            'contact_person_name' => 'required',
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
                
                $cam = DB::table('company_address_manuals')->where('c_hash', $c_hash)->where('c_token', $c_token)->where('c_sec_key', $c_sec_key)->where('status', 1)->get();

                if ($cam) {
                    return response()->json($cam);
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

                $company_address_manuals_hash = $request->id; 
                
                $cam = DB::table('company_address_manuals')->where('company_address_manuals_hash', $company_address_manuals_hash)->where('c_hash', $c_hash)->where('c_token', $c_token)->where('c_sec_key', $c_sec_key)->where('status', 1)->get();

                if ($cam) {
                    return response()->json($cam);
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
            'pincode' => 'required | unique:App\Models\API\companyAddressManuals,pincode',
            'mobile_number' => 'required',
            'contact_person_name' => 'required',
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
                
                $company_address_manuals_hash = $request->id;
                $contact_person_name = $request->contact_person_name;
        
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

            } else {
                
                return response()->json(array(
                    'status' => 0,
                    'message' => 'Invalid access details Saved'
                ));

            }
            
        }

    }

}
