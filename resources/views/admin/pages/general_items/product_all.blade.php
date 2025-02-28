@extends('admin.body.master')
@section('admin')


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Products Management</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Products </li>
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
<h3 class="card-title"> Products List </h3>

<a href="{{ route('create.product') }}" class="btn btn-info btn-rounded " style="float:right;"><i class="fas fa-plus-circle"> Add Product </i></a>


</div>

<div class="card-body">
<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th>Name</th> 
<th>Category</th> 
<th>Action</th>
</tr>
</thead>
<tbody>

    @foreach($product as $key => $item)
    <tr>

    <td> {{ $item->name }} </td> 
    <td> {{ $item['category']['name'] }} </td> 


    <td>

    <a href="{{ route('edit.product',$item->id) }}" class="btn btn-info sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>

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
