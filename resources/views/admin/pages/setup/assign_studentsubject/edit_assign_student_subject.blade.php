
@extends('admin.body.master')
@section('admin')



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-12">
<h1>Update Assigned Subjects</h1>
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


            @can('olevel-students-subjects-get')
            <a href="{{ route('assign.student.subject.view') }}" style="float: right;" class="btn btn-rounded btn-success ">Back</a>		
            @endcan	  
          </div>
          <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-12 col-md-offset-1">
<form method="post" action="{{ route('update.assign.student.subject',$editData[0]->student_id) }}">
	 	@csrf           
         <div class="add_item"> 
         <div class="row"> <!-- start 2nd row  -->
       
<div class="col-md-4">
<div class="form-group">
<label>Student Name<span style="color:red;">*</span></label>
<input type="text" name="name" class="form-control" readonly  value="{{ $editData['0']['student']['name'] }}" > 
	 </div> 
</div> <!-- end col md 4 -->


 
<div class="col-md-4"> 
<div class="form-group">
<label>Student ID<span style="color:red;">*</span></label>
<input type="text" name="id_no" class="form-control" readonly  value="{{ $editData['0']['student']['id_no'] }}" > 
	 </div>
</div> <!-- end col md 4 -->




<div class="col-4">
<div class="form-group">
<label>Class<span style="color:red;">*</span></label>
<select name="class" id="class"  required="" class="form-control">
    <option value="Senior 1" {{ $editData['0']->class == 'Senior 1' ? 'selected' : ''  }} >Senior 1</option>
    <option value="Senior 2" {{ $editData['0']->class == 'Senior 2' ? 'selected' : ''  }}>Senior 2</option>
    <option value="Senior 3" {{ $editData['0']->class == 'Senior 3' ? 'selected' : ''  }}>Senior 3</option>
    <option value="Senior 4" {{ $editData['0']->class == 'Senior 4' ? 'selected' : ''  }}>Senior 4</option>
    <option value="Senior 5" {{ $editData['0']->class == 'Senior 5' ? 'selected' : ''  }}>Senior 5</option>
    <option value="Senior 6" {{ $editData['0']->class == 'Senior 6' ? 'selected' : ''  }}>Senior 6</option>
    
    </select>
</div>
</div>



</div> <!-- end 2nd row  -->







@foreach($editData as $edit)
<div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
<div class="row">

<div class="col-md-4">
<div class="form-group">
<label>Student Subject <span style="color:red;">*</span></label>
<select name="subject_id[]" required="" class="form-control select2">
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
</div> <!-- end col md 4 -->


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