@extends("admin_view/layout")
@section("judul","Inbox")
@section("isi")
	

	@if(count($list) > 0)
		@foreach($list as $li)
		<div class="card">
		  <div class="card-header">
		  	<a href="{{url('/member/user/detail/'.$li->id_pengirim)}}">{{$li->nama}}</a> Tanggal: {{Carbon::parse($li->created_at)->format("d-m-Y")}}
		  	<div class="text-right" style="margin-top: -30px">
		  		<a href="{{url('/member/inbox/hapus/'.$li->id_surat)}}" class="btn btn-danger">Hapus</a>
		  	</div>
		  </div>
		  <div class="card-body">
		  	{{$li->isi_surat}}
		  </div>
		
		</div><br>
		@endforeach

		{{$list->links()}}
	@else
		<div class="alert alert-danger">Inbox tidak ditemukan</div>
	@endif
@endsection