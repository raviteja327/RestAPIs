<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class countriesController extends Controller
{
    //

    public function create(Request $request){

        $valid = Validator::make($request->all() , [
            'country_name' => 'required | unique:App\Models\API\countries,country_name',
            'a_hash' => 'required',
        ]);

        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else{

            $country_hash = md5($request->country_name.now());
            $country_name = $request->country_name;
            $country_desc = $request->country_desc;
            $country_code = $request->country_code;
            $a_hash = $request->a_hash;

            $data = array(
                'country_hash' => $country_hash,
                'country_name' => $country_name,
                'country_desc' => $country_desc,
                'country_code' => $country_code,
                'a_hash' => $a_hash,
                'created_by' => "NULL",
                'updated_by' => "NULL",
                'created_at' => now(),
                'updated_at' => now(),
            );

            $countries = DB::table('countries')->insert($data);

            if ($countries) {
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

        $countries = DB::table('countries')->where('status', 1)->get();
        return response()->json($countries);

    }

    public function view(Request $request){

        $country_hash = $request->id;

        $countries = DB::table('countries')->where('country_hash', $country_hash)->where('status', 1)->get();
        return response()->json($countries);
        
    }

    public function update(Request $request){

        $valid = Validator::make($request->all() , [
            'country_name' => 'required | unique:App\Models\API\countries,country_name',
            'a_hash' => 'required',
        ]);

        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else{

            $country_hash = $request->id;
            $country_name = $request->country_name;
            $country_desc = $request->country_desc;
            $country_code = $request->country_code;
            $a_hash = $request->a_hash;

            $data = array(
                'country_name' => $country_name,
                'country_desc' => $country_desc,
                'country_code' => $country_code,
                'a_hash' => $a_hash,
                'updated_by' => "NULL",
                'updated_at' => now(),
            );

            $countries = DB::table('countries')->where('country_hash', $country_hash)->update($data);

            if ($countries) {
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

        $country_hash = $request->id;
        $a_hash = $request->a_hash;

        $data = array(
            'status' => 0,
            'updated_by' => "NULL",
            'updated_at' => now(),
        );

        $countries = DB::table('countries')->where('country_hash', $country_hash)->where('a_hash', $a_hash)->update($data);

        if($countries){

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
