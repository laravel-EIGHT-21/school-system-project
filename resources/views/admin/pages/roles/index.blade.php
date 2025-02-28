
@extends('admin.body.master')
@section('admin')



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-8">
<h1>User Roles Management</h1>
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
<h3 class="card-title">Roles<span class="badge badge-pill badge-danger"> {{ count($roles) }} </span></h3>


<a href="{{ route('roles.create') }}" class="btn btn-success" style="float: right;">Add New Role</a>

</div>

<div class="card-body">
<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th width="5%">SL</th>
<th scope="col">Role Name</th>
<th scope="col">Action</th>

</tr>
</thead>

<tbody>
@foreach($roles as $key => $item)
<tr>
<td>{{ $key+1 }}</td>
<td>
{{$item->name}}

</td>
<td width="25%">

<a href="{{route('role.show',$item->id)}}" class="btn btn-success btn-sm" title="Permissions ">
        <i class="fa fa-book"></i></a>


    <a href="{{route('role.edit',$item->id)}}" class="btn btn-info btn-sm" title="Edit ">
        <i class="fa fa-edit"></i></a>


        
    
    <a href="{{route('role.delete',$item->id)}}"class="btn btn-danger btn-sm" title="Delete" id="delete">
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




@endsection
