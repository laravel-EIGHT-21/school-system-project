
@extends('admin.body.master')
@section('admin')



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Update Grade Marks</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Grade Marks </li>
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
            <h3 class="card-title"><b>Update Grade Marks Details</b></h3>


          </div>
          <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-12 col-md-offset-1">
     
<form method="post" action="{{ route('update.marks.grade',$editData->id) }}"  >
	 	@csrf
             <div class="row"> <!-- start 2nd row  -->
    
<div class="col-md-6">
<div class="form-group">
<label>Grade Name <span style="color:red;">*</span></label>
<input class="form-control" type="text" name="grade_name" autocomplete="off"  required value="{{ $editData->grade_name }}" />
@error('grade_name') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
</div>
</div> <!-- end col md 4 -->


<div class="col-md-6">
<div class="form-group">
<label>Numerical Grade <span style="color:red;">*</span></label>
<input class="form-control" type="text" name="numeric_grade" autocomplete="off"  required  value="{{ $editData->numeric_grade }}"/>
@error('numeric_grade') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
</div>
</div> <!-- end col md 4 -->






</div> <!-- end 2nd row  -->


<div class="row"> <!-- start 2nd row  -->
    

<div class="col-md-6">
<div class="form-group">
<label>Start Marks <span style="color:red;">*</span></label>
<input class="form-control" type="text" name="start_marks" autocomplete="off"  required value="{{ $editData->start_marks }}" />
@error('start_marks') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
</div>
</div> <!-- end col md 4 -->

    <div class="col-md-6">
    <div class="form-group">
    <label>End Marks <span style="color:red;">*</span></label>
    <input class="form-control" type="text" name="end_marks" autocomplete="off"  required value="{{ $editData->end_marks }}" />
    @error('end_marks') 
         <span class="text-danger">{{ $message }}</span>
         @enderror
    </div>
    </div> <!-- end col md 4 -->
    

    
    </div> <!-- end 2nd row  -->

    <div class="row"> <!-- start 2nd row  -->
    


    <div class="col-md-6">
    <div class="form-group">
    <label>Remarks <span style="color:red;">*</span></label>
    <input class="form-control" type="text" name="remarks" autocomplete="off"  required  value="{{ $editData->remarks }}"/>
    @error('remarks') 
         <span class="text-danger">{{ $message }}</span>
         @enderror
    </div>
    </div> <!-- end col md 4 -->
    </div> 


<button type="submit"  class="btn btn-rounded btn-primary ">Update Grade Mark </button>

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



 



@endsection