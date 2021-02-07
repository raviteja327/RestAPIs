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
            $crmsalescomvisit->zip_code = $request->zip_code;
            $crmsalescomvisit->town = $request->town;
            $crmsalescomvisit->country_hash = $request->country_hash;
            $crmsalescomvisit->created_by = "NULL";
            $crmsalescomvisit->updated_by = "NULL";
            $crmsalescomvisit->created_at = date('Y-m-d H:i:s');
            $crmsalescomvisit->updated_at = date('Y-m-d H:i:s');

            $crmsalescomvisit->save();

            return response()->json(array(
                'status' => 1,
                'message' => $crmsalescomvisit
            ));

        }

    }

    public function views(){

        $crmsalescomvisit = crmSalesCompanyVisiting::where('status', 1)->get();

        return response()->json($crmsalescomvisit);

    }

    public function view($id){

        $crmsalescomvisit = crmSalesCompanyVisiting::where('zip_code', $id)->get();

        return response()->json($crmsalescomvisit);
        
    }

    public function update(Request $request, $id){

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
            
            crmSalesCompanyVisiting::where('zip_code', $id)->where('sales_company_hash', $request->sales_company_hash)->where('country_hash', $request->country_hash)
            ->update([
                'sales_company_hash' => $request->sales_company_hash,
                'street_house_number' => $request->street_house_number,
                'zip_code' => $request->zip_code,
                'town' => $request->town,
                'country_hash' => $request->country_hash,
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

        $crmsalescomvisit = crmSalesCompanyVisiting::where('zip_code', $id)
        ->update([
            'status' => 0,
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
