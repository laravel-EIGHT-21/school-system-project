@extends('admin.body.master')
@section('admin')


@section('title')
Employees Attendance Report
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-8">
<h1>Teaching-Staff Attendance Report</h1>
</div>
<div class="col-sm-4">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Attendance Report </li>
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
            <h3 class="card-title">Manage <strong>Teaching-Staff Attendance Monthly Report</strong></h3>


          </div>
          <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-12 ">

<form method="GET" action="{{ route('report.attendance.get') }}" target="_blank">
			@csrf
             <div class="row"> <!-- start 2nd row  -->
    
<div class="col-md-6">
<div class="form-group">
<label>Teacher Name<span class="text-danger"></span></label>
<select name="user_id" id="user_id" required="" class="form-control select2">
<option value="" selected="" disabled="">Select Teacher</option>
@foreach($employees as $employee)
<option value="{{ $employee->id }}" >{{ $employee->name }}</option>
@endforeach

</select>
</div>
</div> <!-- end col md 4 -->


<div class="col-md-6">
<div class="form-group">
<label>Select Month <span class="text-danger"></span></label>
<input type="month" name="month" class="form-control" required="" > 
</div>		 
</div>



<div class="col-md-4" style="padding-top: 30px;">
<input type="submit" class="btn btn-rounded btn-info"  value="Search">

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
