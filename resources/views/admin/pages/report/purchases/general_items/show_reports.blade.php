@extends('admin.admin_master')
@section('admin')

@section('title')
 Purchased Stock Monthly Report By Term
@endsection


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-8">
<h1><b>School Purchased Stock Report details</b> </h1>
</div>
<div class="col-sm-4">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active"> Purchased Stock</li>
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
<h3 class="card-title"><b>Monthly Purchased Stocks Details</b></h3>
</div>

<div class="card-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th> Name</th> 
<th>Quantity</th>
<th>Supplier</th>
<th>Term</th>
<th>Unit Px.</th>
<th>Total Px.</th>
<th>Date</th>
<th> Month</th>
<th>Invoice</th>
</tr>
</thead>
<tbody>
	
	 @foreach($visitor_log as $value)
	 <tr>
	 <td> {{ $value['item']['name'] }}</td>
<td> {{ $value->item_qty }}</td>	

<td> {{ $value['supplier']['name']}}</td>
<td> {{ $value['term']['name'] }}</td>

<td> {{ $value->unit_price }}</td>

@php 
$qty = $value->item_qty;

$unit = $value->unit_price;

$total = (float)$qty*(float)$unit;

@endphp

<td> {{ $total }}</td>

<td> {{ $value->purchase_date }}</td>
<td> {{ $value->purchase_month }}</td>
<td> {{ $value->invoice_no}}</td>
							 
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
