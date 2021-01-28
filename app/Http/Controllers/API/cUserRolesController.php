<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class cUserRolesController extends Controller
{
    //

    public function create(Request $request){

        $valid = Validator::make($request->all() , [
            'c_role_name' => 'required',
            'a_hash' => 'required',
        ]);

        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else{

            $c_role_hash = md5($request->c_role_name);
            $c_role_name = $request->c_role_name;
            $c_role_description = $request->c_role_description;
            $a_hash = $request->a_hash;

            $data = array(
                'c_role_hash' => $c_role_hash,
                'c_role_name' => $c_role_name,
                'c_role_description' => $c_role_description,
                'a_hash' => $a_hash,
                'created_by' => "NULL",
                'updated_by' => "NULL",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            );

            DB::table('c_user_roles')->insert($data);

            return response()->json(array(
                'status' => 1,
                'message' => 'Added Successfully'
            ));

        }

    }

    public function views(){

        $cuser = DB::table('c_user_roles')->where('status', 1)->get();
        return response()->json($cuser);

    }

    public function view($id){

        $cuser = DB::table('c_user_roles')->where('c_role_hash', $id)->where('status', 1)->get();
        return response()->json($cuser);

    }

    public function update(Request $request){

        $valid = Validator::make($request->all() , [
            'c_role_name' => 'required',
            'a_hash' => 'required',
        ]);

        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else{

            $c_role_hash = $request->id;
            $c_role_name = $request->c_role_name;
            $c_role_description = $request->c_role_description;
            $a_hash = $request->a_hash;

            $data = array(
                'c_role_name' => $c_role_name,
                'c_role_description' => $c_role_description,
                'a_hash' => $a_hash,
                'updated_by' => "NULL",
                'updated_at' => date('Y-m-d H:i:s'),
            );

            DB::table('c_user_roles')->where('c_role_hash', $c_role_hash)->where('a_hash', $a_hash)->update($data);

            return response()->json(array(
                'status' => 1,
                'message' => 'Updated Successfully'
            ));

        }

    }

    public function delete(Request $request){

        $c_role_hash = $request->id;

        $data = array(
            'status' => 0,
            'updated_at' => date('Y-m-d H:i:s'),
        );

        DB::table('c_user_roles')->where('c_role_hash', $c_role_hash)->update($data);

        return response()->json(array(
            'status' => 1,
            'message' => 'Deleted Successfully'
        ));
    }

}
