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
    <div>

    </div>
    
    <form action="/company/addbank" method="POST">
        @csrf
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
        <label><h3>Bank Details</h3></label><a href="/company/viewbank" class="btn btn-primary" style="float: right">View Bank details</a>

                <div class="form-group">
                <label for=""><h2>{{$sess_com_name}}</h2></label>
                <input type="hidden" name="company_name" value="{{$sess_com_name}}">
                </div>
                <div class="form-group">
                   
                    <input type="text" placeholder="account holder name" name="account_name" class="form-control form-control-sm m-1">
                </div>
                <div class="form-group">
                   
                    <input type="text" placeholder="account number" name="account_number" class="form-control form-control-sm m-1">
                </div>
                <div class="form-group">
                   
                    <input type="text" placeholder="bank name" name="bank_name" class="form-control form-control-sm m-1">
                </div>
                <div class="form-group">
                    
                    <input type="text" placeholder="branch name" name="branch_name" class="form-control form-control-sm m-1">
                </div>
                <div class="form-group">
                   
                    <input type="text" placeholder="sort code" name="sort_code" class="form-control form-control-sm m-1">
                </div>
            
            <div class="form-group">
               
                <input type="text" placeholder="routing number" name="routing_number" class="form-control form-control-sm m-1">
            </div>
            <div class="form-group">
                
                <input type="text" placeholder="swift bic code" name="swift_code" class="form-control form-control-sm m-1">
            </div>
            <div class="form-group">
               
                <input type="text" placeholder="ifsc code" name="ifsc_code" class="form-control form-control-sm m-1">
            </div>
            <div class="form-group">
               
                <input type="text" placeholder="routing code" name="routing_code" class="form-control form-control-sm m-1">
            </div>
        </div>
        </div>

       <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>


</div>
@endsection
