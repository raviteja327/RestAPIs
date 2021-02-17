<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\API\orderType;

class orderTypeController extends Controller
{
    //

    public function create(Request $request){

        $valid = Validator::make($request->all() , [
            'order_type_name' => 'required | unique:App\Models\API\orderType,order_type_name',
        ]);
 
        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else {
            
            $ordertype = new orderType;

            $ordertype->order_type_hash = md5($request->order_type_name.now());
            $ordertype->order_type_name = $request->order_type_name;
            $ordertype->created_by = "NULL";
            $ordertype->updated_by = "NULL";
            $ordertype->created_at = now();
            $ordertype->updated_at = now();
            $ot = $ordertype->save();

            if ($ot) {
                return response()->json(array(
                    'status' => 1,
                    'message' => $ordertype
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

        $ordertype = orderType::where('status', 1)->get();

        return response()->json($ordertype);

    }

    public function view(Request $request){

        $order_type_hash = $request->id;

        $ordertype = orderType::where('order_type_hash', $order_type_hash)->get();

        return response()->json($ordertype);
        
    }

    public function update(Request $request){

        $valid = Validator::make($request->all() , [
            'order_type_name' => 'required | unique:App\Models\API\orderType,order_type_name',
        ]);
 
        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else{

            $order_type_hash = $request->id;

            $ordertype = orderType::where('order_type_hash', $order_type_hash)
            ->update([
                'order_type_name' => $request->order_type_name,
                'updated_by' => "NULL",
                'updated_at' => now(),
            ]);

            if ($ordertype) {
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

        $order_type_hash = $request->id;

        $ordertype = orderType::where('order_type_hash', $order_type_hash)
        ->update([
            'status' => 0,
            'updated_by' => "NULL",
            'updated_at' => now(),
        ]);

        if($ordertype){

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
