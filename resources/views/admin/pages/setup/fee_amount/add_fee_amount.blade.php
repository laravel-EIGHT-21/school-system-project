
@extends('admin.body.master')
@section('admin')



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Add New Fee Amount</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Fee Amount </li>
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
            <h3 class="card-title"><b> Fee Amount Details</b></h3>

			
<a href="{{ route('fee.amount.view')}}" class="btn rounded-pill btn-warning" style="float:right;"><i class='fas fa-angle-double-left'></i>Back</a>


          </div>
          <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-12 col-md-offset-1">

<form method="post" action="{{ route('store.fee.amount') }}">
	 	@csrf
     <div class="add_item">
             <div class="row"> <!-- start 2nd row  -->
    
<div class="col-md-6">
<div class="form-group">
<label>Fee Category <span style="color:red;">*</span></label>
<select name="fee_category_id" required="" class="form-control select2">
<option value="" selected="" disabled="">Select Fee Category</option>
@foreach($fee_categories as $category)
<option value="{{ $category->id }}">{{ $category->name }}</option>
@endforeach	 
</select>     
</div>
</div> <!-- end col md 4 -->

</div> <!-- end 2nd row  -->


<div class="row">

<div class="col-md-3">
<div class="form-group">
<label>Class <span style="color:red;">*</span></label>
<select name="class[]" required="" class="form-control">
	<option value="">Select Class</option>
	<option value="Senior 1">Senior 1</option>
	<option value="Senior 2">Senior 2</option>
	<option value="Senior 3">Senior 3</option>
	<option value="Senior 4">Senior 4</option>
	<option value="Senior 5">Senior 5</option>
	<option value="Senior 6">Senior 6</option> 
</select>
</div>
</div> <!-- end col md 4 -->

<div class="col-md-3">
<div class="form-group">
<label>Day/Boarding Section <span style="color:red;">*</span></label>
<select name="day_boarding[]" required class="form-control select2" >
<option value="" selected="" disabled="">Select Section(Day/Boarding)</option>
<option value="Day">Day </option>
<option value="Boarding">Boarding </option>


</select>
</div>
</div> <!-- end col md 4 -->

<div class="col-md-3">
<div class="form-group">
<label>Amount <span style="color:red;">*</span></label>
<input type="text" name="amount[]" class="form-control" > 
 
</div>

</div>


<div class="col-md-2" style="padding-top: 25px;">
 <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i> </span>    		
     	</div><!-- End col-md-5 -->

</div>


</div>


<button type="submit"  class="btn btn-rounded btn-primary mb-5">Add New Fee Category Amount </button>



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

	<div class="col-md-3">
     	     		
   <div class="form-group">
	<h6>Student Class <span class="text-danger">*</span></h6>
	<div class="controls">
	 <select name="class[]" required="" class="form-control">
		<option value="">Select Class</option>
		<option value="Senior 1">Senior 1</option>
		<option value="Senior 2">Senior 2</option>
		<option value="Senior 3">Senior 3</option>
		<option value="Senior 4">Senior 4</option>
		<option value="Senior 5">Senior 5</option>
		<option value="Senior 6">Senior 6</option>
		</select>
	 </div>
          </div> <!-- // end form group -->
     	</div> <!-- End col-md-5 -->

		
<div class="col-md-3">
	<div class="form-group">
		<h6>Day/Boarding Section <span class="text-danger">*</span></h6>
		<div class="controls">
	<select name="day_boarding[]" required class="form-control" >
		<option value="" selected="" disabled="">Select Section(Day/Boarding)</option>
		<option value="Day">Day </option>
		<option value="Boarding">Boarding </option>

		</select>
	</div>
	</div>
	</div> <!-- end col md 4 -->

     	<div class="col-md-3">
     		
      <div class="form-group">
		<h6>Amount <span class="text-danger">*</span></h6>
		<div class="controls">
	 <input type="text" name="amount[]" class="form-control" > 
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