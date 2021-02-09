<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\API\page;

class pageController extends Controller
{
    //

    public function create(Request $request){

        $valid = Validator::make($request->all() , [
            'page_title' => 'required | unique:App\Models\API\page,page_title',
            'home_slider_hash' => 'required',
            'mini_slider_hash' => 'required',
        ]);
 
        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else {
            
            $page = new page;

            $page->c_hash = $request->c_hash;
            $page->c_token = $request->c_token;
            $page->c_sec_key = $request->c_sec_key;
            $page->page_title = $request->page_title;
            $page->page_hash = md5($request->page_title.now());
            $page->page_description = $request->page_description;
            $page->meta_keys = $request->meta_keys;
            $page->social_media_links = $request->social_media_links;
            $page->publish_now = $request->publish_now;
            $page->publish_later = $request->publish_later;
            $page->image = $request->image;
            $page->parent_group = $request->parent_group;
            $page->home_slider_hash = $request->home_slider_hash;
            $page->mini_slider_hash = $request->mini_slider_hash;
            $page->created_by = "NULL";
            $page->updated_by = "NULL";
            $page->created_at = now();
            $page->updated_at = now();

            $pg = $page->save();

            if ($pg) {
                return response()->json(array(
                    'status' => 1,
                    'message' => $page
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

        $page = page::where('status', 1)->get();

        return response()->json($page);

    }

    public function view($id){

        $page = page::where('page_hash', $id)->get();

        return response()->json($page);
        
    }

    public function update(Request $request, $id){

        $valid = Validator::make($request->all() , [
            'page_title' => 'required | unique:App\Models\API\page,page_title',
            'home_slider_hash' => 'required',
            'mini_slider_hash' => 'required',
        ]);
 
        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else {
            
            $pg = page::where('page_hash', $id)->where('c_hash', $request->c_hash)->where('c_token', $request->c_token)->where('c_sec_key', $request->c_sec_key)
            ->update([
                'page_title' => $request->page_title,
                'page_description' => $request->page_description,
                'meta_keys' => $request->meta_keys,
                'social_media_links' => $request->social_media_links,
                'publish_now' => $request->publish_now,
                'publish_later' => $request->publish_later,
                'image' => $request->image,
                'parent_group' => $request->parent_group,
                'home_slider_hash' => $request->home_slider_hash,
                'mini_slider_hash' => $request->mini_slider_hash,
                'updated_by' => "NULL",
                'updated_at' => now(),
            ]);

            if ($pg) {
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

        $page = page::where('page_hash', $id)->where('c_hash', $request->c_hash)->where('c_token', $request->c_token)->where('c_sec_key', $request->c_sec_key)->where('home_slider_hash', $request->home_slider_hash)->where('mini_slider_hash', $request->mini_slider_hash)
        ->update([
            'status' => 0,
            'updated_by' => "NULL",
            'updated_at' => now(),
        ]);

        if($page){

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
