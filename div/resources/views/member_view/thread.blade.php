@extends("member_view/layout")
@section("judul","Thread")
@section("isi")
	<a href="{{url('/member/thread/tambah')}}" class="btn btn-primary">Tambah</a><br><br>

	@if(count($list) > 0)
		@foreach($list as $li)
		<div class="card">
		  <div class="card-header">
		  	<a href="{{url('member/thread/detail/'.$li->id_thread)}}" >{{$li->nama_thread}} ({{$li->nama_kategori}})</a>
		  	<div class="text-right" style="margin-top: -30px">
		  		{{$li->status_thread}}
		  	</div>
		  </div>
		  <div class="card-body">
		  	{{$li->deskripsi}}
		  </div>
		  <div class="card-footer">
		  	Dipost oleh: <a href="{{url('/member/user/detail/'.$li->id_user)}}">{{$li->nama}}</a> Tanggal: {{Carbon::parse($li->created_at)->format("d-m-Y")}}
		  	<div class="text-right">
		  	@if(Auth::user()->id_user==$li->id_user)
		  	 
		  	 	@if($li->status_thread == "Buka")
		  	 	<a href="{{url('/member/thread/ubah/'.$li->id_thread)}}" class="btn btn-info">Ubah</a>
		  	 	@endif
		  	 	<a href="{{url('/member/thread/hapus/'.$li->id_thread)}}" class="btn btn-danger">Hapus</a>
		  	@endif
		  		
		  		
		  	</div>
		  </div>
		</div><br>
		@endforeach

		{{$list->links()}}
	@else
		<div class="alert alert-danger">Data tidak ditemukan</div>
	@endif
@endsection