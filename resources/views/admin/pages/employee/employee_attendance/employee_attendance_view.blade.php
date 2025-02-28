
@extends('admin.body.master')
@section('admin')



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-8">
<h1>Employee Attendance Management</h1>
</div>
<div class="col-sm-4">
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
<h3 class="card-title"> Employee Attendance List </h3>

@can('employees-attend-create')
<a href="{{ route('employee.attendance.add') }}" style="float: right;" class="btn btn-rounded btn-success "> Add Attendance Info</a>
@endcan

</div>

<div class="card-body">

<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th width="5%">SL</th>  
<th>Date </th> 
<th width="10%">Action</th>
</tr> 
</thead>
<tbody>
@foreach($allData as $key => $value )
<tr>
<td>{{ $key+1 }}</td> 
<td> {{ $value->date }}</td> 

<td>


@can('employees-attend-details')
<a href="{{ route('employee.attendance.details',$value->date) }}" class="btn btn-info" title="Details"><i class="fa fa-eye"></i></a>
@endcan

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
