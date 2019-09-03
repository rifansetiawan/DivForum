@extends("guest_view/layout")
@section("judul","Beranda")
@section("isi")
	@if(count($list) > 0)
		@foreach($list as $li)
		<div class="card">
		  <div class="card-header">
		  	<a href="{{url('/thread/detail/'.$li->id_thread)}}" >{{$li->nama_thread}} ({{$li->nama_kategori}})</a>
		  	<div class="text-right" style="margin-top: -30px">
		  		{{$li->status_thread}}
		  	</div>
		  </div>
		  <div class="card-body">
		  	{{$li->deskripsi}}
		  </div>
		  <div class="card-footer">
		  	Dipost oleh: <a href="{{url('/user/detail/'.$li->id_user)}}">{{$li->nama}}</a> Tanggal: {{Carbon::parse($li->created_at)->format("d-m-Y")}}
		  	
		  </div>
		</div><br>
		@endforeach

		{{$list->links()}}
	@else
		<div class="alert alert-danger">Data tidak ditemukan</div>
	@endif
@endsection