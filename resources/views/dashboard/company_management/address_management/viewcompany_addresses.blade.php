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
@php
    $data = DB::table('kalai_company_address_manuals')->where('status' , 1)->get();
    $i=1;
@endphp

<div class="container-fluid">
    <a href="/company/company_address" class="btn btn-primary mb-2">Add Company Details</a>
   {{-- <a href="/front_end/company/dashboards">Back to home</a>  --}}
    <table class="table table-borderless" id="datatable">
        <thead class="table-dark">
            <tr>
                <th>Sno</th>
                <th>Company Name</th>
                <th>Branch Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $dataa)
            @php
                $cname = DB::table('frontend_company')->where('c_hash',$dataa->c_hash)->where('status' , 1)->first();
            @endphp
            <tr>
                <td>{{$i++}}</td>
                <td>{{$cname->company_name}}</td>
                <td>{{$dataa->address1}}</td>
                <td >
                    <a href="/company/edit_address/{{$dataa->pincode}}"><i class="fas fa-pen"></i></a>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <button id="butt" class="btn btn-secondary delete"><i class="far fa-trash-alt"></i></button>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tr>
            <td> <a class="btn btn-secondary" href="/front_end/company/dashboards">Back to home</a></td>
        </tr>
    </table>

</div>
<div class="modal" name="Deletemodal" id="Deletemodal">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Are you sure you want to delete?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
           
            <form action="/company/deleteaddress" method="POST">
                @csrf
                <input type="hidden" id="c_hash" name="c_hash">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="submit" class="btn btn-danger">Yes</button>
            </form>
        </div>
    </div>
    </div>
</div>
<script>
    
    $(document).ready(function() {
        
      $('.delete').on('click', function()
      {
        $('#Deletemodal').modal.show();
        $tr= $(this).closest('tr');
        var data=$tr.children("td").map(function()
        {
          return $(this).text();
        }).get();
        alert(data);
        $('#c_hash').val(data[0]);  
        // $('#c_hash').val(data[1]);  
      });
    });
  </script>
  @endsection