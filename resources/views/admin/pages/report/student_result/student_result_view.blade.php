@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Student Result Report </h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Results Report </li>
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

          <h4 class="card-title">Student <strong>Result Report</strong></h4>

          </div>
          <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-12 ">

<form method="GET" action="{{ route('report.student.result.get') }}" target="_blank">
			@csrf
             <div class="row"> <!-- start 2nd row  -->
    
<div class="col-md-3">
<div class="form-group">
<label>Year <span class="text-danger"></span></label>
<select name="year_id" id="year_id" required="" class="form-control">
<option value="" selected="" disabled="">Select Year</option>
@foreach($years as $year)
<option value="{{ $year->id }}" >{{ $year->name }}</option>
@endforeach

</select>
</div>
</div> <!-- end col md 4 -->


<div class="col-md-3">
<div class="form-group">
<label>Class <span class="text-danger"></span></label>
<select name="class_id" id="class_id"  required="" class="form-control">
<option value="" selected="" disabled="">Select Class</option>
@foreach($classes as $class)
<option value="{{ $class->id }}">{{ $class->name }}</option>
@endforeach

</select>
</div>
</div> <!-- end col md 4 -->

<div class="col-md-3">
<div class="form-group">
<label>Exam Type<span class="text-danger"></span></label>
<select name="exam_type_id" id="exam_type_id"  required="" class="form-control">
<option value="" selected="" disabled="">Select Exam Type</option>
@foreach($exam_type as $exam)
<option value="{{ $exam->id }}">{{ $exam->name }}</option>
@endforeach

</select>
</div>
</div> <!-- end col md 4 -->



<div class="col-md-3" style="padding-top: 30px;">
<input type="submit" class="btn btn-rounded btn-info" value="Search">

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
