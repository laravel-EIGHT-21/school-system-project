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
<h5 class="card-title"> <strong> Employee Name :</strong> <b>{{ $details->name }}</b> &nbsp; &nbsp; <b> |  </b> &nbsp;&nbsp;  <strong> Designation :</strong> <b>{{ $details['designation']['name'] }}</b> &nbsp; &nbsp   </h5>

</div>

<div class="card-body">

<table class="table table-bordered table-striped">
<thead>
<tr>
<th>Previous Salary</th> 
<th>Increment Salary</th>
<th>New Salary</th>
<th>Effected Date</th>
</tr>
</thead>
<tbody>
@foreach($salary_log as $key => $log )
<tr>
<td> {{ $log->previous_salary }}</td>	
<td> {{ $log->increment_salary }}</td>	
<td> {{ $log->present_salary }}</td>	
<td> {{ $log->effected_date }}</td>		 

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
