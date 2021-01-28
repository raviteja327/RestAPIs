<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class kalaiCountriesController extends Controller
{
    //

    public function create(Request $request){

        $valid = Validator::make($request->all() , [
            'country_name' => 'required | unique:App\Models\API\kalaiCountries,country_name',
        ]);

        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else{

            $country_hash = md5($request->country_name);
            $country_name = $request->country_name;

            $data = array(
                'country_hash' => $country_hash,
                'country_name' => $country_name,
                'created_by' => "NULL",
                'updated_by' => "NULL",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            );

            DB::table('kalai_countries')->insert($data);

            return response()->json(array(
                'status' => 1,
                'message' => 'Added Successfully'
            ));

        }

    }

    public function views(){

        $kalaicountries = DB::table('kalai_countries')->where('status', 1)->get();
        return response()->json($kalaicountries);

    }

    public function view($id){
        $kalaicountries = DB::table('kalai_countries')->where('country_hash', $id)->where('status', 1)->get();
        return response()->json($kalaicountries);
    }

    public function update(Request $request){

        $valid = Validator::make($request->all() , [
            'country_name' => 'required | unique:App\Models\API\kalaiCountries,country_name',
        ]);

        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else{

            $country_hash = $request->id;
            $country_name = $request->country_name;

            $data = array(
                'country_name' => $country_name,
                'updated_by' => "NULL",
                'updated_at' => date('Y-m-d H:i:s'),
            );

            DB::table('kalai_countries')->where('country_hash', $country_hash)->update($data);

            return response()->json(array(
                'status' => 1,
                'message' => 'Updated Successfully'
            ));

        }
    }

    public function delete(Request $request){
        $country_hash = $request->id;

        $data = array(
            'status' => 0,
            'updated_at' => date('Y-m-d H:i:s'),
        );

        $kalaicountries = DB::table('kalai_countries')->where('country_hash', $country_hash)->update($data);

        if($kalaicountries){

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
