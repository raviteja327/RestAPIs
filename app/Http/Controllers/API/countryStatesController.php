<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class countryStatesController extends Controller
{
    //

    public function create(Request $request){

        $valid = Validator::make($request->all() , [
            'state_name' => 'required | unique:App\Models\API\countryStates,state_name',
            'a_hash' => 'required',
            'country_hash' => 'required'
        ]);

        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else{

            $state_hash = md5($request->state_name.now());
            $state_name = $request->state_name;
            $state_desc = $request->state_desc;
            $state_code = $request->state_code;
            $a_hash = $request->a_hash;
            $country_hash = $request->country_hash;

            $data = array(
                'state_hash' => $state_hash,
                'state_name' => $state_name,
                'state_desc' => $state_desc,
                'state_code' => $state_code,
                'country_hash' => $country_hash,
                'a_hash' => $a_hash,
                'created_by' => "NULL",
                'updated_by' => "NULL",
                'created_at' => now(),
                'updated_at' => now(),
            );

            $countrystates = DB::table('country_states')->insert($data);

            if ($countrystates) {
                return response()->json(array(
                    'status' => 1,
                    'message' => $data
                ));
            } else {
                return response()->json(array(
                    'status' => 1,
                    'message' => 'Not Saved'
                ));
            }
            
        }

    }

    public function views(){

        $countrystates = DB::table('country_states')->where('status', 1)->get();
        return response()->json($countrystates);

    }

    public function view(Request $request){

        $state_hash = $request->id;

        $countrystates = DB::table('country_states')->where('state_hash', $state_hash)->where('status', 1)->get();
        return response()->json($countrystates);

    }

    public function update(Request $request){

        $valid = Validator::make($request->all() , [
            'state_name' => 'required | unique:App\Models\API\countryStates,state_name',
            'a_hash' => 'required',
            'country_hash' => 'required'
        ]);

        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else{

            $state_hash = $request->id;
            $state_name = $request->state_name;
            $state_desc = $request->state_desc;
            $state_code = $request->state_code;
            $a_hash = $request->a_hash;
            $country_hash = $request->country_hash;

            $data = array(
                'state_name' => $state_name,
                'state_desc' => $state_desc,
                'state_code' => $state_code,
                'a_hash' => $a_hash,
                'country_hash' => $country_hash,
                'updated_by' => "NULL",
                'updated_at' => now(),
            );

            $countrystates = DB::table('country_states')->where('state_hash', $state_hash)->update($data);

            if ($countrystates) {
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

        $state_hash = $request->id;
        $a_hash = $request->a_hash;
        $country_hash = $request->country_hash;

        $data = array(
            'status' => 0,
            'updated_by' => "NULL",
            'updated_at' => now(),
        );

        $countrystates = DB::table('country_states')->where('state_hash', $state_hash)->update($data);

        if($countrystates){

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
