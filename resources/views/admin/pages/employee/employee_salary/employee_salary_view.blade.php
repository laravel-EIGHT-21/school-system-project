@extends('admin.admin_master')
@section('admin')

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Employee Salary Management</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Employee Salary Details </li>
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
<h3 class="card-title"> Employee Salary List </h3>

</div>

<div class="card-body">

<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th width="5%">SL</th>  
<th>Name</th> 
<th>Mobile</th>
<th>Gender</th>
<th>Join Date</th>
<th>Salary</th>
<th width="20%">Action</th>
</tr>
</thead>
<tbody>
@foreach($allData as $key => $value )
<tr>
<td>{{ $key+1 }}</td>
<td> {{ $value->name }}</td>		
<td> {{ $value->mobile }}</td>	
<td> {{ $value->gender }}</td>	
<td> {{ date('d-m-Y',strtotime($value->join_date))  }}</td>	
<td> {{ $value->salary }}</td>

<td>
@can('employees-salary-incre')
<a title="Increment" href="{{ route('employee.salary.increment',$value->id) }}" class="btn btn-info"> <i class="fa fa-plus-circle"></i></a>
@endcan

@can('employees-salary-details')
<a title="Details" target="_blank" href="{{ route('employee.salary.details',$value->id) }}" class="btn btn-danger"><i class="fa fa-eye"></i></a>
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
