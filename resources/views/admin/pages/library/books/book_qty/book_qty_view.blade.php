@extends('admin.admin_master')
@section('admin')

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Book Quantity Management</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Book Quantity Details </li>
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
<h3 class="card-title"> Book Quantity List </h3>

</div>

<div class="card-body">

<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th width="5%">SL</th>  
<th>Book Name</th> 
<th>Category</th>
<th>Author(s)</th>
<th>Edition</th>
<th>Added Date</th>
<th>QTY</th>
<th width="20%">Action</th>
</tr>
</thead>
<tbody>
@foreach($allData as $key => $value )
<tr>
<td>{{ $key+1 }}</td>
<td> {{ $value->name }}</td>
<td> {{ $value['category']['name'] }}</td>			
<td> {{ $value['author']['name'] }}</td>	
<td> {{ $value->book_edition }}</td>	
<td> {{ date('d-m-Y',strtotime($value->add_date))  }}</td>	
<td> {{ $value->quantity }}</td>

<td>
<a title="Increment" href="{{ route('book.quantity.increment',$value->id) }}" class="btn btn-info"> <i class="fa fa-plus-circle"></i></a>

<a title="Details" target="_blank" href="{{ route('book.quantity.details',$value->id) }}" class="btn btn-danger"><i class="fa fa-eye"></i></a>

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
