<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class companiesController extends Controller
{
    //

    public function create(Request $request){

        $valid = Validator::make($request->all() , [
            'company_email' => 'required | unique:App\Models\API\companies,company_email',
            'company_name' => 'required',
            'a_hash' => 'required',
            'org_type_hash' => 'required',
            'org_indus_type_hash' => 'required',
        ]);

        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else{
            $company_hash = md5($request->company_email);
            $company_name = $request->company_name;
            $company_email = $request->company_email;
            $c_token = md5(sha1($request->company_email));
            $c_hash = md5($request->company_email);
            $c_sec_key = sha1($request->company_email);
            $a_hash = $request->a_hash;
            $org_type_hash = $request->org_type_hash;
            $org_indus_type_hash = $request->org_indus_type_hash;

            $data = array(
                'company_hash' => $company_hash,
                'company_name' => $company_name,
                'company_email' => $company_email,
                'c_token' => $c_token,
                'c_hash' => $c_hash,
                'c_sec_key' => $c_sec_key,
                'a_hash' => $a_hash,
                'org_type_hash' => $org_type_hash,
                'org_indus_type_hash' => $org_indus_type_hash,
                'created_by' => $company_name,
                'updated_by' => $company_name,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            );

            DB::table('companies')->where('a_hash', $a_hash)->where('org_type_hash', $org_type_hash)->where('org_indus_type_hash', $org_indus_type_hash)->insert($data);

            return response()->json(array(
                'status' => 1,
                'message' => 'Added Successfully'
            ));

        }
    }

    public function views(){

        $companies = DB::table('companies')->where('status', 1)->get();
        return response()->json($companies);

    }

    public function view($id){

        $companies = DB::table('companies')->where('company_hash', $id)->where('status', 1)->get();
        return response()->json($companies);

    }

    public function update(Request $request){

        $valid = Validator::make($request->all() , [
            'company_email' => 'required | unique:App\Models\API\companies,company_email',
            'company_name' => 'required',
            'a_hash' => 'required',
            'org_type_hash' => 'required',
            'org_indus_type_hash' => 'required',
        ]);

        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else{

            $company_hash = $request->id;
            $company_name = $request->company_name;
            $company_email = $request->company_email;
            // $c_token = $request->c_token;
            // $c_hash = $request->c_hash;
            // $c_sec_key = $request->c_sec_key;
            $a_hash = $request->a_hash;
            $org_type_hash = $request->org_type_hash;
            $org_indus_type_hash = $request->org_indus_type_hash;

            $data = array(
                'company_hash' => $company_hash,
                'company_name' => $company_name,
                'company_email' => $company_email,
                // 'c_token' => $c_token,
                // 'c_hash' => $c_hash,
                // 'c_sec_key' => $c_sec_key,
                'a_hash' => $a_hash,
                'org_type_hash' => $org_type_hash,
                'org_indus_type_hash' => $org_indus_type_hash,
                'updated_by' => $company_name,
                'updated_at' => date('Y-m-d H:i:s'),
            );

            DB::table('companies')->where('company_hash', $company_hash)->where('a_hash', $a_hash)->where('org_type_hash', $org_type_hash)->where('org_indus_type_hash', $org_indus_type_hash)->update($data);

            return response()->json(array(
                'status' => 1,
                'message' => 'Updated Successfully'
            ));

        }
    }

    public function delete(Request $request){

        $company_hash = $request->id;

        $data = array(
            'status' => 0,
            'updated_at' => date('Y-m-d H:i:s'),
        );

        $companies = DB::table('companies')->where('company_hash', $company_hash)->update($data);

        if($companies){

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
