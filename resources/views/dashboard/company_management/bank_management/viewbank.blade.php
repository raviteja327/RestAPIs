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
@php
    $i=1;
    $details=DB::table('kalai_bank_details')->where('status',1)->get();
@endphp

    <a href="/company/banking" class="btn btn-primary mb-2">Add Bank details</a>
   
    
<div class="row">
    <div class="col">
        <table class="table table-borderless" id="datatable">
            <thead class="table-dark">
                <tr>
                    <th>Sno</th>
                    <th>Company Name</th>
                    <th>Branch Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($details as $item)
                    
                @php
                $data = DB::table('frontend_company')->where('company_name',$sess_com_name)->where('c_hash',$item->c_hash)->where('status' , 1)->get();
                    // dd(sizeof($data));
                    
                @endphp
                @if(sizeof($data) == 1)
                @foreach($data as $dd)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$dd->company_name}}</td>
                    <td>{{$item->branch_name}}</td>
                    <td><a href="/company/editbank/{{$item->account_number}}" ><i class="fas fa-edit"></i></a>
                        &nbsp; &nbsp; &nbsp;
                        <button class="btn btn-danger deletebtn"><i class="fas fa-trash"></i></button>

                    </td>
                </tr>
                @endforeach
                @endif
                @endforeach
           <tr>
               <td> <a class="btn btn-secondary" href="/front_end/company/dashboards">Back to home</a></td>
           </tr>
            </tbody>
        </table>
        <div class="modal fade" id="Deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Do you Want To DELETE?</p>
                    <form action="/company/deletebank" method="POST">
                        @csrf
                        <input type="hidden" id="b_name" name="b_name">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-danger">Yes</button>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<script>
    $(document).ready(function() {
      $('.deletebtn').on('click', function()
      {
        $('#Deletemodal').modal('show');
        $tr= $(this).closest('tr');
        var data=$tr.children("td").map(function()
        {
          return $(this).text();
        }).get();
        // alert(data);
        $('#b_name').val(data[2]);  
        // $('#f_name').val(data[1]);  
      });
    });
  </script>
@endsection