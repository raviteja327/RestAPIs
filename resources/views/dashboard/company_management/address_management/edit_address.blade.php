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
 
    <form action="/company/update_address" method="POST">
       
        {{-- <input type="hidden" name="c_hash" value="{{$c_hash}}"> --}}
        @csrf
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                <label><h3>Company Address</h3></label><a class="btn btn-primary" style="float: right" href="/company/viewcompany_addresses">View Company Address</a>
            @php
                // $data = DB::table('frontend_company')->where('status' , 1)->where('c_hash' , $c_hash)->first();
                $address_data = DB::table('kalai_company_address_manuals')->where('status' , 1)->where('pincode' , $id)->first();
            @endphp
            
                <div class="form-group">
                    <h3><label for="">{{$sess_com_name}}</label></h3>
                    <input type="hidden" value="{{$address_data->pincode_hash}}" name="pincode_hash">
                </div>
                <div class="form-group">
                   
                    <textarea class="form-control form-control-sm m-1" placeholder="Address1" id="address1" name="address1" rows="1">{{$address_data->address1}}</textarea>
                </div>
                <div class="form-group">
                    
                    <textarea class="form-control form-control-sm m-1" placeholder="Address2" id="address2" name="address2" rows="1">{{$address_data->address2}}</textarea>
                </div>
                <div class="form-group">
                    
                    <input type="text" class="form-control form-control-sm m-1" value="{{$address_data->street}}" placeholder="Enter Street" id="street" name="street">
                </div>
                <div class="form-group">
                   
                    <input type="text" class="form-control form-control-sm m-1" value="{{$address_data->landmark}}" placeholder="Enter Land mark" id="landmark" name="landmark">
                </div>
                <div class="form-group">
                   
                    <input type="text" class="form-control form-control-sm m-1" value="{{$address_data->pincode}}" placeholder="Enter Pincode" id="pincode" name="pincode">
                </div>
                <div class="form-group">
                   
                    <input type="text" class="form-control form-control-sm m-1" value="{{$address_data->contact_person_name}}" placeholder="Enter Contact Person Name" id="contact_person_name" name="contact_person_name">
                </div>
                <div class="form-group">
                    
                    <input type="text" class="form-control form-control-sm m-1" value="{{$address_data->mobile_number}}" placeholder="Enter mobile Number" id="mobile_number" name="mobile_number">
                </div>
            
        </div>
    </div>
        <button class="btn btn-success m-3" type="submit">Update Details</button>
    </form>
</div>
@endsection