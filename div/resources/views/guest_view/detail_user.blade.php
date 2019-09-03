@extends("guest_view/layout")
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
			
		</tr>
	</table>
	
		
	
	
	

@endsection