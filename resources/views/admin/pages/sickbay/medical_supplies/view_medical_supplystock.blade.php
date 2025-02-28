@extends('admin.body.master')
@section('admin')

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1><b>Medical Supplies Stock Purchases</b></h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Medical Supplies Stock Details </li>
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
<h3 class="card-title">Medical Supplies Stock Purchases</h3>
<a href="{{ route('add.medical.supplies.stock') }}" class="btn btn-success" style="float: right;">Add New Medical Supply Purchase</a>
</div>

<div class="card-body">

<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th> Name</th> 
<th>Qty</th>
<th>Qty type</th>
<th>Supplier</th>
<th>Unit Px.</th>
<th>Total Px.</th>
<th>Date</th>
<th>Action</th>
</tr>
</thead>
<tbody>
@foreach($allData as $key => $value )
<tr>

<td> {{ $value['medic_supplies']['name'] }}</td>
<td> {{ $value->equipment_qty }} </td>	

<td> {{ $value->equipment_qty_type }} </td>	

<td> {{ $value->supplier}}</td>


<td>{{ $value->unit_price }} </td>

<td> {{ $value->buying_price }}</td>

<td> {{ $value->purchase_date }}</td>


<td width="5%">
<a href="{{route('edit.medical.supplies.stock',$value->id)}}" class="btn btn-sm btn-info" title="Edit ">
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
