<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class cContactUsersController extends Controller
{
    //

    public function create(Request $request){

        $valid = Validator::make($request->all() , [
            'email' => 'required | unique:App\Models\API\cContactUsers,email',
            'name' => 'required',
            'organization' => 'required',
            'phone_number' => 'required',
        ]);

        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else{

            $contact_hash = md5($request->email.now());
            $name = $request->name;
            $email = $request->email;
            $organization = $request->organization;
            $phone_number = $request->phone_number;
            $select_region = $request->select_region;
            $social_websites = $request->social_websites;
            $c_token = $request->c_token;
            $c_hash = $request->c_hash;
            $c_sec_key = $request->c_sec_key;

            $data = array(
                'contact_hash' => $contact_hash,
                'name' => $name,
                'email' => $email,
                'organization' => $organization,
                'phone_number' => $phone_number,
                'select_region' => $select_region,
                'social_websites' => $social_websites,
                'c_token' => $c_token,
                'c_hash' => $c_hash,
                'c_sec_key' => $c_sec_key,
                'created_by' => $name,
                'updated_by' => $name,
                'created_at' => now(),
                'updated_at' => now(),
            );

            $ccusers = DB::table('c_contact_users')->where('c_token', $c_token)->where('c_hash', $c_hash)->where('c_sec_key', $c_sec_key)->insert($data);

            if ($ccusers) {
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

        $ccusers = DB::table('c_contact_users')->where('status', 1)->get();
        return response()->json($ccusers);

    }

    public function view($id){

        $ccusers = DB::table('c_contact_users')->where('contact_hash', $id)->where('status', 1)->get();
        return response()->json($ccusers);

    }

    public function update(Request $request){

        $valid = Validator::make($request->all() , [
            'email' => 'required | unique:App\Models\API\cContactUsers,email',
            'name' => 'required',
            'organization' => 'required',
            'phone_number' => 'required',
        ]);

        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else{

            $contact_hash = $request->id;
            $name = $request->name;
            $email = $request->email;
            $organization = $request->organization;
            $phone_number = $request->phone_number;
            $select_region = $request->select_region;
            $social_websites = $request->social_websites;
            $c_token = $request->c_token;
            $c_hash = $request->c_hash;
            $c_sec_key = $request->c_sec_key;

            $data = array(
                'name' => $name,
                'email' => $email,
                'organization' => $organization,
                'phone_number' => $phone_number,
                'select_region' => $select_region,
                'social_websites' => $social_websites,
                'updated_by' => $name,
                'updated_at' => now(),
            );

            $ccusers = DB::table('c_contact_users')->where('contact_hash', $contact_hash)->where('c_token', $c_token)->where('c_hash', $c_hash)->where('c_sec_key', $c_sec_key)->update($data);

            if ($ccusers) {
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

        $contact_hash = $request->id;
        $name = $request->name;
        $c_token = $request->c_token;
        $c_hash = $request->c_hash;
        $c_sec_key = $request->c_sec_key;

        $data = array(
            'status' => 0,
            'updated_by' => $name,
            'updated_at' => now(),
        );

        $ccusers = DB::table('c_contact_users')->where('contact_hash', $contact_hash)->where('c_token', $c_token)->where('c_hash', $c_hash)->where('c_sec_key', $c_sec_key)->update($data);

        if($ccusers){

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
