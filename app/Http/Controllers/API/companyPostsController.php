<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\API\companies;

class companyPostsController extends Controller
{
    //

    public function create(Request $request){

        $valid = Validator::make($request->all() , [
            'post_title' => 'required | unique:App\Models\API\companyPosts,post_title',
            'post_name' => 'required',
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
                
                $post_hash = md5($request->post_title.now());
                $post_author = $request->post_author;
                $post_date = $request->post_date;
                $post_content = $request->post_content;
                $post_except = $request->post_except;
                $post_status = $request->post_status;
                $post_title = $request->post_title;
                $comment_status = $request->comment_status;
                $post_comment = $request->post_comment;
                $post_password = md5($request->post_password);
                $post_name = $request->post_name;
                $post_modified = $request->post_modified;
                $post_modified_gmt = $request->post_modified_gmt;
                $post_content_filtered = $request->post_content_filtered;
                $post_parent = $request->post_parent;
                $menu_order = $request->menu_order;
                $post_type = $request->post_type;
                $post_mine_type = $request->post_mine_type;
                $comment_count = $request->comment_count;
                $c_token = $request->c_token;
                $c_hash = $request->c_hash;
                $c_sec_key = $request->c_sec_key;
    
                $data = array(
                    'post_hash' => $post_hash,
                    'post_author' => $post_author,
                    'post_date' => $post_date,
                    'post_content' => $post_content,
                    'post_title' => $post_title,
                    'post_except' => $post_except,
                    'post_status' => $post_status,
                    'comment_status' => $comment_status,
                    'post_comment' => $post_comment,
                    'post_password' => $post_password,
                    'post_name' => $post_name,
                    'post_modified' => $post_modified,
                    'post_modified_gmt' => $post_modified_gmt,
                    'post_content_filtered' => $post_content_filtered,
                    'post_parent' => $post_parent,
                    'menu_order' => $menu_order,
                    'post_type' => $post_type,
                    'post_mine_type' => $post_mine_type,
                    'comment_count' => $comment_count,
                    'c_token' => $c_token,
                    'c_hash' => $c_hash,
                    'c_sec_key' => $c_sec_key,
                    'created_by' => "NULL",
                    'updated_by' => "NULL",
                    'created_at' => now(),
                    'updated_at' => now(),
                );
    
                $cposts = DB::table('company_posts')->where('c_token', $c_token)->where('c_hash', $c_hash)->where('c_sec_key', $c_sec_key)->insert($data);
    
                if ($cposts) {
                    return response()->json(array(
                        'status' => 1,
                        'message' => $data
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
                
                $cposts = DB::table('company_posts')->where('c_hash', $c_hash)->where('c_token', $c_token)->where('c_sec_key', $c_sec_key)->where('status', 1)->get();

                if ($cposts) {
                    return response()->json($cposts);
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
                
                $cposts = DB::table('company_posts')->where('post_hash', $post_hash)->where('c_hash', $c_hash)->where('c_token', $c_token)->where('c_sec_key', $c_sec_key)->where('status', 1)->get();

                if ($cposts) {
                    return response()->json($cposts);
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
            'post_title' => 'required | unique:App\Models\API\companyPosts,post_title',
            'post_name' => 'required',
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
                $post_author = $request->post_author;
                $post_date = $request->post_date;
                $post_content = $request->post_content;
                $post_except = $request->post_except;
                $post_status = $request->post_status;
                $post_title = $request->post_title;
                $comment_status = $request->comment_status;
                $post_comment = $request->post_comment;
                $post_password = md5($request->post_password);
                $post_name = $request->post_name;
                $post_modified = $request->post_modified;
                $post_modified_gmt = $request->post_modified_gmt;
                $post_content_filtered = $request->post_content_filtered;
                $post_parent = $request->post_parent;
                $menu_order = $request->menu_order;
                $post_type = $request->post_type;
                $post_mine_type = $request->post_mine_type;
                $comment_count = $request->comment_count;
                $c_token = $request->c_token;
                $c_hash = $request->c_hash;
                $c_sec_key = $request->c_sec_key;
    
                $data = array(
                    'post_author' => $post_author,
                    'post_date' => $post_date,
                    'post_content' => $post_content,
                    'post_title' => $post_title,
                    'post_except' => $post_except,
                    'post_status' => $post_status,
                    'comment_status' => $comment_status,
                    'post_comment' => $post_comment,
                    'post_password' => $post_password,
                    'post_name' => $post_name,
                    'post_modified' => $post_modified,
                    'post_modified_gmt' => $post_modified_gmt,
                    'post_content_filtered' => $post_content_filtered,
                    'post_parent' => $post_parent,
                    'menu_order' => $menu_order,
                    'post_type' => $post_type,
                    'post_mine_type' => $post_mine_type,
                    'comment_count' => $comment_count,
                    'updated_by' => "NULL",
                    'updated_at' => now(),
                );
    
                $cposts = DB::table('company_posts')->where('post_hash', $post_hash)->where('c_token', $c_token)->where('c_hash', $c_hash)->where('c_sec_key', $c_sec_key)->update($data);
    
                if ($cposts) {
                    return response()->json(array(
                        'status' => 1,
                        'message' => 'Update Successfully'
                    ));
                } else {
                    return response()->json(array(
                        'status' => 0,
                        'message' => 'Not Update'
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

                $data = array(
                    'status' => 0,
                    'updated_by' => "NULL",
                    'updated_at' => now(),
                );
        
                $cposts = DB::table('company_posts')->where('post_hash', $post_hash)->where('c_token', $c_token)->where('c_hash', $c_hash)->where('c_sec_key', $c_sec_key)->update($data);
        
                if($cposts){
        
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
