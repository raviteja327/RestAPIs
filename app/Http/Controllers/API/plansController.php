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

            $plans->plan_hash = md5($request->plan_name.now());
            $plans->plan_name = $request->plan_name;
            $plans->sequence = $request->sequence;
            $plans->plan_description = $request->plan_description;
            $plans->plan_sec_key = sha1($request->plan_name);
            $plans->created_by = "NULL";
            $plans->updated_by = "NULL";
            $plans->created_at = now();
            $plans->updated_at = now();

            $plan = $plans->save();

            if ($plan) {
                return response()->json(array(
                    'status' => 1,
                    'message' => $plans
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

        $plans = plans::where('status', 1)->get();

        return response()->json($plans);

    }

    public function view(Request $request){

        $plan_hash = $request->id;

        $plans = plans::where('plan_hash', $plan_hash)->get();

        return response()->json($plans);
        
    }

    public function update(Request $request){

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

            $plan_hash = $request->id;

            $plan = plans::where('plan_hash', $plan_hash)
            ->update([
                'plan_name' =>$request->plan_name,
                'plan_description' =>$request->plan_description,
                'updated_by' => "NULL",
                'updated_at' => now(),
            ]);

            if ($plan) {
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

        $plan_hash = $request->id;

        $plans = plans::where('plan_hash', $plan_hash)
        ->update([
            'status' => 0,
            'updated_by' => "NULL",
            'updated_at' => now(),  
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
