<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\API\companies;

class companyPagesController extends Controller
{
    //

    public function create(Request $request){

        $valid = Validator::make($request->all() , [
            'c_page_name' => 'required | unique:App\Models\API\companyPages,c_page_name',
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
                
                $c_company_hash = md5($request->c_page_name.now());
                $c_page_name = $request->c_page_name;
                $custom_field = $request->custom_field;
                $author = $request->author;
                $c_page_description = $request->c_page_description;
                $c_link_id = $request->c_link_id;
                $c_news = $request->c_news;
                $c_partners = $request->c_partners;
                $c_reference = $request->c_reference;
                $c_carreer = $request->c_carreer;
                $c_contact = $request->c_contact;
                $c_overview = $request->c_overview;
                $c_location = $request->c_location;
                $c_token = $request->c_token;
                $c_hash = $request->c_hash;
                $c_sec_key = $request->c_sec_key;
    
                $data = array(
                    'c_company_hash' => $c_company_hash,
                    'c_page_name' => $c_page_name,
                    'custom_field' => $custom_field,
                    'author' => $author,
                    'c_page_description' => $c_page_description,
                    'c_link_id' => $c_link_id,
                    'c_news' => $c_news,
                    'c_partners' => $c_partners,
                    'c_reference' => $c_reference,
                    'c_carreer' => $c_carreer,
                    'c_contact' => $c_contact,
                    'c_overview' => $c_overview,
                    'c_location' => $c_location,
                    'c_token' => $c_token,
                    'c_hash' => $c_hash,
                    'c_sec_key' => $c_sec_key,
                    'created_by' => "NULL",
                    'updated_by' => "NULL",
                    'created_at' => now(),
                    'updated_at' => now(),
                );
    
                $cpages = DB::table('company_pages')->where('c_token', $c_token)->where('c_hash', $c_hash)->where('c_sec_key', $c_sec_key)->insert($data);
    
                if ($cpages) {
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
                
                $cpages = DB::table('company_pages')->where('status', 1)->get();

                if ($cpages) {
                    return response()->json($cpages);
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

                $c_company_hash = $request->id;
                
                $cpages = DB::table('company_pages')->where('c_company_hash', $c_company_hash)->where('status', 1)->get();

                if ($cpages) {
                    return response()->json($cpages);
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
            'c_page_name' => 'required | unique:App\Models\API\companyPages,c_page_name',
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
                
                $c_company_hash = $request->id;
                $c_page_name = $request->c_page_name;
                $custom_field = $request->custom_field;
                $author = $request->author;
                $c_page_description = $request->c_page_description;
                $c_link_id = $request->c_link_id;
                $c_news = $request->c_news;
                $c_partners = $request->c_partners;
                $c_reference = $request->c_reference;
                $c_carreer = $request->c_carreer;
                $c_contact = $request->c_contact;
                $c_overview = $request->c_overview;
                $c_location = $request->c_location;
                $c_token = $request->c_token;
                $c_hash = $request->c_hash;
                $c_sec_key = $request->c_sec_key;
    
                $data = array(
                    'c_page_name' => $c_page_name,
                    'custom_field' => $custom_field,
                    'author' => $author,
                    'c_page_description' => $c_page_description,
                    'c_link_id' => $c_link_id,
                    'c_news' => $c_news,
                    'c_partners' => $c_partners,
                    'c_reference' => $c_reference,
                    'c_carreer' => $c_carreer,
                    'c_contact' => $c_contact,
                    'c_overview' => $c_overview,
                    'c_location' => $c_location,
                    'updated_by' => "NULL",
                    'updated_at' => now(),
                );
    
                $cpages = DB::table('company_pages')->where('c_company_hash', $c_company_hash)->where('c_token', $c_token)->where('c_hash', $c_hash)->where('c_sec_key', $c_sec_key)->update($data);
    
                if ($cpages) {
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
                
                $c_company_hash = $request->id;

                $data = array(
                    'status' => 0,
                    'updated_by' => "NULL",
                    'updated_at' => now(),
                );
        
                $cpages = DB::table('company_pages')->where('c_company_hash', $c_company_hash)->where('c_token', $c_token)->where('c_hash', $c_hash)->where('c_sec_key', $c_sec_key)->update($data);
        
                if($cpages){
        
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
