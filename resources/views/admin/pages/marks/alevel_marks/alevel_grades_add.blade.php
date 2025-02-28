
@extends('admin.body.master')
@section('admin')



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Add Alevel Grade Points</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Alevel Grade Points </li>
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
            <h3 class="card-title"><b> Grade Points Details</b></h3>


          </div>
          <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-12 col-md-offset-1">

<form method="post" action="{{ route('store.points.entry.grade') }}"  >
	 	@csrf
             <div class="row"> <!-- start 2nd row  -->
    
<div class="col-md-4">
<div class="form-group">
<label>Letter Grade <span style="color:red;">*</span></label>
<input class="form-control" maxlength="1" type="text" name="grade_name" autocomplete="off"  required />
@error('grade_name') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
</div>
</div> <!-- end col md 4 -->


  
<div class="col-md-4">
<div class="form-group">
<label>Numerical Grade <span style="color:red;">*</span></label>
<input class="form-control" maxlength="1" type="text" name="grade_point" autocomplete="off"  required />
@error('grade_point') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
</div>
</div> <!-- end col md 4 -->



</div> <!-- end 2nd row  -->

    

<button type="submit"  class="btn btn-rounded btn-primary mb-5">Add Grade Points </button>

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