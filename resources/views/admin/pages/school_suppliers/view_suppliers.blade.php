@extends('admin.admin_master')
@section('admin')

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>School Suppliers Management</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li> 
<li class="breadcrumb-item active"> All Supplier Details </li>
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
<h3 class="card-title">School Supplier List<span class="badge badge-pill badge-danger">  {{ count($allData) }} </span></h3>
<a href="{{ route('add.school.supplier') }}" class="btn btn-success" style="float: right;">Add New Supplier</a>
</div>

<div class="card-body">

<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th>SL</th>  
<th>Name</th> 
<th>Phone</th>
<th>Email</th>
<th>Address</th>
<th>Product</th>

<th>Action</th>
</tr>
</thead>
<tbody>
@foreach($allData as $key => $value )
<tr>
<td>{{ $key+1 }}</td>	
<td> {{ $value->name }}</td>	
<td> {{ $value->phone }}</td>			
<td> {{ $value->email }}</td>	
<td> {{ $value->address }}</td>
<td> {{ $value->products }}</td>	

<td width="5%">
<a href="{{route('edit.school.supplier',$value->id)}}" class="btn btn-info" title="Edit ">
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
