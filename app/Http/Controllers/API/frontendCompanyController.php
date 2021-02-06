<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\API\frontendCompany;

class frontendCompanyController extends Controller
{
    //

    public function create(Request $request){

        $valid = Validator::make($request->all() , [
            'company_name' => 'required | unique:App\Models\API\frontendCompany,company_name',
            'company_email' => 'required',
            'plan_hash' => 'required',
        ]);
 
        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else{

            $fc = new frontendCompany;

            $fc->company_name = $request->company_name;
            $fc->company_email = $request->company_email;
            $fc->c_token = md5(sha1($request->company_name));
            $fc->c_hash = md5($request->company_name);
            $fc->c_sec_key = sha1($request->company_name);
            $fc->mobile = $request->mobile;
            $fc->password = md5($request->password);
            $fc->android_service = $request->android_service;
            $fc->website_service = $request->website_service;
            $fc->ios_service = $request->ios_service;
            $fc->plan_hash = $request->plan_hash;
            $fc->application_service = $request->application_service;
            $fc->email_verification_details = $request->email_verification_details;
            $fc->template_name = $request->template_name;
            $fc->template_hash = md5($request->template_name);
            $fc->logo_file = $request->logo_file;
            $fc->certificate_file = $request->certificate_file;
            $fc->source = $request->source;
            $fc->created_by = "NULL";
            $fc->updated_by = "NULL";
            $fc->created_at = date('Y-m-d H:i:s');
            $fc->updated_at = date('Y-m-d H:i:s');

            $fc->save();

            return response()->json(array(
                'status' => 1,
                'message' => $fc
            ));

        }

    }

    public function views(){

        $fc = frontendCompany::where('status', 1)->get();

        return response()->json($fc);

    }

    public function view($id){

        $fc = frontendCompany::where('c_hash', $id)->get();

        return response()->json($fc);
        
    }

    public function update(Request $request, $id){

        $valid = Validator::make($request->all() , [
            'company_name' => 'required | unique:App\Models\API\frontendCompany,company_name',
            'company_email' => 'required',
            'plan_hash' => 'required',
        ]);
 
        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else{

            frontendCompany::where('c_hash', $id)
            ->update([
                'company_name' => $request->company_name,
                'company_email' => $request->company_email,
                'mobile' => $request->mobile,
                'password' => md5($request->password),
                'android_service' => $request->android_service,
                'website_service' => $request->website_service,
                'ios_service' => $request->ios_service,
                'application_service' => $request->application_service,
                'email_verification_details' => $request->email_verification_details,
                'template_name' => $request->template_name,
                'template_hash' => md5($request->template_name),
                'logo_file' => $request->logo_file,
                'certificate_file' => $request->certificate_file,
                'source' => $request->source,
                'updated_by' => "NULL",
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            return response()->json(array(
                'status' => 1,
                'message' => 'Updated Successfully'
            ));

        }

    }

    public function delete($id){

        $fc = frontendCompany::where('c_hash', $id)
        ->update([
            'status' => 0,
        ]);

        if($fc){

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
