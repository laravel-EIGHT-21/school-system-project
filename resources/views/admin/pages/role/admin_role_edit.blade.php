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

<form method="post" action="{{ route('admin.user.update',$adminuser->id) }}" enctype="multipart/form-data" >
@csrf

<input type="hidden" name="id" value="{{ $adminuser->id }}">	
<input type="hidden" name="old_image" value="{{ $adminuser->profile_photo_path }}">


<div class="add_item">
    
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

@foreach($editData as $edit)
<div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
<div class="row">
<div class="col-md-4">
<div class="form-group">
<label>Student Subject <span style="color:red;">*</span></label>
<select name="subject_id[]" required="" class="form-control">
<option value="" selected="" disabled="">Select Subject</option>
@foreach($subjects as $subject)
<option value="{{ $subject->id }}" {{ ($edit->subject_id == $subject->id)? "selected": ""  }}>{{ $subject->name }}</option>
@endforeach	 
</select>
</div>
</div> <!-- end col md 4 --> 

<div class="col-md-2" style="padding-top: 25px;">
 <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i> </span> 
  <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i> </span>      		
     	</div><!-- End col-md-5 --> 
<!-- End col-md-5 -->
</div>

</div> <!-- // End Remove Delete  -->
    @endforeach



</div>




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




<div style="visibility: hidden;">
<div class="whole_extra_item_add" id="whole_extra_item_add">
<div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
<div class="form-row">

<div class="col-md-5">

<div class="form-group">
<label>Student Subject</label>
<select name="subject_id[]" class="form-control">
<option value="" selected="" disabled="">Select Subject</option>
@foreach($subjects as $subject)
<option value="{{ $subject->id }}">{{ $subject->name }}</option>
@endforeach	 
</select>
</div>
</div> <!-- End col-md-5 -->



<div class="col-md-2" style="padding-top: 35px;">
<span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i> </span>
<span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i> </span>    		
</div><!-- End col-md-2 -->



  				
  			</div>  			
  		</div>  		
  	</div>  	
  </div>


 <script type="text/javascript">
 	$(document).ready(function(){
 		var counter = 0;
 		$(document).on("click",".addeventmore",function(){
 			var whole_extra_item_add = $('#whole_extra_item_add').html();
 			$(this).closest(".add_item").append(whole_extra_item_add);
 			counter++;
 		});
 		$(document).on("click",'.removeeventmore',function(event){
 			$(this).closest(".delete_whole_extra_item_add").remove();
 			counter -= 1
 		});

 	});
 </script>



	  

@endsection