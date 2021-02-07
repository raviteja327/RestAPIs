<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\API\crmSalesCompany;

class crmSalesCompanyController extends Controller
{
    //

    public function create(Request $request){

        $valid = Validator::make($request->all() , [
            'sales_company_name' => 'required | unique:App\Models\API\crmSalesCompany,sales_company_name',
            'c_hash' => 'required',
            'c_token' => 'required',
            'c_sec_key' => 'required',
            'country_hash' => 'required',
        ]);
 
        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else {
            
            $crmsalescom = new crmSalesCompany;

            $crmsalescom->c_hash = $request->c_hash;
            $crmsalescom->c_sec_key = $request->c_sec_key;
            $crmsalescom->c_token = $request->c_token;
            $crmsalescom->sales_company_name = $request->sales_company_name;
            $crmsalescom->sales_company_hash = md5($request->sales_company_name);
            $crmsalescom->company_logo = $request->company_logo;
            $crmsalescom->mobile = $request->mobile;
            $crmsalescom->street_house_number = $request->street_house_number;
            $crmsalescom->zip_code = $request->zip_code;
            $crmsalescom->town = $request->town;
            $crmsalescom->country_hash = $request->country_hash;
            $crmsalescom->vat_number = $request->vat_number;
            $crmsalescom->coc_no = $request->coc_no;
            $crmsalescom->rsn = $request->rsn;
            $crmsalescom->company_status = $request->company_status;
            $crmsalescom->created_by = "NULL";
            $crmsalescom->updated_by = "NULL";
            $crmsalescom->created_at = date('Y-m-d H:i:s');
            $crmsalescom->updated_at = date('Y-m-d H:i:s');

            $crmsalescom->save();

            return response()->json(array(
                'status' => 1,
                'message' => $crmsalescom
            ));

        }

    }

    public function views(){

        $crmsalescom = crmSalesCompany::where('status', 1)->get();

        return response()->json($crmsalescom);

    }

    public function view($id){

        $crmsalescom = crmSalesCompany::where('sales_company_hash', $id)->get();

        return response()->json($crmsalescom);
        
    }

    public function update(Request $request, $id){

        $valid = Validator::make($request->all() , [
            'sales_company_name' => 'required | unique:App\Models\API\crmSalesCompany,sales_company_name',
            'c_hash' => 'required',
            'c_token' => 'required',
            'c_sec_key' => 'required',
            'country_hash' => 'required',
        ]);
 
        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else {
            
            crmSalesCompany::where('sales_company_hash', $id)->where('c_hash', $request->c_hash)->where('c_token', $request->c_token)->where('c_sec_key', $request->c_sec_key)->where('country_hash', $request->country_hash)
            ->update([
                'sales_company_name' => $request->sales_company_name,
                'company_logo' => $request->company_logo,
                'mobile' => $request->mobile,
                'street_house_number' => $request->street_house_number,
                'zip_code' => $request->zip_code,
                'town' => $request->town,
                'country_hash' => $request->country_hash,
                'vat_number' => $request->vat_number,
                'c_hash' => $request->c_hash,
                'c_token' => $request->c_token,
                'c_sec_key' => $request->c_sec_key,
                'coc_no' => $request->coc_no,
                'rsn' => $request->rsn,
                'company_status' => $request->company_status,
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

        $crmsalescom = crmSalesCompany::where('sales_company_hash', $id)
        ->update([
            'status' => 0,
        ]);

        if($crmsalescom){

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
