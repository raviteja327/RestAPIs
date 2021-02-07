<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\API\crmTasks;

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
            
            $crmtask = new crmTasks;

            $crmtask->c_hash = $request->c_hash;
            $crmtask->c_token = $request->c_token;
            $crmtask->c_sec_key = $request->c_sec_key;
            $crmtask->sales_company_hash = $request->sales_company_hash;
            $crmtask->task_name = $request->task_name;
            $crmtask->task_hash = md5($request->task_name);
            $crmtask->task_type = $request->task_type;
            $crmtask->followup_date = $request->followup_date;
            $crmtask->notes = $request->notes;
            $crmtask->email_template = $request->email_template;
            $crmtask->assign_task = $request->assign_task;
            $crmtask->created_by = "NULL";
            $crmtask->updated_by = "NULL";
            $crmtask->created_at = date('Y-m-d H:i:s');
            $crmtask->updated_at = date('Y-m-d H:i:s');

            $crmtask->save();

            return response()->json(array(
                'status' => 1,
                'message' => $crmtask
            ));

        }

    }

    public function views(){

        $crmtask = crmTasks::where('status', 1)->get();

        return response()->json($crmtask);

    }

    public function view($id){

        $crmtask = crmTasks::where('task_hash', $id)->get();

        return response()->json($crmtask);
        
    }

    public function update(Request $request, $id){

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
            
            crmTasks::where('task_hash', $id)->where('sales_company_hash', $request->sales_company_hash)->where('c_hash', $request->c_hash)->where('c_token', $request->c_token)->where('c_sec_key', $request->c_sec_key)
            ->update([
                'sales_company_hash' => $request->sales_company_hash,
                'c_hash' => $request->c_hash,
                'c_token' => $request->c_token,
                'c_sec_key' => $request->c_sec_key,
                'task_name' => $request->task_name,
                'task_type' => $request->task_type,
                'followup_date' => $request->followup_date,
                'notes' => $request->notes,
                'email_template' => $request->email_template,
                'assign_task' => $request->assign_task,
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

        $crmtask = crmTasks::where('task_hash', $id)
        ->update([
            'status' => 0,
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

    }

}
