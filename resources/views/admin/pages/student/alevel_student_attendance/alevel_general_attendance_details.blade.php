@extends('admin.admin_master')
@section('admin')

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>A-Level Students` General Attendance Management</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">A-Level Students` Attendance Details </li>
</ol>
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
<h3 class="card-title">A-Level Students` General Attendance Details </h3>

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
</tr>
</thead>
<tbody>
@foreach($details as $key => $value )

<td> {{ $value->date }}</td>
<td> {{ $value['alevelstudent']['name'] }}</td>	
<td> {{ $value['student_year']['name'] }}</td>	 
<td> {{ $value['student_class']['name'] }}</td>	
<td> {{ $value['school_term']['name'] }}</td>	
<td> {{ $value['session']['name']}}</td>
<td>  {{ $value['school_subject']['name'] }}</td>
<td>  {{ $value['user']['name'] }}</td>
<td> {{ $value->attend_status }}</td>

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
