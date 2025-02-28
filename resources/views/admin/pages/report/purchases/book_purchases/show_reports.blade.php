@extends('admin.admin_master')
@section('admin')

@section('title')
Book Purchases Report
@endsection

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>School Book Purchases </h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active"> Book Purchases </li>
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
<h3 class="card-title">Book Purchases Records</h3>
</div>

<div class="card-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th>Book Name</th> 
<th>Quantity</th>
<th>Unit Price</th>
<th>Total Price</th>
<th>Supplier</th>
<th>Purchase Date</th>
<th>Purchase Month</th>
<th>Invoice</th>
</tr>
</thead>
<tbody>
	
	 @foreach($issued_books as $value)
	 <tr>
	 <td> {{ $value['book']['name'] }}</td>	
<td> {{ $value->book_qty }}</td>
<td> {{ $value->unit_price }}</td>


@php 
$qty = $value->book_qty;

$unit = $value->unit_price;

$total = (float)$qty*(float)$unit;

@endphp

<td> {{ $total }}</td>

<td> {{ $value['supplier']['name']}}</td>

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
