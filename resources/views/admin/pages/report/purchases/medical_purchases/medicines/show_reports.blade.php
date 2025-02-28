@extends('admin.body.master')
@section('admin')


@section('title')
Medicines Purchases Report
@endsection



<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Medicines Purchases Records</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active"> Medicines Purchases </li>
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
<h3 class="card-title">Medicines Purchases Records</h3>
</div>

<div class="card-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th> Name</th> 
<th>Quantity</th>
<th>Exp_Date</th>
<th>Supplier</th>
<th>Unit Px.</th>
<th>Total Px.</th>
<th>Purchase Date</th>
<th>Purchase Month </th>
<th>Invoice </th>
</tr>
</thead>
<tbody>
	
	 @foreach($visitor_log as $value)
	 <tr>

	 <td> {{ $value['medicine']['name'] }}</td>
<td> {{ $value->medicine_qty }} ({{$value->quantity_type}})</td>	

<td> {{ $value->expire_date}}</td>		
	
<td> {{ $value['supplier']['name']}}</td>

<td> {{ $value->unit_price }}</td>

@php 
$qty = $value->medicine_qty;

$unit = $value->unit_price;

$total = (float)$qty*(float)$unit;

@endphp

<td> {{ $total }}</td>

<td> {{ $value->purchase_date }}</td>

<td> {{ $value->purchase_month }}</td>

<td> {{ $value->invoice_no }}</td>

							 
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
