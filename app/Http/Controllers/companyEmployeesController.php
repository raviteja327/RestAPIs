<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Models\companyEmployeesModel;

class companyEmployeesController extends Controller
{

    public function employee_index(){

        return view('dashboard.employee_management.add_k_employee');
    }


    public function employee_insert(Request $request){
        $this->validate($request,[
            'email' =>'required|unique:App\Models\companyEmployeesModel,email',
            'password'=>'required'
          ]);


        $company_name=$request->get('company_name');
        $company_details=DB::table('frontend_company')->where('company_name', $company_name)->first();
        $c_role_name=$request->get('c_role_name');
        $c_role_name=DB::table('kalai_company_user_roles')->where('c_role_name',$c_role_name)->first();
        // dd($request);

        $session_token=$request->get('_token');
        $first_name = $request->get('first_name');
        $last_name=$request->get('last_name');
        $password=md5($request->get('password'));
        $email=$request->get('email');
        $birth_date=$request->get('birth_date');
        $address=$request->get('address');
        $city=$request->get('city');
        $region=$request->get('region');
        $postal_code=$request->get('postal_code');
        $country=$request->get('country');
        $home_phone=$request->get('home_phone');
        $salary=$request->get('salary');
        $created_by='null';
        $updated_by='null';
        $updated_at=date('Y-m-d h:i:s');
        $role_hash=md5($request->get('c_role_name'));
        $employee_hash=md5($request->get('email'));


        $edata=array(
            'c_token'=>$company_details->c_token,
            'c_hash'=>$company_details->c_hash,
            'c_sec_key'=>$company_details->c_sec_key,
            'first_name'=>$first_name,
            'last_name'=>$last_name,
            'password'=>$password,
            'email'=>$email,
            'birth_date'=>$birth_date,
            'address'=>$address,
            'city'=>$city,
            'region'=>$region,
            'postal_code'=>$postal_code,
            'country'=>$country,
            'home_phone'=>$home_phone,
            'salary'=>$salary,
            'created_by'=>$created_by,
            'updated_by'=>$updated_by,
            'updated_at'=>$updated_at,
            'role_hash'=>$role_hash,
            'employee_hash'=>$employee_hash


        );
        $db=DB::table('kalai_company_employees')->insert($edata);
        return back()->with('success', 'inserted successfully');

    }



    public function employee_view(){
        $data=DB::table('kalai_company_employees')->where('status',1)->get();
        // dd($data);
        return view('dashboard.employee_management.view_k_employee')->with ('data', $data);
    }




    public function employee_edit($id){
// dd($id);
        $dat=DB::table('kalai_company_employees')->where('email',$id)->first();
        // dd('email');
        return view('dashboard.employee_management.edit_k_employee')->with('dat',$dat);
    }



    public function employee_update(Request $request){

        // dd($request);
        $employee_hash=$request->get('employee_hash');
        $c_role_name=$request->get('c_role_name');
        $first_name = $request->get('first_name');
        $last_name=$request->get('last_name');
        $e_email=$request->get('email');
        $birth_date=$request->get('birth_date');
        $address=$request->get('address');
        $city=$request->get('city');
        $region=$request->get('region');
        $postal_code=$request->get('postal_code');
        $country=$request->get('country');
        $home_phone=$request->get('home_phone');
        $salary=$request->get('salary');
        $created_by='null';
        $updated_by='null';
        $updated_at=date('Y-m-d h:i:s');
        $c_namee= $request->get('company_name');


       $com_name=DB::table('frontend_company')->where('company_name',$c_namee)->where('status',1)->first();

       $role_hash = DB::table('kalai_company_user_roles')->where('c_role_name',$c_role_name)->where('status',1)->first();


        $udata=array(
            'employee_hash'=>$employee_hash,
            'role_hash'=>$role_hash->c_role_hash,
            'first_name'=>$first_name,
            'last_name'=>$last_name,
            'email'=>$e_email,
            'birth_date'=>$birth_date,
            'address'=>$address,
            'city'=>$city,
            'region'=>$region,
            'postal_code'=>$postal_code,
            'country'=>$country,
            'home_phone'=>$home_phone,
            'salary'=>$salary,
            'created_by'=>$created_by,
            'updated_by'=>$updated_by,
            'updated_at'=>$updated_at,
            'c_hash'=>$com_name->c_hash,
            'c_token'=>$com_name->c_token,
            'c_sec_key'=>$com_name->c_sec_key
        );


        $db=DB::table('kalai_company_employees')->where('employee_hash',$employee_hash)->where('email',$e_email)->update($udata);


        return redirect('/company/employee_view')->with('success', 'updated successfully');

    }


    public function employee_delete(Request $request){



        // dd($request);

        $e_mail=$request->get('e_mail');

        $dele=array('status'=>0);

        $del=DB::table('kalai_company_employees')->where('email',$e_mail)->update($dele);
        return back()->with('success','successfully deleted..!');

    }




































}
