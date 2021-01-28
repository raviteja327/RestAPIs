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
        <div class="col">
            <h3>Company Employees Details</h3>
        </div>
        <div class="col">
            <a href="/company/employee_index" class="btn btn-primary">Add Employee</a>
        </div>
    </div>
    <table class="table table-borderless" id="datatable">
        <thead class="table-dark">
            <tr>
                <th>Employee Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $d)
            @php
                $role=DB::table('kalai_company_user_roles')->where('c_role_hash',$d->role_hash)->where('status',1)->first();
            @endphp
            <tr>
                <td>{{$d->first_name}}</td>
                <td>{{$d->email}}</td>
                <td>{{$role->c_role_name}}</td>
                <td>
                    <a href="/company/employee_edit/{{$d->email}}"><i class="fas fa-pencil-alt"></i></a> &nbsp; &nbsp;

                    <button type="button" class="btn btn-outline-danger deletebtn" >
                        <i class="fas fa-trash-alt"></i>
                    </button>

                </td>
            </tr>
            
            @endforeach
        
            <tr>
                <td> <a class="btn btn-secondary" href="/front_end/company/dashboards">Back to home</a></td>
            </tr>
        </tbody>


    </table>
</div>

    <div class="modal fade" id="delete_k_emp" tabindex="-1"  aria-labelledby="delete_k_empLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-danger">
            Are you sure do you want to delete?
            </div>
            <div class="modal-footer">
            <form action="/company/employee_delete" method="post">
                @csrf
                <input type="hidden" id="e_mail" name="e_mail">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-danger">Delete</button>
            </form>
            </div>
        </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.deletebtn').on('click', function()
            {
                $('#delete_k_emp').modal('show');
                $tr= $(this).closest('tr');
                var data=$tr.children("td").map(function()
                {
                    return $(this).text();
                }).get();
                // alert(data);
                alert(data[1]);
                // $('#plan_name').val(data[0]);  
                $('#e_mail').val(data[1]);  
                // $('#org_ty_hash').val(data[2]);
            });
        });
    </script>







@endsection