<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\API\miniSlider;

class miniSliderController extends Controller
{
    //

    public function create(Request $request){

        $valid = Validator::make($request->all() , [
            'slider_name' => 'required | unique:App\Models\API\miniSlider,slider_name',
            'c_hash' => 'required',
            'c_token' => 'required',
            'c_sec_key' => 'required',
            'animation_hash' => 'required',
        ]);
 
        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else{

            $minisli = new miniSlider;

            $minisli->slider_name = $request->slider_name;
            $minisli->slider_hash = md5($request->slider_name);
            $minisli->animation_hash = $request->animation_hash;
            $minisli->slider_image = $request->slider_image;
            $minisli->c_hash = $request->c_hash;
            $minisli->c_token = $request->c_token;
            $minisli->c_sec_key = $request->c_sec_key;
            $minisli->created_by = "NULL";
            $minisli->updated_by = "NULL";
            $minisli->created_at = date('Y-m-d H:i:s');
            $minisli->updated_at = date('Y-m-d H:i:s');

            $minisli->save();

            return response()->json(array(
                'status' => 1,
                'message' => $minisli
            ));

        }

    }

    public function views(){

        $minisli = miniSlider::where('status', 1)->get();

        return response()->json($minisli);

    }

    public function view($id){

        $minisli = miniSlider::where('slider_hash', $id)->get();

        return response()->json($minisli);
        
    }

    public function update(Request $request, $id){

        $valid = Validator::make($request->all() , [
            'slider_name' => 'required | unique:App\Models\API\miniSlider,slider_name',
            'c_hash' => 'required',
            'c_token' => 'required',
            'c_sec_key' => 'required',
            'animation_hash' => 'required',
        ]);
 
        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else{

            miniSlider::where('slider_hash', $id)
            ->update([
                'slider_name' => $request->slider_name,
                'animation_hash' => $request->animation_hash,
                'slider_image' => $request->slider_image,
                'c_hash' => $request->c_hash,
                'c_token' => $request->c_token,
                'c_sec_key' => $request->c_sec_key,
            ]);

            return response()->json(array(
                'status' => 1,
                'message' => 'Updated Successfully'
            ));

        }

    }

    public function delete($id){

        $minisli = miniSlider::where('slider_hash', $id)
        ->update([
            'status' => 0,
        ]);

        if($minisli){

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
