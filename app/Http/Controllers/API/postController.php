<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\API\post;

class postController extends Controller
{
    //

    public function create(Request $request){
        
        $valid = Validator::make($request->all() , [
            'post_title' => 'required | unique:App\Models\API\post,post_title',
        ]);
 
        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else{

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
            
        }

    }

    public function views(){

        $post = post::where('status', 1)->get();

        return response()->json($post);

    }

    public function view($id){

        $post = post::where('post_hash', $id)->get();

        return response()->json($post);
        
    }

    public function update(Request $request, $id){

        $valid = Validator::make($request->all() , [
            'post_title' => 'required | unique:App\Models\API\post,post_title',
        ]);
 
        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else{

            $pst = post::where('post_hash', $id)->where('c_hash', $request->c_hash)->where('c_token', $request->c_token)->where('c_sec_key', $request->c_sec_key)
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
            
        }

    }

    public function delete(Request $request, $id){

        $post = post::where('post_hash', $id)->where('c_hash', $request->c_hash)->where('c_token', $request->c_token)->where('c_sec_key', $request->c_sec_key)
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

    }

}
