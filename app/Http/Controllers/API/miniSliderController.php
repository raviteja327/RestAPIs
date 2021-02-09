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
            $minisli->slider_hash = md5($request->slider_name.now());
            $minisli->animation_hash = $request->animation_hash;
            $minisli->slider_image = $request->slider_image;
            $minisli->c_hash = $request->c_hash;
            $minisli->c_token = $request->c_token;
            $minisli->c_sec_key = $request->c_sec_key;
            $minisli->created_by = "NULL";
            $minisli->updated_by = "NULL";
            $minisli->created_at = now();
            $minisli->updated_at = now();

            $slider = $minisli->save();

            if ($slider) {
                return response()->json(array(
                    'status' => 1,
                    'message' => $minisli
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

        $minisli = miniSlider::where('status', 1)->get();

        // dd($minisli);

        return response()->json($minisli);

    }

    public function view($id){

        $minisli = miniSlider::where('slider_hash', $id)->get();

        return response()->json($minisli);
        
    }

    public function update(Request $request, $id){

        $valid = Validator::make($request->all() , [
            'slider_name' => 'required | unique:App\Models\API\miniSlider,slider_name',
            'animation_hash' => 'required',
        ]);
 
        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else{

            $slider = miniSlider::where('slider_hash', $id)->where('c_hash', $request->c_hash)->where('c_token', $request->c_token)->where('c_sec_key', $request->c_sec_key)
            ->update([
                'slider_name' => $request->slider_name,
                'animation_hash' => $request->animation_hash,
                'slider_image' => $request->slider_image,
                'updated_by' => "NULL",
                'updated_at' => now()
            ]);

            if ($slider) {
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

    public function delete(Request $request, $id){

        $minisli = miniSlider::where('slider_hash', $id)->where('c_hash', $request->c_hash)->where('c_token', $request->c_token)->where('c_sec_key', $request->c_sec_key)->where('animation_hash', $request->animation_hash)
        ->update([
            'status' => 0,
            'updated_by' => "NULL",
            'updated_at' => now()
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
