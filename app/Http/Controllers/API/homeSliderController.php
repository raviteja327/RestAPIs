<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\API\homeSlider;
use App\Models\API\companies;

class homeSliderController extends Controller
{
    //

    public function create(Request $request){

        $valid = Validator::make($request->all() , [
            'slider_name' => 'required | unique:App\Models\API\homeSlider,slider_name',
            'animation_hash' => 'required',
            'c_hash' => 'required',
            'c_token' => 'required',
            'c_sec_key' => 'required',
        ]);
 
        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else{

            $c_hash = $request->c_hash;
            $c_token = $request->c_token;
            $c_sec_key = $request->c_sec_key;

            $status = companies::where('c_hash', $c_hash)->where('c_token', $c_token)->where('c_sec_key', $c_sec_key)->where('status', 1)->get();

            if ($status) {

                $homesli = new homeSlider;

                $homesli->slider_name = $request->slider_name;
                $homesli->slider_hash = md5($request->slider_name.now());
                $homesli->animation_hash = $request->animation_hash;
                $homesli->slider_image = $request->slider_image;
                $homesli->c_hash = $request->c_hash;
                $homesli->c_token = $request->c_token;
                $homesli->c_sec_key = $request->c_sec_key;
                $homesli->created_by = "NULL";
                $homesli->updated_by = "NULL";
                $homesli->created_at = now();
                $homesli->updated_at = now();

                $slider = $homesli->save();

                if ($slider) {
                    return response()->json(array(
                        'status' => 1,
                        'message' => $homesli
                    ));
                } else {
                    return response()->json(array(
                        'status' => 0,
                        'message' => 'Not Saved'
                    ));
                }
                
            } else {
                return response()->json(array(
                    'status' => 0,
                    'message' => 'Invalid access details Saved'
                ));
            }
    
        }

    }

    public function views(Request $request){

        $valid = Validator::make($request->all() , [
            'c_hash' => 'required',
            'c_token' => 'required',
            'c_sec_key' => 'required',
        ]);
 
        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else {
            
            $c_hash = $request->c_hash;
            $c_token = $request->c_token;
            $c_sec_key = $request->c_sec_key;

            $status = companies::where('c_hash', $c_hash)->where('c_token', $c_token)->where('c_sec_key', $c_sec_key)->where('status', 1)->get();

            if ($status) {
                
                $homesli = homeSlider::where('status', 1)->get();

                if ($homesli) {
                    return response()->json($homesli);
                } else {
                    return response()->json(array(
                        'status' => 0,
                        'message' => 'No Data Found'
                    ));
                }

            } else {
                
                return response()->json(array(
                    'status' => 0,
                    'message' => 'Invalid access details Saved'
                ));

            }
            
        }

    }

    public function view(Request $request){

        $valid = Validator::make($request->all() , [
            'c_hash' => 'required',
            'c_token' => 'required',
            'c_sec_key' => 'required',
        ]);
 
        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else {
            
            $c_hash = $request->c_hash;
            $c_token = $request->c_token;
            $c_sec_key = $request->c_sec_key;

            $status = companies::where('c_hash', $c_hash)->where('c_token', $c_token)->where('c_sec_key', $c_sec_key)->where('status', 1)->get();

            if ($status) {

                $slider_hash = $request->id;
                
                $homesli = homeSlider::where('slider_hash', $slider_hash)->where('status', 1)->get();

                if ($homesli) {
                    return response()->json($homesli);
                } else {
                    return response()->json(array(
                        'status' => 0,
                        'message' => 'No Data Found'
                    ));
                }

            } else {
                
                return response()->json(array(
                    'status' => 0,
                    'message' => 'Invalid access details Saved'
                ));

            }
            
        }
        
    }

    public function update(Request $request){

        $valid = Validator::make($request->all() , [
            'slider_name' => 'required | unique:App\Models\API\homeSlider,slider_name',
            'animation_hash' => 'required',
            'c_hash' => 'required',
            'c_token' => 'required',
            'c_sec_key' => 'required',
        ]);
 
        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else{

            $c_hash = $request->c_hash;
            $c_token = $request->c_token;
            $c_sec_key = $request->c_sec_key;

            $status = companies::where('c_hash', $c_hash)->where('c_token', $c_token)->where('c_sec_key', $c_sec_key)->where('status', 1)->get();

            if ($status) {

                $slider_hash = $request->id;
                
                $slider = homeSlider::where('slider_hash', $slider_hash)->where('c_hash', $c_hash)->where('c_token', $c_token)->where('c_sec_key', $c_sec_key)
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

            } else {
                
                return response()->json(array(
                    'status' => 0,
                    'message' => 'Invalid access details Saved'
                ));
                
            }
            
        }

    }

    public function delete(Request $request){

        $valid = Validator::make($request->all() , [
            'c_hash' => 'required',
            'c_token' => 'required',
            'c_sec_key' => 'required',
        ]);
 
        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else {
            
            $c_hash = $request->c_hash;
            $c_token = $request->c_token;
            $c_sec_key = $request->c_sec_key;

            $status = companies::where('c_hash', $c_hash)->where('c_token', $c_token)->where('c_sec_key', $c_sec_key)->where('status', 1)->get();

            if ($status) {

                $slider_hash = $request->id;
                $animation_hash = $request->animation_hash;
                
                $homesli = homeSlider::where('slider_hash', $slider_hash)->where('c_hash', $c_hash)->where('c_token', $c_token)->where('c_sec_key', $c_sec_key)->where('animation_hash', $animation_hash)
                ->update([
                    'status' => 0,
                    'updated_by' => "NULL",
                    'updated_at' => now()
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

            } else {
                
                return response()->json(array(
                    'status' => 0,
                    'message' => 'Invalid access details Saved'
                ));

            }
            
        }

    }

}
