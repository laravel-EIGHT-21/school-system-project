@extends('admin.body.master')
@section('admin')

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Medicine Stock Purchase Management</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Medicine Stock Details </li>
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
<h3 class="card-title">Medicine Stock Purchases</h3>
<a href="{{ route('add.medicine.stock') }}" class="btn btn-success" style="float: right;">Add New Medicine Purchase</a>
</div>

<div class="card-body">

<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th> Invoice_No</th> 
<th> Name</th> 
<th>Quantity</th>
<th>Units</th>
<th>Supplier</th>
<th>Total Px.</th>
<th> Date</th>
<th>Validity </th>
<th>Action</th>
</tr>
</thead>
<tbody>
@foreach($allData as $key => $value )
<tr>

<td> {{ $value->invoice_no }} </td>	
<td> {{ $value['medicine']['name'] }}</td>
<td> {{ $value->medicine_qty }} </td>	

<td>{{ $value['unit']['name'] }} </td>

<td> {{ $value['supplier']['name']}}</td>


<td> {{ $value->buying_price }}</td>

<td> {{ $value->purchase_date }}</td>

<td>
@if($value->expire_date >= Carbon\Carbon::now()->format('Y-m-d'))
<span class="badge badge-pill badge-success"> Valid </span>
@else
<span class="badge badge-pill badge-danger"> Expired </span>
@endif

</td>

<td width="5%">
<a href="{{route('edit.medicine.stock',$value->id)}}" class="btn btn-info" title="Edit ">
<i class="fa fa-edit"></i></a>


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
