@extends('admin.body.master')
@section('admin')



@section('title')
Employees` Monthly Salaries Report 
@endsection



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>



<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Employees` Monthly Salary </h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Employees` Salary </li>
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
<h3 class="card-title"> Employees` Monthly Salary List </h3>

@can('account-salary-create')
<a href="{{ route('account.salary.add') }}" class="btn btn-success" style="float: right;">Add Employee Salary</a>
@endcan

</div>

<div class="card-body">

<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th width="2%">SL</th>  
<th>Name </th>
<th>Designation </th>
<th>Salary</th>
<th>Picked</th>
<th>Left</th>
<th>Month</th> 
<th>Action</th> 
</tr>
</thead>
<tbody>
@foreach($allData as $key => $value )
<tr>
<td>{{ $key+1 }}</td>	
<td> {{ $value['user']['name'] }}</td>	
<td>{{ $value['user']['designation']['name'] }}</td>


@php 

$subtotal=$value->amount;
@endphp

<td> {{round($subtotal,0)}}</td>
<td> {{ $value->salary_amount_picked }}</td>
<td> {{ $value->salary_amount_left }}</td>	 
<td> {{ $value->month }}</td>

<td>

@can('account-salary-view')
<a title="Salary Details" target="_blank" href="{{ route('account.salary.details',$value->id) }}" class="btn-sm btn-warning"><i class="fas fa-money-bill"></i></a>
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
