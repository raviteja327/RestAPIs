<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\API\cUsers;

class cUsersController extends Controller
{
    //

    public function create(Request $request){

        $valid = Validator::make($request->all() , [
            'email' => 'required | unique:App\Models\API\cUsers,email',
            'name' => 'required',
            'password' => 'required | confirmed',
            'employee_hash' => 'required'
        ]);
 
        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else{

            $users = new cUsers;

            $users->c_user_hash = md5($request->email.now());
            $users->name = $request->name;
            $users->email = $request->email;
            $users->mobile = $request->mobile;
            $users->photo = $request->photo;
            $users->subscriber = $request->subscriber;
            $users->paid_subscriber = $request->paid_subscriber;
            $users->password = md5($request->password);
            $users->employee_hash = $request->employee_hash;
            $users->created_by = "NULL";
            $users->updated_by = "NULL";
            $users->created_at = now();
            $users->updated_at = now();

            $user = $users->save();

            if ($user) {
                return response()->json(array(
                    'status' => 1,
                    'message' => $users
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

        $users = cUsers::where('status', 1)->get();

        return response()->json($users);

    }

    public function view(Request $request){

        $c_user_hash = $request->id;

        $users = cUsers::where('c_user_hash', $c_user_hash)->where('status', 1)->get();

        return response()->json($users);
        
    }

    public function update(Request $request){

        $valid = Validator::make($request->all() , [
            'email' => 'required | unique:App\Models\API\cUsers,email',
            'name' => 'required',
            'password' => 'required | confirmed',
            'employee_hash' => 'required'
        ]);
 
        if($valid->fails() == TRUE){
            return response()->json(array(
                'status' => 0,
                'message' => $valid->errors()
            ));
        }
        else{

            $c_user_hash = $request->id;

            $users = cUsers::where('c_user_hash', $c_user_hash)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'photo' => $request->photo,
                'subscriber' => $request->subscriber,
                'paid_subscriber' => $request->paid_subscriber,
                'password' => md5($request->password),
                'employee_hash' => $request->employee_hash,
                'updated_by' => "NULL",
                'updated_at' => now(),
            ]);

            if ($users) {
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

        $c_user_hash = $request->id;

        $users = cUsers::where('c_user_hash', $c_user_hash)
        ->update([
            'status' => 0,
            'updated_by' => "NULL",
            'updated_at' => now(),
        ]);

        if($users){

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
