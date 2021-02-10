<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\API\post;
use App\Models\API\companies;

class postController extends Controller
{
    //

    public function create(Request $request){
        
        $valid = Validator::make($request->all() , [
            'post_title' => 'required | unique:App\Models\API\post,post_title',
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
                
                $post = new post;

                $post->c_hash = $request->c_hash;
                $post->c_token = $request->c_token;
                $post->c_sec_key = $request->c_sec_key;
                $post->post_title = $request->post_title;
                $post->post_hash = md5($request->post_title.now());
                $post->post_description = $request->post_description;
                $post->meta_keys = $request->meta_keys;
                $post->social_media_links = $request->social_media_links;
                $post->publish_now = $request->publish_now;
                $post->publish_later = $request->publish_later;
                $post->image = $request->image;
                $post->parent_group = $request->parent_group;
                $post->created_by = "NULL";
                $post->updated_by = "NULL";
                $post->created_at = now();
                $post->updated_at = now();
    
                $pst = $post->save();
    
                if ($pst) {
                    return response()->json(array(
                        'status' => 1,
                        'message' => $post
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
                
                $post = post::where('status', 1)->get();

                if ($post) {
                    return response()->json($post);
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

                $post_hash = $request->id;
                
                $post = post::where('post_hash', $post_hash)->where('status', 1)->get();

                if ($post) {
                    return response()->json($post);
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
            'post_title' => 'required | unique:App\Models\API\post,post_title',
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

                $post_hash = $request->id;
                
                $pst = post::where('post_hash', $post_hash)->where('c_hash', $c_hash)->where('c_token', $c_token)->where('c_sec_key', $c_sec_key)
                ->update([
                    'post_title' => $request->post_title,
                    'post_description' => $request->post_description,
                    'meta_keys' => $request->meta_keys,
                    'social_media_links' => $request->social_media_links,
                    'publish_now' => $request->publish_now,
                    'publish_later' => $request->publish_later,
                    'image' => $request->image,
                    'parent_group' => $request->parent_group,
                    'updated_by' => "NULL",
                    'updated_at' => now(),
                ]);
    
                if ($pst) {
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

                $post_hash = $request->id;
                
                $post = post::where('post_hash', $post_hash)->where('c_hash', $request->c_hash)->where('c_token', $request->c_token)->where('c_sec_key', $request->c_sec_key)
                ->update([
                    'status' => 0,
                    'updated_by' => "NULL",
                    'updated_at' => now(),
                ]);
        
                if($post){
        
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
