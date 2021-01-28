<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class statesDistrictsController extends Controller
{
    //

    public function create(Request $request){

        $valid = Validator::make($request->all() , [
            'dist_name' => 'required | unique:App\Models\API\statesDistricts,dist_name',
            'country_hash' => 'required',
            'a_hash' => 'required',
            'state_hash' => 'required',
        ]);

        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else{

            $dist_hash = md5($request->dist_name);
            $dist_name = $request->dist_name;
            $dist_desc = $request->dist_desc;
            $dist_code = $request->dist_code;
            $country_hash = $request->country_hash;
            $a_hash = $request->a_hash;
            $state_hash = $request->state_hash;

            $data = array(
                'dist_hash' => $dist_hash,
                'dist_name' => $dist_name,
                'dist_desc' => $dist_desc,
                'dist_code' => $dist_code,
                'country_hash' => $country_hash,
                'a_hash' => $a_hash,
                'state_hash' => $state_hash,
                'created_by' => "NULL",
                'updated_by' => "NULL",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            );

            DB::table('states_districts')->where('country_hash', $country_hash)->where('a_hash', $a_hash)->where('state_hash', $state_hash)->insert($data);

            return response()->json(array(
                'status' => 1,
                'message' => 'Added Successfully'
            ));

        }

    }

    public function views(){

        $statesdistricts = DB::table('states_districts')->where('status', 1)->get();
        return response()->json($statesdistricts);

    }

    public function view($id){

        $statesdistricts = DB::table('states_districts')->where('dist_hash', $id)->where('status', 1)->get();
        return response()->json($statesdistricts);

    }

    public function update(Request $request){

        $valid = Validator::make($request->all() , [
            'dist_name' => 'required | unique:App\Models\API\statesDistricts,dist_name',
            'country_hash' => 'required',
            'a_hash' => 'required',
            'state_hash' => 'required',
        ]);

        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else{

            $dist_hash = $request->id;
            $dist_name = $request->dist_name;
            $dist_desc = $request->dist_desc;
            $dist_code = $request->dist_code;
            $country_hash = $request->country_hash;
            $a_hash = $request->a_hash;
            $state_hash = $request->state_hash;

            $data = array(
                'dist_name' => $dist_name,
                'dist_desc' => $dist_desc,
                'dist_code' => $dist_code,
                'country_hash' => $country_hash,
                'a_hash' => $a_hash,
                'state_hash' => $state_hash,
                'updated_by' => "NULL",
                'updated_at' => date('Y-m-d H:i:s'),
            );

            DB::table('states_districts')->where('dist_hash', $dist_hash)->where('country_hash', $country_hash)->where('a_hash', $a_hash)->where('state_hash', $state_hash)->update($data);

            return response()->json(array(
                'status' => 1,
                'message' => 'Updated Successfully'
            ));

        }

    }

    public function delete(Request $request){

        $dist_hash = $request->id;

        $data = array(
            'status' => 0,
            'updated_at' => date('Y-m-d H:i:s'),
        );

        DB::table('states_districts')->where('dist_hash', $dist_hash)->update($data);

        return response()->json(array(
            'status' => 1,
            'message' => 'Deleted Successfully'
        ));

    }

}
