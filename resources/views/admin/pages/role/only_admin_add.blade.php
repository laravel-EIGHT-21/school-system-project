@extends('admin.admin_master')
@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Create New Admin User Role</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Admin User Role</li>
</ol>
</div>
</div>
</div>
</section>

<section class="content">
<div class="container-fluid">
<div class="row">
  
<div class="col-12 ">

    <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title"><b> Add Admin User</b></h3>

          
        </div>
        <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-9 col-md-offset-1">

	<form method="post" action="{{ route('admins.only.user.store') }}" enctype="multipart/form-data" >
		@csrf
@method('POST')
    
    
<!-- 1st Row -->
<div class="row">

<div class="col-6">
<div class="form-group">
<label>Admin Name</label>
    <input type="text" name="name" class="form-control" required=""> 
@error('name')
<span class="text-danger">{{$message}}</span>
@enderror
    </div>  
    </div> 



    <div class="col-6">
<div class="form-group">
<label>Admin Email</label>
    <input type="email" name="email" class="form-control" required=""> 
@error('email')
<span class="text-danger">{{$message}}</span>
@enderror
    </div>  
    </div> 


  
    </div><!--End 1st Row--> 



	<!-- 2nd Row -->
<div class="row">


<div class="col-6">
<div class="form-group">
<label>Admin Password</label>
<input type="password" name="password" class="form-control" required=""> 
@error('password')
<span class="text-danger">{{$message}}</span>
@enderror
</div>  
</div> 

<div class="col-6">
<div class="form-group">
<label>Designation<span style="color:red;">*</span></label>
<select name="designation_id" required="" class="form-control">
<option value="" selected="" disabled="">Select Designation</option>
@foreach($designation as $desi)
<option value="{{ $desi->id }}">{{ $desi->name }}</option>
@endforeach

</select>
</div>
</div> 


</div><!--End 2nd Row--> 



	<!-- 3rd Row -->
	

<hr>

<label><u><b>Assign User Roles/Permissions</b></u></label>
<br>

 <div class="row">

	
<div class="col-6">
<div class="form-group">
<select name="roles[]" required="" class="form-control">
<option value="" selected="" disabled="">Select Role</option>
@foreach ($roles as $role)
<option value="{{ $role->id }}">{{ $role->name }}</option>
@endforeach

</select>
</div>
</div> 

</div><!--End 9th Row-->

<hr>
	



<button type="submit" class="btn btn-rounded btn-primary mb-5">Add Admin User</button>

                                  </form>
                          </div>
                      </div>
                          </div>
                          </div>
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