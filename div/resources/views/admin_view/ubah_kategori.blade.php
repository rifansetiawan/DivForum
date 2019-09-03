@extends("admin_view/layout")
@section("judul","Ubah Kategori")
@section("isi")
	<form action="{{url('/admin/kategori/ubah/'.$data->id_kategori)}}" method="post" enctype="multipart/form-data">
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
  <input id="txt_nama" name="txt_nama" type="text" placeholder="Nama" class="form-control input-md" value="{{$data->nama_kategori}}">
    
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