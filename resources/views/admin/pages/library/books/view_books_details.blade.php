@extends('admin.admin_master')
@section('admin')

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Book Management</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Books` Details </li>
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
<h3 class="card-title">Book  <span class="badge badge-pill badge-danger">  {{ count($allData) }} </span></h3>

</div>

<div class="card-body">

<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th>SL</th> 
<th>Image</th>  
<th>Name</th> 
<th>Category</th>
<th>Author</th>
<th>Edition</th>
<th>Quantity</th>
<th>Stock</th>
<th>Status</th>

</tr>
</thead>
<tbody>
@foreach($allData as $key => $value )
<tr>
<td>{{ $key+1 }}</td>
<td>
<img src="{{ (!empty($value->image))? url('upload/book_images/'.$value->image):url('upload/no_image.jpg') }}" style="width: 60px; width: 60px;"> 
</td>	
<td> {{ $value->name }}</td>	
<td> {{ $value['category']['name'] }}</td>			
<td> {{ $value['author']['name'] }}</td>	
	
<td> {{ $value->quantity }}</td>
<td>
@if($value->quantity > 0)
<span class="badge badge-pill badge-info">InStock</span>
@else
<span class="badge badge-pill badge-warning">StockOut</span>
@endif
</td>

<td>
@if($value->status == 1)
<span class="badge badge-pill badge-success">Active</span>
@else
<span class="badge badge-pill badge-danger">InActive</span>
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
