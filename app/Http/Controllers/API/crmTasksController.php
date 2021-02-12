<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\API\crmTasks;
use App\Models\API\companies;

class crmTasksController extends Controller
{
    //

    public function create(Request $request){

        $valid = Validator::make($request->all() , [
            'task_name' => 'required | unique:App\Models\API\crmTasks,task_name',
            'sales_company_hash' => 'required',
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
                
                $crmtask = new crmTasks;

                $crmtask->c_hash = $request->c_hash;
                $crmtask->c_token = $request->c_token;
                $crmtask->c_sec_key = $request->c_sec_key;
                $crmtask->sales_company_hash = $request->sales_company_hash;
                $crmtask->task_name = $request->task_name;
                $crmtask->task_hash = md5($request->task_name.now());
                $crmtask->task_type = $request->task_type;
                $crmtask->followup_date = $request->followup_date;
                $crmtask->notes = $request->notes;
                $crmtask->email_template = $request->email_template;
                $crmtask->assign_task = $request->assign_task;
                $crmtask->created_by = "NULL";
                $crmtask->updated_by = "NULL";
                $crmtask->created_at = now();
                $crmtask->updated_at = now();
    
                $task = $crmtask->save();
    
                if ($task) {
                    return response()->json(array(
                        'status' => 1,
                        'message' => $crmtask
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
                
                $crmtask = crmTasks::where('c_hash', $c_hash)->where('c_token', $c_token)->where('c_sec_key', $c_sec_key)->where('status', 1)->get();

                if ($crmtask) {
                    return response()->json($crmtask);
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

                $task_hash = $request->id;
                
                $crmtask = crmTasks::where('task_hash', $task_hash)->where('c_hash', $c_hash)->where('c_token', $c_token)->where('c_sec_key', $c_sec_key)->where('status', 1)->get();

                if ($crmtask) {
                    return response()->json($crmtask);
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
            'task_name' => 'required | unique:App\Models\API\crmTasks,task_name',
            'sales_company_hash' => 'required',
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

                $task_hash = $request->id;
                
                $task = crmTasks::where('task_hash', $task_hash)->where('c_hash', $c_hash)->where('c_token', $c_token)->where('c_sec_key', $c_sec_key)
                ->update([
                    'sales_company_hash' => $request->sales_company_hash,
                    'task_name' => $request->task_name,
                    'task_type' => $request->task_type,
                    'followup_date' => $request->followup_date,
                    'notes' => $request->notes,
                    'email_template' => $request->email_template,
                    'assign_task' => $request->assign_task,
                    'updated_by' => "NULL",
                    'updated_at' => now(),
                ]);
    
                if ($task) {
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

                $task_hash = $request->id;
                $sales_company_hash = $request->sales_company_hash;
                
                $crmtask = crmTasks::where('task_hash', $task_hash)->where('sales_company_hash', $sales_company_hash)->where('c_hash', $c_hash)->where('c_token', $c_token)->where('c_sec_key', $c_sec_key)
                ->update([
                    'status' => 0,
                    'updated_by' => "NULL",
                    'updated_at' => now(),
                ]);
        
                if($crmtask){
        
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
