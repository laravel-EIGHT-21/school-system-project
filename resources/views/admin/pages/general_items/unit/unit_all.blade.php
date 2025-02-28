@extends('admin.admin_master')
@section('admin')

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Product Units Management</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Units Details</li>
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
<h3 class="card-title"> Units List </h3>


<a href="{{ route('create.units') }}" class="btn btn-info btn-rounded " style="float:right;"><i class="fas fa-plus-circle"> Add Unit </i></a>


</div>

<div class="card-body">
<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th>Sl</th>
<th>Name</th> 
<th width="20%">Action</th>

</thead>


<tbody>

@foreach($units as $key => $item)
<tr>
<td> {{ $key+1}} </td>
<td> {{ $item->name }} </td>  
<td>
<a href="{{ route('edit.units',$item->id) }}" class="btn btn-info sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>

<a href="{{ route('units.delete',$item->id) }}" class="btn btn-danger sm" title="Delete Details" id="delete">  <i class="fas fa-trash-alt"></i> </a>

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





@endsection
