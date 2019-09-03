@extends("admin_view/layout")
@section("judul","Profil")
@section("isi")
	<form action="{{url('/admin/profil')}}" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		@if($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $err)
						<li>{{$err}}</li>
					@endforeach
				</ul>
			</div>
		@endif

		@if(Session::has("sukses"))
			<div class="alert alert-success">
				{{Session::get("sukses")}}
			</div>
		@endif
		<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txt_nama">Nama</label>  
  <div class="col-md-4">
  <input id="txt_nama" name="txt_nama" type="text" placeholder="Nama" class="form-control input-md" value="{{Auth::user()->nama}}">
    
  </div>
</div>





<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txt_telp">Telp</label>  
  <div class="col-md-4">
  <input id="txt_telp" name="txt_telp" type="text" placeholder="Telp" class="form-control input-md" value="{{Auth::user()->telp}}">
    
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="txt_alamat">Alamat</label>
  <div class="col-md-4">                     
    <textarea class="form-control" placeholder="Alamat" id="txt_alamat" name="txt_alamat">{{Auth::user()->alamat}}</textarea>
  </div>
</div>

<!-- Multiple Radios -->
<div class="form-group">
  <label class="col-md-4 control-label" for="rdo_kelamin">Jenis Kelamin</label>
  <div class="col-md-4">
  <div class="radio">
    <label for="rdo_kelamin-0">
      <input type="radio" name="rdo_kelamin" id="rdo_kelamin-0" value="Pria" @if(Auth::user()->jenis_kelamin=="Pria") checked="checked" @endif>
      Pria
    </label>
	</div>
  <div class="radio">
    <label for="rdo_kelamin-1">
      <input type="radio" name="rdo_kelamin" id="rdo_kelamin-1" value="Wanita" @if(Auth::user()->jenis_kelamin=="Wanita") checked="checked" @endif>
      Wanita
    </label>
	</div>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txt_tanggal">Tanggal Lahir</label>  
  <div class="col-md-4">
  <input id="txt_tanggal" name="txt_tanggal" type="date" placeholder="Tanggal Lahir" class="form-control input-md" value="{{Auth::user()->tanggal_lahir}}">
    
  </div>
</div>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="file_foto">Foto</label>
  <div class="col-md-4">
    <img src="{{asset('img/'.Auth::user()->foto)}}" width="100" height="100">
    <br>
    <input id="file_foto" name="file_foto" class="input-file" type="file">
  </div>
</div>


<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for=""></label>
  <div class="col-md-4">
    <button id="" name="" class="btn btn-primary">Simpan</button>
  </div>
</div>
	</form>
@endsection