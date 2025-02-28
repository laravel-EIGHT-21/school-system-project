@extends('admin.admin_master')
@section('admin')

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1> Stock-Taking Management </h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">StockTaking Details </li>
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
<h3 class="card-title">All StockTaking Details</h3>
<a href="{{ route('add.general.itemstock.take') }}" class="btn btn-success" style="float: right;">Add New General Item StockTake</a>
</div>

<div class="card-body">

<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th>Date</th>
<th>Name</th> 
<th>Term</th>
<th>Year</th>
<th>Total</th>
<th>Good Cond.</th>
<th>Bad Cond.</th>

<th>Action</th>
</tr>
</thead>
<tbody>
@foreach($allData as $key => $value )
<tr>

<td> {{ $value->stock_take_date }}</td>
<td> {{ $value['item']['name'] }}</td>
<td> {{ $value['term']['name'] }}</td>	
<td> {{ $value->stock_take_year}}</td>
<td><span class="btn btn-success"> {{ $value['item']['quantity'] }}</span> </td>
<td> <span class="btn btn-warning"> {{ $value->good_cond }}</span> </td>
<td> <span class="btn btn-danger"> {{ $value->bad_cond }} </span> </td>


<td width="5%">
<a href="{{route('edit.general.itemstock.take',$value->id)}}" class="btn btn-info" title="Edit ">
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
