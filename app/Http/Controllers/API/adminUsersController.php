<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class adminUsersController extends Controller
{
    //

    public function create(Request $request){

        $valid = Validator::make($request->all() , [
            'a_email' => 'required | unique:App\Models\API\adminUsers,a_email',
            'a_password' => 'required',
            'a_name' => 'required',
        ]);

        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else{

            $a_hash = md5($request->a_email.now());
            $a_email = $request->a_email;
            $a_password = md5($request->a_password);
            $a_name = $request->a_name;

            $data = array(
                'a_hash' => $a_hash,
                'a_email' => $a_email,
                'a_password' => $a_password,
                'a_name' => $a_name,
                'created_by' => $a_name,
                'updated_by' => $a_name,
                'created_at' => now(),
                'updated_at' => now(),
            );

            DB::table('admin_users')->insert($data);

            return response()->json(array(
                'status' => 1,
                'message' => $data
            ));

        }

    }

    public function views(){

        $admin = DB::table('admin_users')->where('status', 1)->get();
        return response()->json($admin);

    }

    public function view($id){
        $admin = DB::table('admin_users')->where('a_hash', $id)->where('status', 1)->get();
        return response()->json($admin);
    }

    // public function edit($id){
    //     $admin = DB::table('admin_users')->where('a_hash', $id)->where('status', 1)->get();
    //     return response()->json($admin);
    // }

    public function update(Request $request){

        $valid = Validator::make($request->all() , [
            'a_email' => 'required | unique:App\Models\API\adminUsers,a_email',
            'a_password' => 'required',
            'a_name' => 'required',
        ]);

        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else{

            $a_hash = $request->id;
            $a_email = $request->a_email;
            $a_password = md5($request->a_password);
            $a_name = $request->a_name;

            $data = array(
                'a_email' => $a_email,
                'a_password' => $a_password,
                'a_name' => $a_name,
                'updated_by' => $a_name,
                'updated_at' => now(),
            );

            DB::table('admin_users')->where('a_hash', $a_hash)->update($data);

            return response()->json(array(
                'status' => 1,
                'message' => 'Updated Successfully'
            ));

        }
    }

    public function delete(Request $request){
        $a_hash = $request->id;
        $a_name = $request->a_name;

        $data = array(
            'status' => 0,
            'updated_at' => now(),
            'updated_by' => $a_name,
        );

        $admin = DB::table('admin_users')->where('a_hash', $a_hash)->update($data);

        if($admin){

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
