@extends('admin.admin_master')
@section('admin')

@section('title')
O-Level Attendance
@endsection


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-8">
<h1>O-Level Students Attendance Information</h1>
</div>
<div class="col-sm-4">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Students Attendance </li>
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
            <h3 class="card-title"><b>Students Attendance Search</b></h3>


          </div>
          <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-12 ">

@php
    $id = Auth::user()->id;
    $user = App\Models\User::find($id);
    $subject_id= App\Models\AssignSubjectTeacher::with(['school_subject'])->where('user_id',$id)->get();
    @endphp

<form method="GET" action="{{ route('olevel.students.general.attendance.info') }}">

             <div class="row"> <!-- start 2nd row  -->
    
<div class="col-md-3">
<div class="form-group">
<label>Year <span class="text-danger"></span></label>
<select name="year_id" required="" class="form-control">
<option value="" selected="" disabled="">Select Year</option>
@foreach($years as $year)
<option value="{{ $year->id }}" {{ (@$year_id == $year->id)? "selected":"" }} >{{ $year->name }}</option>
@endforeach
</select>
</div>
</div> <!-- end col md 4 -->


<div class="col-md-3">
<div class="form-group">
<label>Class <span class="text-danger"></span></label>
<select name="class_id"  required="" class="form-control">
<option value="" selected="" disabled="">Select Class</option>
@foreach($classes as $class)
<option value="{{ $class->id }}" {{ (@$class_id == $class->id)? "selected":"" }}>{{ $class->name }}</option>
@endforeach
</select>
</div>
</div> <!-- end col md 4 -->


<div class="col-md-3">
<div class="form-group">
<label> Term <span class="text-danger"></span></label>
<select name="term_id" id="term_id"  required="" class="form-control">
<option value="" selected="" disabled="">Select Term</option>
@foreach($terms as $term)
<option value="{{ $term->id }}" {{ (@$term_id == $term->id)? "selected":"" }}>{{ $term->name }}</option>
@endforeach
</select>
</div>
</div> 
 

<div class="col-md-3">
<div class="form-group">
<label>Subject Name <span class="text-danger"></span></label>
<select name="subject_id" id="subject_id"  required="" class="form-control">
<option  selected="" >Select Subject</option>
@foreach($subject_id as $subject)
<option value="{{ $subject->subject_id }}">{{ $subject['school_subject']['name']}}</option>
@endforeach
</select>
</div>
</div> <!-- end col md 4 -->


</div> <!-- End Col md 3 --> 



<div class="col-md-3" style="padding-top: 30px;">
<input type="submit" class="btn btn-rounded btn-info" name="search" value="Search Students Attendance ">

</div> <!-- end col md 4 -->


</div> <!-- end 2nd row  -->

 


                                    </form>
                            </div>
                        </div><!--End of row-->


                            </div>

							</div>

							</div>

                            </div><!--End of  main row-->

        <br>

<div class="row"> 
<div class="col-12">
<div class="card">
<div class="card-header">
<h3 class="card-title">O-Level Students Attendance  Information</h3>

</div>

<div class="card-body">

<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th>ID No</th> 
<th>Name </th>
<th>Sessions</th>
<th>Attendance</th>
<th>Date</th> 

</tr>
</tr>
</thead>
<tbody>
@foreach($allData as $key => $value )
<tr>
<td> {{ $value['student']['id_no'] }}</td>	
<td> {{ $value['student']['name'] }}</td>	
<td> {{ $value['session']['name'] }}</td>
<td> {{ $value->attend_status }}</td>

<td> {{$value->date}}</td>

</tr>
@endforeach

    
</tbody>              

</table>


</div>



</div>

</div>
</div>

</div>

</section>
<br><br>

@endsection
