<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\API\homeSlider;

class homeSliderController extends Controller
{
    //

    public function create(Request $request){

        $valid = Validator::make($request->all() , [
            'slider_name' => 'required | unique:App\Models\API\homeSlider,slider_name',
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

            $homesli = new homeSlider;

            $homesli->slider_name = $request->slider_name;
            $homesli->slider_hash = md5($request->slider_name);
            $homesli->animation_hash = $request->animation_hash;
            $homesli->slider_image = $request->slider_image;
            $homesli->c_hash = $request->c_hash;
            $homesli->c_token = $request->c_token;
            $homesli->c_sec_key = $request->c_sec_key;
            $homesli->created_by = "NULL";
            $homesli->updated_by = "NULL";
            $homesli->created_at = date('Y-m-d H:i:s');
            $homesli->updated_at = date('Y-m-d H:i:s');

            $homesli->save();

            return response()->json(array(
                'status' => 1,
                'message' => $homesli
            ));

        }

    }

    public function views(){

        $homesli = homeSlider::where('status', 1)->get();

        return response()->json($homesli);

    }

    public function view($id){

        $homesli = homeSlider::where('slider_hash', $id)->get();

        return response()->json($homesli);
        
    }

    public function update(Request $request, $id){

        $valid = Validator::make($request->all() , [
            'slider_name' => 'required | unique:App\Models\API\homeSlider,slider_name',
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

            homeSlider::where('slider_hash', $id)->where('c_hash', $request->c_hash)->where('c_token', $request->c_token)->where('c_sec_key', $request->c_sec_key)->where('animation_hash', $request->animation_hash)
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

        $homesli = homeSlider::where('slider_hash', $id)
        ->update([
            'status' => 0,
        ]);

        if($homesli){

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
