@extends("guest_view/layout")
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
		  	Dipost oleh: <a href="{{url('/user/detail/'.$data->id_user)}}">{{$data->nama}}</a> Tanggal: {{Carbon::parse($data->created_at)->format("d-m-Y")}}
		  	
		  </div>
		</div><br>

	
		@foreach($list as $li)
		<div class="card">
		  
		  <div class="card-body">
		  	{{$li->isi_posting}}
		  </div>
		  <div class="card-footer">
		  	Dipost oleh: <a href="{{url('/admin/user/detail/'.$li->id_user)}}">{{$li->nama}}</a> Tanggal: {{Carbon::parse($li->created_at)->format("d-m-Y")}}
		  	
		  </div>
		</div><br>
		@endforeach

		{{$list->links()}}
	
@endsection