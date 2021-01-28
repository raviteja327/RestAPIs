@extends('dashboard.default')
@section('content')
<div class="container mt-4">
   <div class="row">
       <!-- Store management -->
       <div class="col-3">
            <h3>Store Management</h3>
            <ul>
                <li>Products</li>
                <li>Coupons</li>
            </ul>
       </div>

    <!-- Store management -->
       <div class="col-3">
        <h3>Company Management</h3>
        <ul>
            <li><a href="/company/banking">Bank settings</a></li>
            <li><a href="/company/company_address">Add Company Address Manually</a></li>
            <li><a href="#">Add Company Address Automatic</a></li>
            <li><a href="/company/employee_index">Add Employees</a></li>
            {{-- <li><a href="">Add Employee Roles</a></li> --}}
        </ul>
   </div>
   {{-- <div class="col-3">
       <h3>Districts, States, Countries</h3>
       <li><a href="">Add District</a></li>
       <li><a href="">Add State</a></li>
       <li><a href="">Add Country</a></li>
   </div> --}}
   </div>
</div>
    
@endsection