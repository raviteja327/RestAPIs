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
            $crmsalescomcontact->contact_hash = md5($request->email.now());
            $crmsalescomcontact->image = $request->image;
            $crmsalescomcontact->job_title = $request->job_title;
            $crmsalescomcontact->gender = $request->gender;
            $crmsalescomcontact->language = $request->language;
            $crmsalescomcontact->time_zone = $request->time_zone;
            $crmsalescomcontact->description = $request->description;
            $crmsalescomcontact->created_by = "NULL";
            $crmsalescomcontact->updated_by = "NULL";
            $crmsalescomcontact->created_at = now();
            $crmsalescomcontact->updated_at = now();

            $contact = $crmsalescomcontact->save();

            if ($contact) {
                return response()->json(array(
                    'status' => 1,
                    'message' => $crmsalescomcontact
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

        $crmsalescomcontact = crmSalesCompanyContact::where('status', 1)->get();

        return response()->json($crmsalescomcontact);

    }

    public function view(Request $request){

        $contact_hash = $request->id;

        $crmsalescomcontact = crmSalesCompanyContact::where('contact_hash', $contact_hash)->get();

        return response()->json($crmsalescomcontact);
        
    }

    public function update(Request $request){

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

            $contact_hash = $request->id;
            
            $contact = crmSalesCompanyContact::where('contact_hash', $contact_hash)
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
                'updated_at' => now(),
            ]);

            if ($contact) {
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

        $contact_hash = $request->id;
        $sales_company_hash = $request->sales_company_hash;

        $crmsalescomcontact = crmSalesCompanyContact::where('contact_hash', $contact_hash)->where('sales_company_hash', $sales_company_hash)
        ->update([
            'status' => 0,
            'updated_by' => "NULL",
            'updated_at' => now(),
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
