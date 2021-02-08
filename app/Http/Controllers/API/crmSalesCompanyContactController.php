<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\API\crmSalesCompanyContact;

class crmSalesCompanyContactController extends Controller
{
    //

    public function create(Request $request){

        $valid = Validator::make($request->all() , [
            'email' => 'required | unique:App\Models\API\crmSalesCompanyContact,email',
            'first_name' => 'required',
            'sales_company_hash' => 'required',
        ]);
 
        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else {
            
            $crmsalescomcontact = new crmSalesCompanyContact;

            $crmsalescomcontact->sales_company_hash = $request->sales_company_hash;
            $crmsalescomcontact->first_name = $request->first_name;
            $crmsalescomcontact->sur_name = $request->sur_name;
            $crmsalescomcontact->mobile = $request->mobile;
            $crmsalescomcontact->email = $request->email;
            $crmsalescomcontact->contact_hash = md5($request->email);
            $crmsalescomcontact->image = $request->image;
            $crmsalescomcontact->job_title = $request->job_title;
            $crmsalescomcontact->gender = $request->gender;
            $crmsalescomcontact->language = $request->language;
            $crmsalescomcontact->time_zone = $request->time_zone;
            $crmsalescomcontact->description = $request->description;
            $crmsalescomcontact->created_by = "NULL";
            $crmsalescomcontact->updated_by = "NULL";
            $crmsalescomcontact->created_at = date('Y-m-d H:i:s');
            $crmsalescomcontact->updated_at = date('Y-m-d H:i:s');

            $crmsalescomcontact->save();

            return response()->json(array(
                'status' => 1,
                'message' => $crmsalescomcontact
            ));

        }

    }

    public function views(){

        $crmsalescomcontact = crmSalesCompanyContact::where('status', 1)->get();

        return response()->json($crmsalescomcontact);

    }

    public function view($id){

        $crmsalescomcontact = crmSalesCompanyContact::where('contact_hash', $id)->get();

        return response()->json($crmsalescomcontact);
        
    }

    public function update(Request $request, $id){

        $valid = Validator::make($request->all() , [
            'email' => 'required | unique:App\Models\API\crmSalesCompanyContact,email',
            'first_name' => 'required',
            'sales_company_hash' => 'required',
        ]);
 
        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else {
            
            crmSalesCompanyContact::where('contact_hash', $id)->where('sales_company_hash', $request->sales_company_hash)
            ->update([
                'sales_company_hash' => $request->sales_company_hash,
                'first_name' => $request->first_name,
                'sur_name' => $request->sur_name,
                'mobile' => $request->mobile,
                'email' => $request->email,
                'image' => $request->image,
                'job_title' => $request->job_title,
                'gender' => $request->gender,
                'language' => $request->language,
                'time_zone' => $request->time_zone,
                'description' => $request->description,
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

        $crmsalescomcontact = crmSalesCompanyContact::where('contact_hash', $id)
        ->update([
            'status' => 0,
        ]);

        if($crmsalescomcontact){

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