<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class kalaiStatesController extends Controller
{
    //

    public function create(Request $request){

        $valid = Validator::make($request->all() , [
            'state_name' => 'required | unique:App\Models\API\kalaiStates,state_name',
            'country_hash' => 'required',
        ]);

        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else{

            $state_hash = md5($request->state_name);
            $state_name = $request->state_name;
            $country_hash = $request->country_hash;

            $data = array(
                'state_hash' => $state_hash,
                'state_name' => $state_name,
                'country_hash' => $country_hash,
                'created_by' => "NULL",
                'updated_by' => "NULL",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            );

            DB::table('kalai_states')->where('country_hash', $country_hash)->insert($data);

            return response()->json(array(
                'status' => 1,
                'message' => 'Added Successfully'
            ));

        }

    }

    public function views(){

        $kalaistates = DB::table('kalai_states')->where('status', 1)->get();
        return response()->json($kalaistates);

    }

    public function view($id){

        $kalaistates = DB::table('kalai_states')->where('state_hash', $id)->where('status', 1)->get();
        return response()->json($kalaistates);

    }

    public function update(Request $request){

        $valid = Validator::make($request->all() , [
            'state_name' => 'required | unique:App\Models\API\kalaiStates,state_name',
            'country_hash' => 'required',
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
            $country_hash = $request->country_hash;

            $data = array(
                'state_name' => $state_name,
                'country_hash' => $country_hash,
                'updated_by' => "NULL",
                'updated_at' => date('Y-m-d H:i:s'),
            );

            DB::table('kalai_states')->where('state_hash', $state_hash)->where('country_hash', $country_hash)->update($data);

            return response()->json(array(
                'status' => 1,
                'message' => 'Updated Successfully'
            ));

        }

    }

    public function delete(Request $request){

        $state_hash = $request->id;

        $data = array(
            'status' => 0,
            'updated_at' => date('Y-m-d H:i:s'),
        );

        DB::table('kalai_states')->where('state_hash', $state_hash)->update($data);

        return response()->json(array(
            'status' => 1,
            'message' => 'Deleted Successfully'
        ));

    }

}
