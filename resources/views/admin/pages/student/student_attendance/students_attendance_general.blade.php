
@extends('admin.body.master')
@section('admin')


@section('title')
Students General Attendance
@endsection


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-8">
<h1> Student Attendance Information</h1>
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



        <br>

<div class="row"> 
<div class="col-12">
<div class="card">
<div class="card-header">
<h3 class="card-title">Students Attendance  Information</h3>

</div>

<div class="card-body">

<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th>Name </th>
<th>Class </th>
<th>Term </th>
<th>Subject</th>
<th>Sessions</th>
<th>Attendance</th>
<th>Date</th> 

</tr>
</tr>
</thead>
<tbody>
@foreach($allData as $key => $value )
<tr>	
<td> {{ $value['student']['name'] }}</td>	
<td> {{ $value->class}}</td>	
<td> {{ $value->term}}</td>	
<td> {{ $value['school_subject']['name'] }}</td>
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
