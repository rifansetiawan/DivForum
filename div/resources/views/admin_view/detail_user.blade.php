@extends("admin_view/layout")
@section("judul","Detail User")
@section("isi")
	<table class="table">
		<tr>
			<td>
				<div class="card" style="width:250px">
				  <img class="card-img-top" src="{{url('img/'.$data->foto)}}" alt="Card image">
				  <div class="card-body">
				    <h4 class="card-title">{{$data->nama}}</h4>
				    <p class="card-text">
				    	<ul>
				    		<li>Tanggal Lahir:{{Carbon::parse($data->tanggal_lahir)->format("d-m-Y")}}</li>
				    		<li>Jenis Kelamin: {{$data->jenis_kelamin}}</li>
				    		<li>
				    			Popularitas: <span class="text-success">+{{$data->baik}}</span> | <span class="text-danger">-{{$data->buruk}}</span>
				    		</li>
				    	</ul>
				    	
				    </p>
				   
				  </div>
				</div>

			</td>
			<td>
				@if(Auth::user()->id_user != $data->id_user)
				Berikan Cendol/Bata:
				<a href="{{url('/vote/baik/'.$data->id_user)}}" class="btn btn-success">+</a>
				<a href="{{url('/vote/buruk/'.$data->id_user)}}" class="btn btn-danger">-</a>
				<form class="form-horizontal" action="{{url('admin/inbox/tambah/'.$data->id_user)}}" method="post">
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

		@if(Session::has("sukses"))
			<div class="alert alert-success">
				{{Session::get("sukses")}}
			</div>
		@endif
			<!-- Form Name -->
			<legend>Kirim Pesan</legend>

			<!-- Textarea -->
			<div class="form-group">
			  <label class="col-md-12 control-label" for="txt_pesan">Isi Pesan</label>
			  <div class="col-md-12">                     
			    <textarea class="form-control" id="txt_pesan" name="txt_pesan"></textarea>
			  </div>
			</div>

			<!-- Button -->
			<div class="form-group">
			  <label class="col-md-12 control-label" for=""></label>
			  <div class="col-md-12">
			    <button id="" name="" class="btn btn-primary">Kirim</button>
			  </div>
			</div>

			</fieldset>
		</form>
		@endif
			</td>
		</tr>
	</table>
	
		
	
	
	

@endsection