@extends('admin.body.master')
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
<a href="{{ route('add.book') }}" class="btn btn-success" style="float: right;">Add Book</a>
</div>

<div class="card-body">

<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
 
<th>Image</th>  
<th>Name</th> 
<th>Category</th>
<th>Author</th>
<th>Quantity</th>
<th>Stock</th>
<th>Status</th>

<th>Action</th>
</tr>
</thead>
<tbody>
@foreach($allData as $key => $value )
<tr>

<td>
<img src="{{ (!empty($value->image))? url('upload/book_images/'.$value->image):url('upload/no_image.jpg') }}" style="width: 60px; width: 60px;"> 
</td>	
<td> {{ $value->name }}</td>	
<td> {{ $value['category']['name'] }}</td>			
<td> {{ $value['author']['name'] }}</td>	


@php
$total_qty = App\Models\Books::where('author_id',$value->author_id)->where('category_id',$value->category_id)->where('id',$value->id)->sum('quantity');

@endphp

<td><span class="badge badge-pill badge-primary"> {{ $total_qty }} </span> </td>
<td>
@if($value->quantity > 0)
<span class="badge badge-pill badge-success">InStock</span>
@else
<span class="badge badge-pill badge-danger">StockOut</span>
@endif
</td>

<td>
@if($value->status == 1)
<span class="badge badge-pill badge-success">Active</span>
@else
<span class="badge badge-pill badge-danger">InActive</span>
@endif

</td>

<td width="18%">
<a href="{{route('edit.book',$value->id)}}" class="btn btn-info" title="Edit ">
<i class="fa fa-pencil"></i></a>

@if($value->status == 1)

<a href="{{ url('/inactive/book/'.$value->id) }}" class="btn btn-warning" title="Deactivate ">
<i class="fa fa-arrow-down"></i></a>
@else
<a href="{{ url('/active/book/'.$value->id) }}" class="btn btn-success" title="Activate ">
<i class="fa fa-arrow-up"></i></a>
@endif

<a href="{{ url('delete/book/'.$value->id)}}" class="btn btn-danger" id="delete" title="Delete Book ">
<i class="fa fa-trash"></i></a>

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
