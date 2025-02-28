@extends('admin.body.master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1> Administer Medicine To Student </h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Medication Details</li>
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
          <h3 class="card-title"><b> Administer Medication to Student </b></h3>

          
        </div>
        <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-12 col-md-offset-1">
<form method="post" action="{{ route('store.student.medic',$allData->id) }}" enctype="multipart/form-data">
	 	@csrf
	 	<input type="hidden" name="student_id" value="{{ $allData->id }}">

         <div class="add_item">

<div class="row">
<div class="col-4">
<div class="form-group">
<label>Student Name<span style="color:red;">*</span></label>
<input type="text" name="name" class="form-control" required=""  value="{{ $allData->name }}" > 
	 </div>
   </div>

   <div class="col-4">
<div class="form-group">
<label>Student ID<span style="color:red;">*</span></label>
<input type="text" name="id_no" class="form-control" required=""  value="{{ $allData->id_no }}" > 
	 </div>
   </div>


   <div class="col-4">
    <div class="form-group">
    <label>Class<span style="color:red;">*</span></label>
    <select name="class" id="class"  required="" class="form-control">
      <option value="Senior 1" {{ $allData->class == 'Senior 1' ? 'selected' : ''  }} >Senior 1</option>
      <option value="Senior 2" {{ $allData->class == 'Senior 2' ? 'selected' : ''  }}>Senior 2</option>
      <option value="Senior 3" {{ $allData->class == 'Senior 3' ? 'selected' : ''  }}>Senior 3</option>
      <option value="Senior 4" {{ $allData->class == 'Senior 4' ? 'selected' : ''  }}>Senior 4</option>
      <option value="Senior 5" {{ $allData->class == 'Senior 5' ? 'selected' : ''  }}>Senior 5</option>
      <option value="Senior 6" {{ $allData->class == 'Senior 6' ? 'selected' : ''  }}>Senior 6</option>
      
      </select>
    </div>
    </div>
  


   </div><!--End 1st Row-->



  <!-- 2nd Row -->
  <div class="row">

    <div class="col-md-6">
      <div class="form-group">
      <label>Term<span style="color:red;">*</span></label> 
      <select name="term"  required="" class="form-control">
      <option value="Term 1" {{ $allData->term == 'Term 1' ? 'selected' : ''  }} >Term 1</option>
      <option value="Term 2" {{ $allData->term == 'Term 2' ? 'selected' : ''  }}>Term 2</option>
      <option value="Term 3" {{ $allData->term == 'Term 3' ? 'selected' : ''  }}>Term 3</option>
      
          
          </select>
      </div>
      </div> <!-- end col md 4 -->
      
  

<div class="col-6">
<div class="form-group">
<label>Illness(Disease)<span style="color:red;">*</span></label>
<input type="text" name="illness" class="form-control" required=""  > 
@error('illness') 
<span class="text-danger">{{ $message }}</span>
@enderror 
	 </div>
   </div>





    </div><!--End 2nd Row--> 


    
<div class="row">



<div class="col-6">
   <div class="pull-left mr-10">
    <label>From Date:</label>
    <input type="date" name="start_date" class="form-control" required="">
    </div>
   </div>

    <div class="col-6">
    <div class="pull-left mr-10">
    <label>End Date:</label>
    <input type="date" name="end_date" class="form-control"  required="">
    </div>
    </div>


</div>

<br />


<hr>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>Medical Diagnostics</label>
<textarea id="editor1" name="diagnostics" rows="10" cols="80" required="">

</textarea>

</div>

</div>

</div>

<br />

<hr>

    
    <div class="row"> 



    <div class="col-4">
<div class="form-group">
<label>Medicine <span style="color:red;">*</span></label>
<select name="medicine_id[]" required="" class="form-control">
<option value="" selected="" disabled="">Select Medicine</option>
@foreach($medicines as $med)
<option value="{{ $med->id }}">{{ $med->name }}</option>
@endforeach
</select> 
</div>
</div>


<div class="col-4">
<div class="form-group">
<label>Medication Dosage<span style="color:red;">*</span></label>
<input type="text" name="dosage[]" class="form-control" required=""  > 
@error('dosage') 
<span class="text-danger">{{ $message }}</span>
@enderror 
	 </div>
   </div>



   <div class="col-md-2" style="padding-top: 25px;">
 <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i> </span>    		
     	</div><!-- End col-md-5 -->


</div>



         </div>

<button type="submit" class="btn btn-rounded btn-info mb-5"> Administer Medicine to Student</button>

                                  </form>
                          </div>
                      </div>
                          </div>
                          </div>
                          </div>

</div>


      </div>

</section>




<div style="visibility: hidden;">
<div class="whole_extra_item_add" id="whole_extra_item_add">
<div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
<div class="form-row">

<div class="col-md-4">
<div class="form-group">
<label>Medicine <span style="color:red;">*</span></label>
<select name="medicine_id[]" required="" class="form-control">
<option value="" selected="" disabled="">Select Medicine</option>
@foreach($medicines as $med)
<option value="{{ $med->id }}">{{ $med->name }}</option>
@endforeach
</select> 
</div>
</div>

<div class="col-4">
<div class="form-group">
<label>Medication Dosage<span style="color:red;">*</span></label>
<input type="text" name="dosage[]" class="form-control" required=""  > 
@error('dosage') 
<span class="text-danger">{{ $message }}</span>
@enderror 
	 </div>
   </div>



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