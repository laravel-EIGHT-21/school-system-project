@extends('admin.admin_master')
@section('admin')

@section('title')
{{$employee_salary['0']['user']['name']}}`s Salary Monthly Report
@endsection


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Employee`s Salary Report</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active"> Employee`s Salary  </li>
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
<h3 class="card-title">Employee`s Salary Report Details </h3>
</div>

<div class="card-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>

<th scope="col" >Salary Amount</th>
<th scope="col" >Month</th>
</tr>

</thead>
<tbody>
	
	 @foreach($employee_salary as $key => $event)
	 <tr>
	
@php 

$subtotal=$event->amount;
@endphp

<td> {{round($subtotal,0)}}</td>


	 <td> {{ $event->month }}</td>
							 
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

@endsection
