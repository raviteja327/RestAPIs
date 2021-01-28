{{-- error message --}}

@if($message=Session::get('error'))
<div class="alert alert-danger alert-block mt-2">
    <button type="button" class="close" data-bs-dismiss="alert" style="background: none;border: none">&times;</button>
    <li  style="list-style-type: none">{{$message}}</li>
</div>
@endif

@if(count($errors)>0)
<div class="alert alert-danger alert-block mt-2">
    <button type="button" class="close" data-bs-dismiss="alert" style="background: none;border: none">&times;</button>
    <ul>
        @foreach ($errors->all() as $error)
        <li style="list-style-type: none">{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

@if(session()->has('success'))
<div class="alert alert-success mt-2">
    <button type="button" class="close" data-bs-dismiss="alert" style="background: none;border: none">&times;</button>
    <li style="list-style-type: none">{{session()->get('success')}}</li>
</div>
@endif
