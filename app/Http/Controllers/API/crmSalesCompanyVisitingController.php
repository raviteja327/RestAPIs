<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\API\crmSalesCompanyVisiting;

class crmSalesCompanyVisitingController extends Controller
{
    //

    public function create(Request $request){

        $valid = Validator::make($request->all() , [
            'zip_code' => 'required | unique:App\Models\API\crmSalesCompanyVisiting,zip_code',
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
            
            $crmsalescomvisit = new crmSalesCompanyVisiting;

            $crmsalescomvisit->sales_company_hash = $request->sales_company_hash;
            $crmsalescomvisit->street_house_number = $request->street_house_number;
            $crmsalescomvisit->zip_code = md5($request->zip_code.now());
            $crmsalescomvisit->town = $request->town;
            $crmsalescomvisit->country_hash = $request->country_hash;
            $crmsalescomvisit->created_by = "NULL";
            $crmsalescomvisit->updated_by = "NULL";
            $crmsalescomvisit->created_at = now();
            $crmsalescomvisit->updated_at = now();

            $visit = $crmsalescomvisit->save();

            if ($visit) {
                return response()->json(array(
                    'status' => 1,
                    'message' => $crmsalescomvisit
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

        $crmsalescomvisit = crmSalesCompanyVisiting::where('status', 1)->get();

        return response()->json($crmsalescomvisit);

    }

    public function view(Request $request){

        $zip_code = $request->zip_code;

        $crmsalescomvisit = crmSalesCompanyVisiting::where('zip_code', $zip_code)->get();

        return response()->json($crmsalescomvisit);
        
    }

    public function update(Request $request){

        $valid = Validator::make($request->all() , [
            'zip_code' => 'required | unique:App\Models\API\crmSalesCompanyVisiting,zip_code',
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
            
            $visit = crmSalesCompanyVisiting::where('zip_code', $zip_code)
            ->update([
                'sales_company_hash' => $request->sales_company_hash,
                'street_house_number' => $request->street_house_number,
                'zip_code' => $request->zip_code,
                'town' => $request->town,
                'country_hash' => $request->country_hash,
                'updated_by' => "NULL",
                'updated_at' => now(),
            ]);

            if ($visit) {
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

        $crmsalescomvisit = crmSalesCompanyVisiting::where('zip_code', $zip_code)->where('sales_company_hash', $sales_company_hash)->where('country_hash', $country_hash)
        ->update([
            'status' => 0,
            'updated_by' => "NULL",
            'updated_at' => now(),
        ]);

        if($crmsalescomvisit){

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
