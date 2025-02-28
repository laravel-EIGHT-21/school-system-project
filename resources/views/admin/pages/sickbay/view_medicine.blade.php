@extends('admin.body.master')
@section('admin')

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Medicine Management</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li> 
<li class="breadcrumb-item active"> All Medicine Details </li>
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
<h3 class="card-title">Medicine <span class="badge badge-pill badge-danger">  {{ count($allData) }} </span></h3>
<a href="{{ route('add.medicine') }}" class="btn btn-success" style="float: right;">Add New Medicine</a>
</div>

<div class="card-body">

<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th>SL</th>  
<th>Name</th> 
<th>Medicine Category</th>

<th>Status</th>

<th>Action</th>
</tr>
</thead>
<tbody>
@foreach($allData as $key => $value )
<tr>
<td>{{ $key+1 }}</td>	
<td> {{ $value->name }}</td>	
<td> {{ $value['category']['name'] }}</td>			


<td>
@if($value->medical_status == 'Unavailable')
<span class="badge badge-pill badge-danger">Unavailable</span>
@elseif($value->medical_status == 'Available')
<span class="badge badge-pill badge-success">Available</span>
@elseif($value->medical_status == 'Low')
<span class="badge badge-pill badge-warning">Running Low</span>
@endif
 
</td>

<td width="10%">
<a href="{{route('edit.medicine',$value->id)}}" class="btn btn-info" title="Edit ">
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
