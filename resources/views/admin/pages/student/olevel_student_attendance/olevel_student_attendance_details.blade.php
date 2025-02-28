@extends('admin.admin_master')
@section('admin')

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-9">
<h1>O-Level Student`s Attendance Management</h1>
</div>


</div>
</div>
</section>


<section class="content">
<div class="container-fluid">

<div class="row"> 
<div class="col-12">
<div class="card">
<div class="card-header">
<h3 class="card-title">O-Level Students` Attendance Details </h3>

</div>

<div class="card-body">

<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th>Date</th>
<th>Student</th>
<th>Year</th> 
<th>Class</th>  
<th>Term</th> 
<th>Session</th> 
<th>Subject</th> 
<th>Teacher</th> 
<th>Attendance</th>	
<th>Edit</th>			
</tr>
</thead>
<tbody>
@foreach($details as $key => $value )

<td> {{ $value->date }}</td>
<td> {{ $value['student']['name'] }}</td>	
<td> {{ $value['student_year']['name'] }}</td>	 
<td> {{ $value['student_class']['name'] }}</td>	
<td> {{ $value['school_term']['name'] }}</td>	
<td> {{ $value['session']['name']}}</td>
<td>  {{ $value['school_subject']['name'] }}</td>
<td>  {{ $value['user']['name'] }}</td>
<td> {{ $value->attend_status }}</td>
<td>

<a href="{{route('olevel.student.attendance.edit',$value->id)}}" class="btn btn-info btn-sm" title="Edit ">
        <i class="fa fa-eye"></i></a>

</td>
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
