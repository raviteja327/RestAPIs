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
            <div class="col col-xl-4 col-lg-4">
              

             <label for=""><h3> Add Employee</h3></label><a style="float: right" href="/company/employee_view" class="btn btn-primary mb-3">View Employees</a>

            
        <form  action="/company/employee_insert" onsubmit="return checkPassword(this)" method="post">
          @csrf
          <div class="form-group">
            <input type="hidden" name="company_name" value="{{$sess_com_name}}">
            <label for=""><h3>{{$sess_com_name}}</h3></label>
          </div>

            <div class="form-group">
             
              <input type="text" name="first_name" id="" class="form-control form-control-sm m-1" placeholder="First Name" >
            </div>

            <div class="form-group">
             
              <input type="text" name="last_name" id="" class="form-control form-control-sm m-1" placeholder="Last Name" >
            </div>
            <div class="form-group">
             
              <input type="email" class="form-control form-control-sm m-1" name="email" id="" placeholder="Email">
            </div>

            <div class="form-group">
              <input type="password" class="form-control form-control-sm m-1" name="password" id="pass" placeholder="password">
            </div>

            <div class="form-group">
             
              <input type="password" class="form-control form-control-sm m-1" name="c_password" id="cpass" placeholder="Confirm password">
            </div>
            <div class="form-group">
   
              <input type="date" name="birth_date" id="" class="form-control form-control-sm m-1" placeholder="" >
            </div>

            <div class="form-group">
              @php
              $role=DB::table('kalai_company_user_roles')->where('status',1)->get();
          @endphp
          <select name="c_role_name" class="form-select form-select-sm m-1">
            <option >Select Role</option>
            @foreach ($role as $ro)
            <option value="{{$ro->c_role_name}}">{{$ro->c_role_name}}</option>
              @endforeach
            </select>
            </div>

            <div class="form-group">
              <input type="text" name="address" id="" class="form-control form-control-sm m-1" placeholder="Address" >
            </div>

            <div class="form-group">
              
              <input type="text" name="city" id="" class="form-control form-control-sm m-1" placeholder="City" >
            </div>

            <div class="form-group">
              
              <input type="text" name="region" id="" class="form-control form-control-sm m-1" placeholder="Region" >
            </div>

            <div class="form-group">
             <input type="text" name="postal_code" id="" class="form-control form-control-sm m-1" placeholder="Postal Code" >
            </div>

            <div class="form-group">
             
              <input type="text" name="country" id="" class="form-control form-control-sm m-1" placeholder="Country" >
            </div>

            <div class="form-group">
             
              <input type="text" class="form-control form-control-sm m-1" name="home_phone" id=""  placeholder="Phone Number">
            </div>

            <div class="form-group">
             
              <input type="text" name="salary" id="" class="form-control form-control-sm m-1" placeholder="Salary" >
            </div>

            <button type="submit" class="btn btn-primary mt-2">Add Employee</button>



        </form>
      </div>
            
    </div>


    </div>

    <script> 
      // Function to check Whether both passwords 
      // is same or not. 
      function checkPassword(form) { 
          password1 = form.password.value; 
          password2 = form.c_password.value; 
          // If password not entered 
          if (password1 == '') 
              alert ("Please enter Password"); 
          // If confirm password not entered 
          else if (password2 == '') 
              alert ("Please enter confirm password"); 
          // If Not same return False.     
          else if (password1 != password2) { 
              alert ("\nPassword did not match: Please try again...") 
              return false; 
          } 
          // If same return True. 
          else{ 
              return true; 
          } 
      } 
  </script>

@endsection