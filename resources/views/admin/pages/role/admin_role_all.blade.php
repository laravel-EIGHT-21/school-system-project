
@extends('admin.body.master')
@section('admin')



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
    <div class="col-sm-6">
    <h1> <b>System Users </b></h1>
    </div>

    </div>
    </div>
    </section>


<section class="content">

<div class="card card-solid">
<div class="card-body pb-0">

<div class="row">


@foreach($adminuser as $item)
<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
<div class="card bg-light d-flex flex-fill">

<div class="card-header text-muted border-bottom-0">
<b><u>Title : {{ $item['designation']['name'] }}</u></b>
</div>
<div class="card-body pt-0">
<div class="row">
<div class="col-7">
<h2 class="lead"><b><strong>{{ $item->name }}</strong></b></h2>
<p class="text-muted text-sm"><b>User-Group: </b>
@if(!empty($item->getRoleNames()))
        @foreach($item->getRoleNames() as $v)
           <label class="badge badge-success">{{ $v }}</label>
        @endforeach
      @endif
         
    </p>

<ul class="ml-2 mb-0 fa-ul text-muted">
 <li class="small" style="color:darkblue"><span class="fa-li"><i class="far fa-envelope"></i></span> <b>Email: {{ $item->email  }}</b></li>
</ul>
</div>
<div class="col-5 text-center">
<img src="{{ (!empty($item->profile_photo_path))? url('upload/admin_images/'.$item->profile_photo_path):url('upload/no_image.jpg') }}" id="showImagess" style="width: 60px; height: 60px;">
</div>
</div>
</div>



</div>
</div>
@endforeach






</div>

</div>



</div>

</section>


<script type="text/javascript">
	$(document).ready(function(){
		$('#imagess').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
			 $('#showImagess').attr('src',e.target.result);	
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>



@endsection
