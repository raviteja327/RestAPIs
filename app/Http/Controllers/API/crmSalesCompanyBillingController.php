<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\API\crmSalesCompanyBilling;

class crmSalesCompanyBillingController extends Controller
{
    //

    public function create(Request $request){

        $valid = Validator::make($request->all() , [
            'zip_code' => 'required | unique:App\Models\API\crmSalesCompanyBilling,zip_code',
            'sales_company_hash' => 'required',
            'country_hash' => 'required',
        ]);
 
        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else {
            
            $crmsalescombill = new crmSalesCompanyBilling;

            $crmsalescombill->sales_company_hash = $request->sales_company_hash;
            $crmsalescombill->street_house_number = $request->street_house_number;
            $crmsalescombill->zip_code = md5($request->zip_code.now());
            $crmsalescombill->town = $request->town;
            $crmsalescombill->country_hash = $request->country_hash;
            $crmsalescombill->created_by = "NULL";
            $crmsalescombill->updated_by = "NULL";
            $crmsalescombill->created_at = now();
            $crmsalescombill->updated_at = now();

            $bill = $crmsalescombill->save();

            if ($bill) {
                return response()->json(array(
                    'status' => 1,
                    'message' => $crmsalescombill
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

        $crmsalescombill = crmSalesCompanyBilling::where('status', 1)->get();

        return response()->json($crmsalescombill);

    }

    public function view(Request $request){

        $zip_code = $request->zip_code;

        $crmsalescombill = crmSalesCompanyBilling::where('zip_code', $zip_code)->get();

        return response()->json($crmsalescombill);
        
    }

    public function update(Request $request){

        $valid = Validator::make($request->all() , [
            'zip_code' => 'required | unique:App\Models\API\crmSalesCompanyBilling,zip_code',
            'sales_company_hash' => 'required',
            'country_hash' => 'required',
        ]);
 
        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else {

            $zip_code = $request->zip_code;
            
            $bill = crmSalesCompanyBilling::where('zip_code', $zip_code)
            ->update([
                'sales_company_hash' => $request->sales_company_hash,
                'street_house_number' => $request->street_house_number,
                'zip_code' => $request->zip_code,
                'town' => $request->town,
                'country_hash' => $request->country_hash,
                'updated_by' => "NULL",
                'updated_at' => now(),
            ]);

            if ($bill) {
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

        $zip_code = $request->zip_code;
        $sales_company_hash = $request->sales_company_hash;
        $country_hash = $request->country_hash;

        $crmsalescombill = crmSalesCompanyBilling::where('zip_code', $zip_code)->where('sales_company_hash', $sales_company_hash)->where('country_hash', $country_hash)
        ->update([
            'status' => 0,
            'updated_by' => "NULL",
            'updated_at' => now(),
        ]);

        if($crmsalescombill){

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
