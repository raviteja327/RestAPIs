<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\API\animation;

class animationController extends Controller
{
    // 

    public function create(Request $request){
        
        $valid = Validator::make($request->all() , [
            'animation_name' => 'required | unique:App\Models\API\animation,animation_name',
        ]);
 
        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else{

            $animation = new animation;

            $animation->animation_hash = md5($request->animation_name.now());
            $animation->animation_name = $request->animation_name;
            $animation->created_by = "NULL";
            $animation->updated_by = "NULL";
            $animation->created_at = now();
            $animation->updated_at = now();
            $animation->save();

            return response()->json(array(
                'status' => 1,
                'message' => $animation
            ));

        }

    }

    public function views(){

        $animation = animation::where('status', 1)->get();

        return response()->json($animation);

    }

    public function view($id){

        $animation = animation::where('animation_hash', $id)->get();

        return response()->json($animation);
        
    }

    public function update(Request $request, $id){

        $valid = Validator::make($request->all() , [
            'animation_name' => 'required | unique:App\Models\API\animation,animation_name',
        ]);
 
        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else{

            $animation = animation::where('animation_hash', $id)
            ->update([
                'animation_name' => $request->animation_name,
                'updated_by' => "NULL",
                'updated_at' => now(),
            ]);

            return response()->json(array(
                'status' => 1,
                'message' => 'Updated Successfully'
            ));
            
        }   

    }

    public function delete($id){

        $animation = animation::where('animation_hash', $id)
        ->update([
            'status' => 0,
            'updated_by' => "NULL",
            'updated_at' => now(),
        ]);

        if($animation){

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
