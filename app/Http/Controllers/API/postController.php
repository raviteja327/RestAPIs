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

            $post = new post;

            $post->c_hash = $request->c_hash;
            $post->c_token = $request->c_token;
            $post->c_sec_key = $request->c_sec_key;
            $post->post_title = $request->post_title;
            $post->post_hash = md5($request->post_title);
            $post->post_description = $request->post_description;
            $post->meta_keys = $request->meta_keys;
            $post->social_media_links = $request->social_media_links;
            $post->publish_now = $request->publish_now;
            $post->publish_later = $request->publish_later;
            $post->image = $request->image;
            $post->parent_group = $request->parent_group;
            $post->created_by = "NULL";
            $post->updated_by = "NULL";
            $post->created_at = date('Y-m-d H:i:s');
            $post->updated_at = date('Y-m-d H:i:s');

            $post->save();

            return response()->json(array(
                'status' => 1,
                'message' => $post
            ));

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

            post::where('post_hash', $id)
            ->update([
                'post_title' => $request->post_title,
                'post_description' => $request->post_description,
                'meta_keys' => $request->meta_keys,
                'social_media_links' => $request->social_media_links,
                'publish_now' => $request->publish_now,
                'publish_later' => $request->publish_later,
                'image' => $request->image,
                'parent_group' => $request->parent_group,
                'c_hash' => $request->c_hash,
                'c_token' => $request->c_token,
                'c_sec_key' => $request->c_sec_key,
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

        $post = post::where('post_hash', $id)
        ->update([
            'status' => 0,
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
