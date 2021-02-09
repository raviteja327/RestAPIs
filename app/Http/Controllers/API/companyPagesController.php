<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class companyPagesController extends Controller
{
    //

    public function create(Request $request){

        $valid = Validator::make($request->all() , [
            'c_page_name' => 'required | unique:App\Models\API\companyPages,c_page_name',
        ]);

        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else{
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
            
        }

    }

    public function views(){

        $cpages = DB::table('company_pages')->where('status', 1)->get();
        return response()->json($cpages);

    }

    public function view($id){

        $cpages = DB::table('company_pages')->where('c_company_hash', $id)->where('status', 1)->get();
        return response()->json($cpages);

    }

    public function update(Request $request){

        $valid = Validator::make($request->all() , [
            'c_page_name' => 'required | unique:App\Models\API\companyPages,c_page_name',
        ]);

        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else{
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
            
        }

    }

    public function delete(Request $request){

        $c_company_hash = $request->id;
        $c_token = $request->c_token;
        $c_hash = $request->c_hash;
        $c_sec_key = $request->c_sec_key;

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

    }

}
