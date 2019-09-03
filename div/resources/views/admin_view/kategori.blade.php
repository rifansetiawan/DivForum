@extends("admin_view/layout")
@section("judul","Kategori")
@section("isi")

<a href="{{url('/admin/kategori/tambah')}}" class="btn btn-primary">Tambah</a><br>

@if(count($list) >0)
	<table class="table">
		<tr>
			<th>No.</th>
			<th>Nama Kategori</th>
			<th></th>
		</tr>
		<?php $no=1?>
		@foreach($list as $li)
			<tr>
				<td>{{$no}}.</td>
				<td>{{$li->nama_kategori}}</td>
				<td>
					<a href="{{url('/admin/kategori/ubah/'.$li->id_kategori)}}" class="btn btn-info">Ubah</a>
					<a href="{{url('/admin/kategori/hapus/'.$li->id_kategori)}}" class="btn btn-danger">Hapus</a>
				</td>
			</tr>
			<?php $no++?>
		@endforeach
	</table>
@else
	<div class="alert alert-danger">Data tidak ditemukan</div>
@endif

@endsection