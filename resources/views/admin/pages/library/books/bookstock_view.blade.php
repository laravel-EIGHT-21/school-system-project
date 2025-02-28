@extends('admin.body.master')
@section('admin')

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Book Stock Purchase Management</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Books` Stock Details </li>
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
<h3 class="card-title">Books Stock Purchases  </h3>
<a href="{{ route('add.bookstock') }}" class="btn btn-success" style="float: right;">Add New Book Purchase</a>
</div>

<div class="card-body">

<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>

<th>Invoice_no</th> 
<th>Book </th> 
<th>Quantity</th>
<th>Supplier</th>
<th>Total Px</th>
<th> Date</th>

<th>Status</th> 

<th>Action</th>
</tr>
</thead> 
<tbody>
@foreach($allData as $key => $value )
<tr> 

<td> {{ $value->invoice_no }}</td>
<td> {{ $value['book']['name'] }}</td>	
<td> {{ $value->book_qty }}</td>

<td> {{ $value->supplier}}</td>

<td>{{ $value->buying_price}}</td>
<td> {{ $value->purchase_date }}</td>

<td> 
@if($value->status == '0')
<span class="btn btn-warning">Pending</span>
@elseif($value->status == '1')
<span class="btn btn-success">Approved</span>
@endif 
</td> 

<td>  
@if($value->status == '0')
<a href="{{ route('bookstock.delete',$value->id) }}" class="btn btn-danger btn-sm" title="Delete" id="delete">  <i class="fas fa-trash-alt"></i> </a>
@endif
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
