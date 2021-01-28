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

    <form action="/company/addaddress" method="POST">
        @csrf
        <div class="row">
            @php
                $data = DB::table('frontend_company')->where('status' , 1)->get();
            @endphp
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                <label><h3>Company Address</h3></label>
                <a class="btn btn-primary" style="float: right" href="/company/viewcompany_addresses">View Company Address</a>

                <div class="form-group">
                    <label for=""><h2>{{$sess_com_name}}</h2></label></h4>
                    <input type="hidden" name="company_name" value="{{$sess_com_name}}">
                    </div>
                {{-- <input type="hidden" name="c_hash" value="{{$item->c_hash}}"> --}}
                <div class="form-group">
                    
                    <textarea class="form-control form-control-sm m-1" placeholder="Address1" id="address1" name="address1" rows="1"></textarea>
                </div>
                <div class="form-group">
                    
                    <textarea class="form-control form-control-sm m-1" placeholder="Address2" id="address2" name="address2" rows="1"></textarea>
                </div>

            
            
                <div class="form-group">
                   
                    <input type="text" class="form-control form-control-sm m-1" placeholder="Enter Street" id="street" name="street">
                </div>
                <div class="form-group">
                    
                    <input type="text" class="form-control form-control-sm m-1" placeholder="Enter Land mark" id="landmark" name="landmark">
                </div>
                <div class="form-group">
                    
                    <input type="text" class="form-control form-control-sm m-1" placeholder="Enter Pincode" id="pincode" name="pincode">
                </div>
                <div class="form-group">
                    
                    <input type="text" class="form-control form-control-sm m-1" placeholder="Enter Contact Person Name" id="contact_person_name" name="contact_person_name">
                </div>
                <div class="form-group">
                    
                    <input type="text" class="form-control form-control-sm m-1" placeholder="Enter Mobile Number" id="mobile_number" name="mobile_number">
                </div>
                <button class="btn btn-success m-3" type="submit">Add Details</button>
            </div>
            
        </div>
        
        
    </form>

</div>
</div>
</div>
@endsection