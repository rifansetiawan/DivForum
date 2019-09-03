@extends("member_view/layout")
@section("judul",$data->nama_thread)
@section("isi")
	<div class="card">
		  <div class="card-header">
		  	{{$data->nama_thread}} ({{$data->nama_kategori}})
		  	<div class="text-right" style="margin-top: -30px">
		  		{{$data->status_thread}}
		  	</div>
		  </div>
		  <div class="card-body">
		  	{{$data->deskripsi}}
		  </div>
		  <div class="card-footer">
		  	Dipost oleh: <a href="{{url('/member/user/detail/'.$data->id_user)}}">{{$data->nama}}</a> Tanggal: {{Carbon::parse($data->created_at)->format("d-m-Y")}}
		  	
		  </div>
		</div><br>

	
		@foreach($list as $li)
		<div class="card">
		  
		  <div class="card-body">
		  	{{$li->isi_posting}}
		  </div>
		  <div class="card-footer">
		  	Dipost oleh: <a href="{{url('/member/user/detail/'.$li->id_user)}}">{{$li->nama}}</a> Tanggal: {{Carbon::parse($li->created_at)->format("d-m-Y")}}
		  	<div class="text-right">
		  	@if(Auth::user()->id_user==$li->id_user)
		  	 
		  	 	@if($data->status_thread == "Buka")
		  	 	<a href="{{url('/member/posting/ubah/'.$li->id_posting)}}" class="btn btn-info">Ubah</a>
		  	 	@endif
		  	 	
		  	@endif
		  		<a href="{{url('/member/posting/hapus/'.$li->id_posting)}}" class="btn btn-danger">Hapus</a>
		  		
		  	</div>
		  </div>
		</div><br>
		@endforeach

		{{$list->links()}}
	@if($data->status_thread == "Buka")
		<form class="form-horizontal" action="{{url('member/posting/tambah/'.$data->id_thread)}}" method="post">
			<fieldset>
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

		
			<!-- Form Name -->
			<legend>Tambah Balasan</legend>

			<!-- Textarea -->
			<div class="form-group">
			  <label class="col-md-12 control-label" for="txt_pesan">Isi Balasan</label>
			  <div class="col-md-12">                     
			    <textarea class="form-control" id="txt_pesan" name="txt_pesan"></textarea>
			  </div>
			</div>

			<!-- Button -->
			<div class="form-group">
			  <label class="col-md-12 control-label" for=""></label>
			  <div class="col-md-12">
			    <button id="" name="" class="btn btn-primary">Simpan</button>
			  </div>
			</div>

			</fieldset>
		</form>
	@else
		<div class="alert alert-danger">Thread telah ditutup</div>
	@endif
@endsection