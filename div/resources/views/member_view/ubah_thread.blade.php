@extends("member_view/layout")
@section("judul","Ubah Thread")
@section("isi")
	<form class="form-horizontal" action="{{url('member/thread/ubah/'.$data->id_thread)}}" method="post">
		{{csrf_field()}}
		@if($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $err)
						<li>{{$err}}</li>
					@endforeach
				</ul>
			</div>
		@endif

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txt_nama">Nama</label>  
  <div class="col-md-4">
  <input id="txt_nama" name="txt_nama" type="text" placeholder="Nama" class="form-control input-md" value="{{$data->nama_thread}}">
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="cbo_kategori">Kategori</label>
  <div class="col-md-4">
    <select id="cbo_kategori" name="cbo_kategori" class="form-control">
      <option value="">-Pilih-</option>
      @foreach($kategori as $kat)
      	<option value="{{$kat->id_kategori}}" @if($data->id_kategori==$kat->id_kategori) selected @endif>{{$kat->nama_kategori}}</option>
      @endforeach
    </select>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="txt_deskripsi">Deskripsi</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="txt_deskripsi" name="txt_deskripsi" placeholder="Deskripsi">{{$data->deskripsi}}</textarea>
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