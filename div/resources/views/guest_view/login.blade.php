@extends("guest_view/layout")
@section("judul","Login")
@section("isi")
	<form action="{{url('/login')}}" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		

		@if(Session::has("error"))
			<div class="alert alert-danger">
				{{Session::get("error")}}
			</div>
		@endif
		<!-- Text input-->

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txt_email">Email</label>  
  <div class="col-md-4">
  <input id="txt_email" name="txt_email" type="text" placeholder="Email" class="form-control input-md" value="{{old('txt_email')}}">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txt_password">Password</label>
  <div class="col-md-4">
    <input id="txt_password" name="txt_password" type="password" placeholder="Password" class="form-control input-md">
    
  </div>
</div>

<!-- Multiple Checkboxes -->
<div class="form-group">
  <label class="col-md-4 control-label" for="checkboxes"></label>
  <div class="col-md-4">
  <div class="checkbox">
    <label for="checkboxes-0">
      <input type="checkbox" name="checkboxes" id="checkboxes-0" value="1">
      Ingat Saya
    </label>
  </div>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for=""></label>
  <div class="col-md-4">
    <button id="" name="" class="btn btn-primary">Login</button>
  </div>
</div>
	</form>
@endsection