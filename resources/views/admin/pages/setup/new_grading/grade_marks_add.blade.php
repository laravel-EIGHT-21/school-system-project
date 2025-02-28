
@extends('admin.body.master')
@section('admin')



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Add Competency Grade</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Competency Grade </li>
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
            <h3 class="card-title"><b> Competency Grade Details</b></h3>


          </div>
          <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-12 col-md-offset-1">

<form method="post" action="{{ route('store.competency.grades') }}"  >
	 	@csrf
             


<div class="row"> <!-- start 2nd row  -->
    

<div class="col-md-4">
<div class="form-group">
<label>Start Score <span style="color:red;">*</span></label>
<input class="form-control" type="text" name="score_start" autocomplete="off"  required />
@error('score_start') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
</div>
</div> <!-- end col md 4 -->



    <div class="col-md-4">
    <div class="form-group">
    <label>End Score <span style="color:red;">*</span></label>
    <input class="form-control" type="text" name="score_end" autocomplete="off"  required />
    @error('score_end') 
         <span class="text-danger">{{ $message }}</span>
         @enderror
    </div>
    </div> <!-- end col md 4 -->
    
    <div class="col-md-4">
    <div class="form-group">
    <label>Descriptor <span style="color:red;">*</span></label>
    <input class="form-control" type="text" name="descriptor" autocomplete="off"  required />
    @error('descriptor') 
         <span class="text-danger">{{ $message }}</span>
         @enderror
    </div>
    </div> <!-- end col md 4 -->


    
    
    </div> <!-- end 2nd row  -->

    <div class="row"> <!-- start 2nd row  -->


    <div class="col-md-6">
         <div class="form-group">
    <label >Remarks</label>
   
      <textarea name="remarks" id="" class="form-control" rows="2" required></textarea>

    </div>
  </div>
    


    </div> 
    

<button type="submit"  class="btn btn-rounded btn-primary mb-5">Add Competency Grade </button>

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