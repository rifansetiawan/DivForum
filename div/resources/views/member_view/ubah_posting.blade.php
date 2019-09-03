@extends("member_view/layout")
@section("judul","Ubah Balasan")
@section("isi")
<form class="form-horizontal" action="{{url('member/posting/ubah/'.$data->id_posting.'/'.$data->id_thread)}}" method="post">
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
			

			<!-- Textarea -->
			<div class="form-group">
			  <label class="col-md-12 control-label" for="txt_pesan">Isi Balasan</label>
			  <div class="col-md-12">                     
			    <textarea class="form-control" id="txt_pesan" name="txt_pesan">{{$data->isi_posting}}</textarea>
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
@endsection