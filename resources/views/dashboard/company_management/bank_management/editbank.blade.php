<?php
$sess_com_name=session()->get('company_name');
// dd($sess_com_name);
$session = session()->get('_token');
// dd($emp_name);
?>
@extends('dashboard.default')
<br><br>
@extends('dashboard.common.messages')
@section('content')

<div class="container-fluid">

{{-- <div class="container"> --}}
    @php
    // dd($id);
        // $data = DB::table('frontend_company')->where('company_name' , $sess_com_name)->first();
        $bankdata = DB::table('kalai_bank_details')->where('account_number', $id)->first();
    @endphp
    
    <form action="/company/updatebank" method="POST">
        @csrf
        <input type="hidden" value="{{$bankdata->account_hash}}" name="account_hash">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                <label><h3>Company Details</h3> </label><a href="/company/viewbank" style="float: right" class="btn btn-primary">View Bank Details</a>
                <div class="form-group">
                   <h3> {{$sess_com_name}}</h3>
                    
                </div>
                <div class="form-group">
                   
                    <input type="text" value="{{$bankdata->account_holder_name}}" placeholder="account holder name" name="account_name" class="form-control form-control-sm m-1">
                </div>
                <div class="form-group">
                   
                    <input type="text" value="{{$bankdata->account_number}}" placeholder="account number" name="account_number" class="form-control form-control-sm m-1">
                </div>
                <div class="form-group">
                   
                    <input type="text" value="{{$bankdata->bank_name}}" placeholder="bank name" name="bank_name" class="form-control form-control-sm m-1">
                </div>
                <div class="form-group">
                   
                    <input type="text" value="{{$bankdata->branch_name}}" placeholder="branch name" name="branch_name" class="form-control form-control-sm m-1">
                </div>

            <div class="form-group">
                
                <input type="text" value="{{$bankdata->sort_code}}" placeholder="sort code" name="sort_code" class="form-control form-control-sm m-1">
            </div>
            <div class="form-group">
               
                <input type="text" value="{{$bankdata->routing_number}}" placeholder="routing number" name="routing_number" class="form-control form-control-sm m-1">
            </div>
            <div class="form-group">
                
                <input type="text" value="{{$bankdata->swift_bic_code}}" placeholder="swift bic code" name="swift_code" class="form-control form-control-sm m-1">
            </div>
            <div class="form-group">
                
                <input type="text" value="{{$bankdata->ifsc_code}}" placeholder="ifsc code" name="ifsc_code" class="form-control form-control-sm m-1">
            </div>
            <div class="form-group">
              
                <input type="text" value="{{$bankdata->routing_code}}" placeholder="routing code" name="routing_code" class="form-control form-control-sm m-1">
            </div>
       <button type="submit" class="btn btn-primary m-3">Update</button>

        </div>
        

    </form>
</div>
</div>




@endsection