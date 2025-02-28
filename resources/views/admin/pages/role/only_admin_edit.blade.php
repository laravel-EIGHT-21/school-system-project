@extends('admin.admin_master')
@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

 
<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Update Admin User</h1>
</div>
<div class="col-sm-6"> 
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Admin User Roles</li>
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
          <h3 class="card-title"><b> Edit Admin User Roles</b></h3>

          
        </div>
        <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-9 col-md-offset-1">

<form method="post" action="{{ route('admins.only.user.update',$adminuser->id) }}" enctype="multipart/form-data" >
@csrf

<input type="hidden" name="id" value="{{ $adminuser->id }}">	
<input type="hidden" name="old_image" value="{{ $adminuser->profile_photo_path }}">

    
<!-- 1st Row -->
<div class="row">

<div class="col-6">
<div class="form-group">
<label>Admin Name</label>
    <input type="text" name="name" class="form-control" value="{{ $adminuser->name }}" > 

    </div>  
    </div> 


    <div class="col-6">
<div class="form-group">
<label>Admin Email</label>
    <input type="email" name="email" class="form-control" value="{{ $adminuser->email }}"  > 
    </div>  
    </div> 


  
    </div><!--End 1st Row--> 



	<!-- 2nd Row -->
<div class="row">

<div class="col-6">
<div class="form-group">
<label>Designation<span style="color:red;">*</span></label>
<select name="designation_id" required="" class="form-control">
<option value="" selected="" disabled="">Select Designation</option>
@foreach($designation as $desi)
<option value="{{ $desi->id }}" {{ ($adminuser->designation_id == $desi->id)?'selected':'' }} >{{ $desi->name }}</option>
@endforeach

</select>
</div>

</div> 
	
		</div><!--End 2nd Row--> 




<hr>

<label><u><b>Assign User Roles/Permissions</b></u></label>
<br>

@foreach($editRole as $update)
 <div class="row">

 <div class="col-6">
<div class="form-group">
<select name="roles[]" required="" class="form-control">
<option value="" selected="" disabled="">Select Role</option>
@foreach ($roles as $role)
<option value="{{ $role->id}}"  {{ ($update->role_id == $role->id)? "selected": ""  }}>{{ $role->name }}</option>
@endforeach

</select>
</div>
</div> 

</div><!--End 9th Row-->
@endforeach

<hr>






<button type="submit" class="btn btn-rounded btn-primary ">Update Admin User Roles</button>

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
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
			 $('#showImage').attr('src',e.target.result);	
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>









	  

@endsection