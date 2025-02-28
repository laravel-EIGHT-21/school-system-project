
@extends('admin.body.master')
@section('admin')



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Employee Attendance Management</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Employee Attendance Details </li>
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
<h3 class="card-title"> Employee Attendance Details </h3>

          
@can('employees-attend-view')
<a href="{{ route('employee.attendance.view') }}" style="float: right;" class="btn btn-rounded btn-success "> View All Attendance Details</a>
@endcan

</div>

<div class="card-body">

<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th width="5%">SL</th>  
<th>Name</th>
<th>Date </th>
<th>Attend Status</th>	
<th>Update</th>	
</tr>
</thead>
<tbody>
@foreach($details as $key => $value )
<tr>
<td>{{ $key+1 }}</td>
<td> {{ $value['user']['name'] }}</td>

<td> {{ $value->date }}</td>

<td>

      
  @if($value->attend_status === 'Present')
  <span class="badge badge-pill badge-success">PRESENT</span>
  @elseif($value->attend_status === 'Absent')
  <span class="badge badge-pill badge-danger">ABSENT</span>
  @elseif($value->attend_status === 'Leave')
  <span class="badge badge-pill badge-info">LEAVE</span>
  @elseif($value->attend_status === 'No Class')
  <span class="badge badge-pill badge-dark">NO CLASS</span>
  @endif




</td>

<td>
@can('employees-attend-edit')
<a href="{{ route('employee.attendance.edit',$value->id) }}" class="btn btn-info" title="Edit"><i class="fa fa-edit"></i></a>
@endcan</td>

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
