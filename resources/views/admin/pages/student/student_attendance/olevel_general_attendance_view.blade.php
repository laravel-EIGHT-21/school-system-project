@extends('admin.admin_master')
@section('admin')

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>O-Level Students` General  Attendance Management</h1> 
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">O-Level Students` Attendance  </li>
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
<h3 class="card-title">O-Level Students` General Attendance List </h3>
</div>


<div class="card-body">

<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th>Date</th>
<th>Year</th> 
<th>Class</th> 
<th>School Term</th> 
<th>Session</th> 
<th>Subject</th> 
<th>Teacher</th> 
<th width="10%">Action</th>
</tr>
</thead> 
<tbody>
@foreach($allData as $key => $value )
<tr> 
<td> {{ date('d-m-Y', strtotime($value->date)) }}</td> 
<td> {{ $value['student_year']['name'] }}</td>	
<td>  {{ $value['student_class']['name'] }}</td> 
<td>  {{ $value['school_term']['name'] }}</td>
<td> {{ $value['session']['name'] }}</td>	
<td>  {{ $value['school_subject']['name'] }}</td>
<td>  {{ $value['user']['name'] }}</td>
<td>

    <a href="{{route('olevel.attendance.details',$value->date)}}"class="btn btn-warning btn-sm" title="Details" >
    <i class="fa fa-book"></i></a>


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
