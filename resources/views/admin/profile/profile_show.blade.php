@extends('admin.body.master')

@section('admin')
@section('title')
User Profile Edit
@endsection


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
    <div class="col-sm-6">
    <h1>Update Admin User Proile</h1>
    </div>
    <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Profile Update</li>
    </ol>
    </div>
    </div>
    </div>
    </section>
    
    <section class="content">
    <div class="container-fluid">
    <div class="row">

    @php
    $id = Auth::user()->id;
    $editData = App\Models\User::find($id);
    @endphp
    
    <div class="col-md-12">
    
    <div class="card card-primary">
    
    
    <form method="post" action="{{route('admin.profile.update') }}" enctype="multipart/form-data">
        @csrf
    <div class="card-body">
        <div class="row">
        <div class="col-md-6">
    <div class="form-group">
    <label for="name">Admin Name</label>
    <input type="text" name="name" class="form-control" required="" value="{{$editData->name}}">
    </div>
</div>

<div class="col-md-6">
        <div class="form-group">
        <label for="email">Admin Email</label>
        <input type="email" name="email" class="form-control" required="" value="{{$editData->email}}">
        </div>
    </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" name="phone" class="form-control" required="" value="{{$editData->phone}}">
        </div>
    </div>
    </div>

    <div class="row">
    <div class="col-md-6">
        <div class="form-group">
        <label >Update Profile Photo</label>
        <input type="file" name="profile_photo_path" id="image" class="form-control" required="" value="{{$editData->profile_photo_path}}">
        </div>
    </div>


    <div class="col-md-6">
        <img class="profile-user-img img-fluid img-circle" id="showImage" src="{{(!empty($editData->profile_photo_path))? url('upload/admin_images/'.$editData->profile_photo_path):url('upload/no_image.jpg') }}" alt="" style="width:140px;height:150px;">
    </div>
    </div>

</div>
    
    
    
    <div class="card-footer">
    <button type="submit" class="btn btn-primary">Update Your Profile</button>
    </div>
    </form>
    </div>
    
    </div>
    
    
    <div class="col-md-6">
    </div>
    
    </div>
    
    </div>
    </section>




<script type="text/javascript">

	$(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#showImage').attr('src', e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});

</script>
         

@endsection