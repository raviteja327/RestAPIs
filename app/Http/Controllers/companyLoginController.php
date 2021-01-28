<?php

namespace App\Http\Controllers;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\companyAddressModel;

class companyLoginController extends Controller
{
    public function index()
    {
        return view('dashboard.login');
    }
    public function login(Request $request)
    {
       $this->validate($request,[
        'email' =>'required',
        'password'=>'required'

      ]);
          $email=$request->get('email');
           $password=md5($request->get('password'));
           $query=  DB::select( DB::raw("SELECT * FROM `frontend_company` WHERE `company_email` = '$email' AND `password` = '$password'"));
        
        if($query == true)
        {
            foreach($query as $que)
            {
                $com_name = $que->company_name;
            }
            $request->session()->put('company_name',$com_name);
            return view('dashboard.main_dashboard')->with('query',$query);
        }
        else{
            return back()->with('Wrong Login Details');
        }
    }
    public function banking_create(){
        return view('dashboard.company_management.bank_management.banking_create');
    }
    public function addbank(Request $request){
        $this->validate($request , [
            'account_name' => 'required',
            'account_number' => 'required|unique:App\Models\companyBankModel,account_number',
            'bank_name' => 'required',
            'branch_name' => 'required',
            'sort_code' => 'required',
            'routing_number' => 'required',
            'swift_code' => 'required',
            'ifsc_code' => 'required',
            'routing_code' => 'required',
        ]);
        $ac_hash = md5($request->get('account_number'));
        $details = DB::table('frontend_company')->where('company_name' , $request->get('company_name'))->where('status', 1)->first();
        $data = array(
            'account_holder_name' => $request->get('account_name'),
            'account_number' => $request->get('account_number'),
            'account_hash' => $ac_hash,
            'bank_name' => $request->get('bank_name'),
            'branch_name' => $request->get('branch_name'),
            'sort_code' => $request->get('sort_code'),
            'routing_number' => $request->get('routing_number'),
            'swift_bic_code' => $request->get('swift_code'),
            'ifsc_code' => $request->get('ifsc_code'),
            'routing_code' => $request->get('routing_code'),
            'c_token' => $details->c_token,
            'c_hash' => $details->c_hash,
            'c_sec_key' => $details->c_sec_key,
            'created_by' => 'null',
            'updated_by' => 'null',
            'updated_at' => date('Y-m-d H:i:s'),
        );
        DB::table('kalai_bank_details')->insert($data);
        return back()->with('success' , 'succesfully inserted');
    }
    public function viewbank(){
        return view('dashboard.company_management.bank_management.viewbank');
    }
    public function editbank($id){
        return view('dashboard.company_management.bank_management.editbank')->with('id' , $id);
    }
    public function updatebank(Request $request){
       
        $account_hash = $request->get('account_hash');
        $data = array(
            'account_holder_name' => $request->get('account_name'),
            'account_number' => $request->get('account_number'),
            'bank_name' => $request->get('bank_name'),
            'branch_name' => $request->get('branch_name'),
            'sort_code' => $request->get('sort_code'),
            'routing_number' => $request->get('routing_number'),
            'swift_bic_code' => $request->get('swift_code'),
            'ifsc_code' => $request->get('ifsc_code'),
            'routing_code' => $request->get('routing_code'),
            'created_by' => 'null',
            'updated_by' => 'null',
            'updated_at' => date('Y-m-d H:i:s'),
        );
        DB::table('kalai_bank_details')->where('account_hash' , $account_hash)->update($data);
        return back()->with('success' , 'successfully Updated');
    }
    public function deletebank(Request $request){
        // dd($request);
        $b_name = $request->get('b_name');
        $data = array(
            'status' => 0,
            'updated_at' => date('Y-m-d H:i:s')
        );
        // $com_namee = DB::table('frontend_company')->where('branch_name', $b_name)->first();
        // dd($com_namee);
       $x= DB::table('kalai_bank_details')->where('branch_name' , $b_name)->update($data);
    //    dd($x);
        return back()->with('success', 'deleted');
    }
    public function company_address(){
        return view('dashboard.company_management.address_management.company_address');
    }
    public function addaddress(Request $request){
        // dd($request);
        $this->validate($request , [
            // 'c_hash'=>'required|unique:App\Models\companyAddressModel,c_hash',
            'address1' => 'required',
            'address2' => 'required',
            'street' => 'required',
            'landmark' => 'required',
            'pincode' => 'required',
            'contact_person_name' => 'required',
            'mobile_number' => 'required',
        ]);
            $cname = $request->get('company_name');
            $pin_hash = md5($request->get('pincode'));
            // dd($cname);
            $c_token = DB::table('frontend_company')->where('company_name',$cname)->where('status' , 1)->first();
        $data = array(
            'address1' => $request->get('address1'),
            'address2' => $request->get('address2'),
            'street' => $request->get('street'),
            'landmark' => $request->get('landmark'),
            'pincode' => $request->get('pincode'),
            'pincode_hash'=>$pin_hash,
            'contact_person_name' => $request->get('contact_person_name'),
            'mobile_number' => $request->get('mobile_number'),
            'c_token'=> $c_token->c_token,
            'c_hash' => $c_token->c_hash,
            'c_sec_key' => $c_token->c_sec_key,
            'updated_by'=>"null",
            "created_by"=>"null"
        );
        DB::table('kalai_company_address_manuals')->insert($data);
        return back()->with('success' , 'Adresses added');
    }
    public function viewcompany_addresses(){
        return view('dashboard.company_management.address_management.viewcompany_addresses');
    }
    public function edit_address($id){
        // dd($id);
        return view('dashboard.company_management.address_management.edit_address')->with('id' , $id);
    }
    public function update_address(Request $request){
        // dd($request);
        $pincode_hash = $request->get('pincode_hash');
        $data = array(
            'address1' => $request->get('address1'),
            'address2' => $request->get('address2'),
            'street' => $request->get('street'),
            'landmark' => $request->get('landmark'),
            'pincode' => $request->get('pincode'),
            'contact_person_name' => $request->get('contact_person_name'),
            'mobile_number' => $request->get('mobile_number'),
        );
        DB::table('kalai_company_address_manuals')->where('pincode_hash' , $pincode_hash)->update($data);
        return back()->with('success' , 'succesfully Updated');
    }
    public function deleteaddress(Request $request){
        dd($request);
        $c_hash = $request->get('c_hash');
        $data = array(
          'status' => 0,
          'updated_at' => date('Y-m-d H:i:s'),
        );
        $x = DB::table('kalai_company_address_manuals')->where('c_hash' , $c_hash)->update($data);
        // dd($x);
        return redirect('/kalai/company/viewcompany_addresses')->with('success' , 'deleted');
    }
}
