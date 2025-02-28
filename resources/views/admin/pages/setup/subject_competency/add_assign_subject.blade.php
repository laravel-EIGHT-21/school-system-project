
@extends('admin.body.master')
@section('admin')


@section('title')
Assign Subject Competencies
@endsection


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-8">
<h1><b> Assign Subject Competencies</b></h1>
</div>
<div class="col-sm-4">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active"> Subject Competencies </li>
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
            <h3 class="card-title"><b> Assign Assign Subject Competencies</b></h3>

<a href="{{ route('subject.competency.view') }}" style="float: right;" class="btn btn-rounded btn-success ">View All Details</a>			  

          </div>
          <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-12 col-md-offset-1">

<form method="post" action="{{ route('store.subject.competency') }}">
	 	@csrf    
         
         <div class="add_item">
             <div class="row"> 
                
             <!-- start 2nd row  -->
<div class="col-md-4">
<div class="form-group">
<label>Subject <span style="color:red;">*</span></label>
<select name="subject_id" required="" class="form-control select2" >
<option value="" selected="" disabled="">Select Subject</option>
@foreach($subjects as $category)
<option value="{{ $category->id }}">{{ $category->name }}</option>
@endforeach	 
</select>     
</div>
</div> <!-- end col md 4 -->


</div> <!-- end 2nd row  -->


<div class="row">

<div class="col-md-8">
 <div class="form-group"> 
<label>Subject Competency  <span style="color:red;">*</span></label>
<input type="text" name="competency[]" class="form-control" required > 
</div>
</div>


<div class="col-md-3" style="padding-top: 30px;">
 <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i> </span>    		
     	</div><!-- End col-md-5 -->


</div>

</div>


<button type="submit"  class="btn btn-rounded btn-primary mb-5">Assign Subject Competencies </button>
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


<div class="col-md-8">
 <div class="form-group"> 
<label>Subject Competency  <span style="color:red;">*</span></label>
<input type="text" name="competency[]" class="form-control" required > 
</div>
</div>

<div class="col-md-3" style="padding-top: 30px;">
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