<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class organisationTypesController extends Controller
{
    //

    public function create(Request $request){

        $valid = Validator::make($request->all() , [
            'org_type_name' => 'required | unique:App\Models\API\organisationTypes,org_type_name',
            'a_hash' => 'required',
        ]);

        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else{

            $org_type_hash = md5($request->org_type_name.now());
            $org_type_name = $request->org_type_name;
            $org_type_desc = $request->org_type_desc;
            $a_hash = $request->a_hash;

            $data = array(
                'org_type_hash' => $org_type_hash,
                'org_type_name' => $org_type_name,
                'org_type_desc' => $org_type_desc,
                'a_hash' => $a_hash,
                'created_by' => "NULL",
                'updated_by' => "NULL",
                'created_at' => now(),
                'updated_at' => now(),
            );

            $orgtype = DB::table('organisation_types')->insert($data);

            if ($orgtype) {
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

        $orgtype = DB::table('organisation_types')->where('status', 1)->get();
        return response()->json($orgtype);

    }

    public function view(Request $request){

        $org_type_hash = $request->id;

        $orgtype = DB::table('organisation_types')->where('org_type_hash', $org_type_hash)->where('status', 1)->get();
        return response()->json($orgtype);

    }

    public function update(Request $request){

        $valid = Validator::make($request->all() , [
            'org_type_name' => 'required | unique:App\Models\API\organisationTypes,org_type_name',
            'a_hash' => 'required',
        ]);

        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else{

            $org_type_hash = $request->id;
            $org_type_name = $request->org_type_name;
            $org_type_desc = $request->org_type_desc;
            $a_hash = $request->a_hash;

            $data = array(
                'org_type_name' => $org_type_name,
                'org_type_desc' => $org_type_desc,
                'a_hash' => $a_hash,
                'updated_by' => "NULL",
                'updated_at' => now(),
            );

            $orgtype = DB::table('organisation_types')->where('org_type_hash', $org_type_hash)->update($data);

            if ($orgtype) {
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

        $org_type_hash = $request->id;
        $a_hash = $request->a_hash;

        $data = array(
            'status' => 0,
            'updated_by' => "NULL",
            'updated_at' => now(),
        );

        $orgtype = DB::table('organisation_types')->where('org_type_hash', $org_type_hash)->where('a_hash', $a_hash)->update($data);

        if($orgtype){

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
