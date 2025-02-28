
@extends('admin.body.master')
@section('admin')


@section('title')
Students Fees Filtration Information
@endsection


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
 


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-8">
<h1>Students Fees Filtration Information</h1>
</div>
<div class="col-sm-4">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active"> Fees Filtration </li>
</ol>
</div>
</div>
</div>
</section>


<section class="content">
<div class="container-fluid">
<div class="row">

<div class="col-12 ">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title"><b>Students` Search</b></h3>

            @can('students-fees-get')
<a href="{{ route('get.student.fee') }}" class="btn btn-success" style="float: right;"> New Fees Collection </a>
@endcan


          </div>
          <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-12 ">

<form method="POST" action="{{ route('student.fees.filter') }}" target="_blank">
@csrf
             <div class="row"> <!-- start 2nd row  -->
    
<div class="col-md-2">
<div class="form-group">
<label>Year <span class="text-danger"></span></label>
<input type="text" name="year" class="form-control" required > 
</div>
</div> <!-- end col md 4 -->


<div class="col-md-2">
  <div class="form-group">
  <label>Class <span class="text-danger"></span></label>
  <select id="class" name="class" class="form-control select2" >
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


  <div class="col-md-2">
    <div class="form-group">
    <label> Term <span class="text-danger"></span></label>
    <select id="term" name="term" class="form-control select2" data-allow-clear="true">
      <option value="">Select Term</option>
      <option value="Term 1">Term 1 </option>
      <option value="Term 2">Term 2 </option>
      <option value="Term 3">Term 3 </option>
      </select>
    </div>
    </div> 




     
<div class="col-md-2">
<div class="form-group">
<label>Min Fee Amount </label>
<input type="text" name="fee_amount1" class="form-control" id="fee_amount1" > 
</div>
</div> <!-- end col md 4 -->

    
<div class="col-md-2">
<div class="form-group">
<label>Max Fee Amount</label>
<input type="text" name="fee_amount2" class="form-control" id="fee_amount2" > 
</div>
</div> <!-- end col md 4 -->


    



<div class="col-md-2" style="padding-top: 30px;">
<input type="submit" class="btn btn-rounded btn-info" name="search" value="Filter Fees">

</div> <!-- end col md 4 -->


<div class="col-md-2" style="padding-top: 30px;">

  <a href="{{ route('student.fee.filtration.view') }}" class="btn btn-success" >Reset</a>

  
  </div> <!-- end col md 4 -->


</div> <!-- end 2nd row  -->

 


                                    </form>
                            </div>
                        </div><!--End of row-->


                            </div>

							</div>

							</div>

                            </div><!--End of  main row-->

      

</div>

</section>
<br><br>



@endsection
