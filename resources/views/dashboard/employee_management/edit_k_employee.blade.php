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
        <div class="row">
            <div class="col col-lg-4 col-xl-4">
              

                <label for=""><h4>Update Employee</h4></label><a style="float: right" href="/company/employee_view" class="btn btn-primary mb-3">View Employees</a>
            

        <form action="/company/employee_update" method="post">
          @csrf

          <input type="hidden" name="role_hash" value="{{$dat->role_hash}}">
          <input type="hidden" name="employee_hash" value="{{$dat->employee_hash}}">
          <input type="hidden" name="company_name" value="{{$sess_com_name}}">
          <label for=""><h3>{{$sess_com_name}}</h3></label>
            <div class="form-group">
              
              <input type="text" name="first_name" id="" class="form-control form-control-sm m-1" placeholder="First Name" value="{{$dat->first_name}}">
            </div>

            <div class="form-group">
             
              <input type="text" name="last_name" id="" class="form-control form-control-sm m-1" placeholder="Last Name" value="{{$dat->last_name}}" >
            </div>
            <div class="form-group">
              
              <input type="email" class="form-control form-control-sm m-1" name="email" id="" placeholder="Email" value="{{$dat->email}}">
            </div>

            <div class="form-group">
              
              <input type="date" name="birth_date" id="birthdate" class="form-control form-control-sm m-1" placeholder="" value="{{$dat->birth_date}}">
            </div>
@php
// dd($dat);
    $rolename = DB::table('kalai_company_user_roles')->where('c_role_hash',$dat->role_hash)->first();
@endphp
            <div class="form-group">
              @php
                 $role=DB::table('kalai_company_user_roles')->where('status',1)->get();
              @endphp
             
                <select name="c_role_name" id="c_role_name" class="form-select form-select-sm m-1 ">
                  <option value="">Select Role</option>
                        @foreach($role as $roleee)
                    <option id="role1" value="{{$roleee->c_role_name}}" >{{$roleee->c_role_name}}</option>
                    @endforeach
                </select>   
            </div>


            <div class="form-group">
              
              <input type="text" name="address" id="" class="form-control form-control-sm m-1" placeholder="Address" value="{{$dat->address}}">
            </div>

            <div class="form-group">
             
              <input type="text" name="city" id="" class="form-control form-control-sm m-1" placeholder="" value="{{$dat->city}}">
            </div>

            <div class="form-group">
              
              <input type="text" name="region" id="" class="form-control form-control-sm m-1" placeholder="" value="{{$dat->region}}">
            </div>

            <div class="form-group">
              
              <input type="text" name="postal_code" id="" class="form-control form-control-sm m-1" placeholder="portal code" value="{{$dat->postal_code}}">
            </div>

            <div class="form-group">
             
              <input type="text" name="country" id="" class="form-control form-control-sm m-1" placeholder="" value="{{$dat->country}}">
            </div>

            <div class="form-group">
              
              <input type="text" class="form-control form-control-sm m-1" name="home_phone" id=""  placeholder="alternative phone no" value="{{$dat->home_phone}}">
            </div>

            <div class="form-group">
              
              <input type="text" name="salary" id="" class="form-control form-control-sm m-1" placeholder="salary" value="{{$dat->salary}}">
            </div>

            <button type="submit" class="btn btn-primary mt-2">Update Employee</button>



        </form>

      </div>
            
    </div>

    </div>


    <script>
      var  radio=[@php echo '"'.$rolename->c_role_name.'"' @endphp];
      // alert(radio);
      if(radio=="Power Admin"){
      $("#role1").attr({"selected": true});
      }
      if(radio=="Content Manager"){
      $("#role1").attr({"selected": true});
      }
      if(radio=="Content Writer"){
      $("#role1").attr({"selected": true});
      }
      if(radio=="Social Management"){
      $("#role1").attr({"selected": true});
      }
      if(radio=="Social CRM"){
      $("#role1").attr({"selected": true});
      }
      if(radio=="CRM Tools"){
      $("#role1").attr({"selected": true});
      }
      if(radio=="Account Management"){
      $("#role1").attr({"selected": true});
      }
      if(radio=="User Management"){
      $("#role1").attr({"selected": true});
      }
      if(radio=="Android"){
      $("#role1").attr({"selected": true});
      }
      if(radio=="IOS"){
      $("#role1").attr({"selected": true});
      }
      if(radio=="Web Developer"){
      $("#role1").attr({"selected": true});
      }
  </script>

@endsection