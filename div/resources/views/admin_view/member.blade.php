@extends("admin_view/layout")
@section("judul","Member")
@section("isi")


<a href="{{url('/admin/member/tambah')}}" class="btn btn-primary">Tambah</a><br>

@if(count($list) >0)
	<table class="table">
		<tr>
			<th>No.</th>
			<th>Nama </th>
			<th>Email</th>
			<th>Telp </th>
			<th>Alamat</th>
			<th>Tanggal Lahir </th>
			<th>Jenis Kelamin</th>
			<th>Posisi</th>
			<th></th>
		</tr>
		<?php $no=1?>
		@foreach($list as $li)
			<tr>
				<td>{{$no}}.</td>
				<td><a href="{{url('/admin/user/detail/'.$li->id_user)}}">{{$li->nama}}</a></td>
				<td>{{$li->email}}</td>
				<td>{{$li->telp}}</td>
				<td>{{$li->alamat}}</td>
				<td>{{Carbon::parse($li->tanggal_lahir)->format("d-m-Y")}}</td>
				<td>{{$li->jenis_kelamin}}</td>
				<td>{{$li->posisi}}</td>
				<td>
					@if($li->posisi == "Admin")
						<a href="{{url('/admin/member/ubah/'.$li->id_user)}}" class="btn btn-info">Ubah</a><br><br>
					@endif
					<a href="{{url('/admin/member/hapus/'.$li->id_user)}}" class="btn btn-danger">Hapus</a>
					
				</td>
			</tr>
			<?php $no++?>
		@endforeach
	</table>
@else
	<div class="alert alert-danger">Data tidak ditemukan</div>
@endif

@endsection