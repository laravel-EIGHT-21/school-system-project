@extends('admin.admin_master')
@section('admin')

@section('title')
Student`s General Fees 
@endsection


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-9">
<h1><b><span style="color:green;">{{$allData['student']['name']}}`s</span> General Fees Search</b></h1>
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
          <h3 class="card-title"> </h3>

          @can('students-fees-details')
<a href="{{ route('student.fees.details',$allData->id) }}" class="btn btn-success" style="float: right;">Back To Fees Details</a>
@endcan
          
        </div>
        <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-12 col-md-offset-1">

<form method="GET" action="{{ route('students.general.fees.details',$allData->student_id) }}">
			@csrf

	 	<input type="hidden" name="student_id" value="{{ $allData->student_id }}">

<div class="row">

<div class="col-4">
<div class="form-group">
<label>Student ID<span style="color:red;"></span></label>
<input type="text" name="id_no" class="form-control" readonly value="{{ $allData['student']['id_no'] }}" > 
	 </div>
   </div>


<div class="col-4">
<div class="form-group">
<label>Year <span style="color:red;">*</span></label>
<select name="year_id" id="year_id" class="form-control" readonly>
@foreach($years as $year)
<option readonly value="{{ $year->id }}" {{ ($allData->year_id == $year->id)? "selected":"" }}>{{ $year->name }}</option>
@endforeach

</select>
</div>
</div>


<div class="col-4">
<div class="form-group">
<label>Class <span style="color:red;">*</span></label>
<select name="class_id" id="class_id" class="form-control" readonly>
@foreach($classes as $class)
<option readonly value="{{ $class->id }}" {{ ($allData->class_id == $class->id)? "selected":"" }}>{{ $class->name }}</option>
@endforeach

</select>
</div>
</div>




   </div><!--End 1st Row-->




<button type="submit" class="btn btn-rounded btn-primary mb-5">Search Student`s Fees </button>

                                  </form>
                          </div>
                      </div>
                          </div>
                          </div>
                          </div>

</div>


      </div>

</section>


	  

@endsection