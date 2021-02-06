<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\API\plans;

class plansController extends Controller
{
    //

    public function create(Request $request){

        $valid = Validator::make($request->all() , [
            'plan_name' => 'required | unique:App\Models\API\plans,plan_name',
        ]);
 
        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else{

            $plans = new plans;

            $plans->plan_hash = md5($request->plan_name);
            $plans->plan_name = $request->plan_name;
            $plans->sequence = $request->sequence;
            $plans->plan_description = $request->plan_description;
            $plans->plan_sec_key = sha1($request->plan_name);
            $plans->created_by = "NULL";
            $plans->updated_by = "NULL";
            $plans->created_at = date('Y-m-d H:i:s');
            $plans->updated_at = date('Y-m-d H:i:s');
            $plans->save();

            return response()->json(array(
                'status' => 1,
                'message' => $plans
            ));

        }

    }

    public function views(){

        $plans = plans::where('status', 1)->get();

        return response()->json($plans);

    }

    public function view($id){

        $plans = plans::where('plan_hash', $id)->get();

        return response()->json($plans);
        
    }

    public function update(Request $request, $id){

        $valid = Validator::make($request->all() , [
            'plan_name' => 'required | unique:App\Models\API\plans,plan_name',
        ]);
 
        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else{

            plans::where('plan_hash', $id)
            ->update([
                'plan_name' =>$request->plan_name,
                'plan_description' =>$request->plan_description,
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

        $plans = plans::where('plan_hash', $id)
        ->update([
            'status' => 0,
        ]);

        if($plans){

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
