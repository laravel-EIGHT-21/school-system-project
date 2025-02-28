@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Update Assigned Subjects</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Assigned Subjects </li>
</ol>
</div>
</div>
</div>
</section>



 <!-- Main content -->
 <section class="content">
      <div class="container-fluid">
      <div class="row">
  
  <div class="col-12 ">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title"><b>Edit Assigned Subjects Details</b></h3>


          </div>
          <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-12 col-md-offset-1">
<form method="post" action="{{ route('update.assign.subject',$editData[0]->class_id) }}">
	 	@csrf           
         <div class="add_item">
         <div class="row"> <!-- start 2nd row  -->
       
<div class="col-md-6">
<div class="form-group">
<label>Class Name <span style="color:red;">*</span></label>
<select name="class_id" required="" class="form-control">
<option value="" selected="" disabled="">Select Class</option>
@foreach($classes as $class)
<option value="{{ $class->id }}" {{ ($editData['0']->class_id == $class->id)? "selected":"" }} >{{ $class->name }}</option>
@endforeach	 
</select>
</div>
</div> <!-- end col md 4 -->

</div> <!-- end 2nd row  -->

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

<div class="col-md-2">
<div class="form-group">
<label>Full Mark <span style="color:red;">*</span></label>
<input type="text" name="full_mark[]" value="{{ $edit->full_mark }}" class="form-control" > 

</div>
</div>


<div class="col-md-2">
<div class="form-group">
<label>Pass Mark <span style="color:red;">*</span></label>
<input type="text" name="pass_mark[]" value="{{ $edit->pass_mark }}" class="form-control" > 

</div>
</div>

<div class="col-md-2">
<div class="form-group">
<label>Subjective Mark <span style="color:red;">*</span></label>
<input type="text" name="subjective_mark[]" value="{{ $edit->subjective_mark }}" class="form-control" > 

</div>
</div>


<div class="col-md-2" style="padding-top: 25px;">
 <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i> </span> 
  <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i> </span>      		
     	</div><!-- End col-md-5 --> 
<!-- End col-md-5 -->
</div>

</div> <!-- // End Remove Delete  -->
    @endforeach

    </div>

<button type="submit"  class="btn btn-rounded btn-primary mb-5">Update</button>

                                    </form>
                            </div>
                        </div><!--End of row-->


                            </div>

        </div>

        </div>
    </div>
   
             <!-- /.SELECT2 EXAMPLE-->

             </div>
     <!-- /.card -->
     </section>
    <!-- /.content -->



    <div style="visibility: hidden;">
  	<div class="whole_extra_item_add" id="whole_extra_item_add">
  		<div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
  			<div class="form-row">

	 <div class="col-md-4">

   <div class="form-group">
	<h5>Student Subject <span class="text-danger">*</span></h5>
	<div class="controls">
	 <select name="subject_id[]" required="" class="form-control">
		<option value="" selected="" disabled="">Select Subject</option>
		@foreach($subjects as $subject)
		<option value="{{ $subject->id }}">{{ $subject->name }}</option>
		@endforeach	 
		</select>
	 </div>
          </div> <!-- // end form group -->
     	</div> <!-- End col-md-5 -->


     	<div class="col-md-2">     		
      <div class="form-group">
		<h5>Full Mark <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="full_mark[]" class="form-control" > 
	  </div>		 
	</div>
     	</div><!-- End col-md-5 -->

<div class="col-md-2">     		
      <div class="form-group">
		<h5>Pass Mark <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="pass_mark[]" class="form-control" > 
	  </div>		 
	</div>
     	</div><!-- End col-md-5 -->

     	<div class="col-md-2">     		
      <div class="form-group">
		<h5>Subjective Mark <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="subjective_mark[]" class="form-control" > 
	  </div>		 
	</div>
     	</div><!-- End col-md-5 -->

     	<div class="col-md-2" style="padding-top: 25px;">
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