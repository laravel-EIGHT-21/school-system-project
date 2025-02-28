@extends('admin.body.master')
@section('admin')

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Medicine Category List</h1> 
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Medicine Categories</li>
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
<h3 class="card-title">Medicine Category List<span class="badge badge-pill badge-danger"> {{ count($category) }} </span></h3>
</div>

<div class="card-body">
<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
    <th>id</th>
    <th>Category Name</th>
</tr>
</thead>

<tbody>
    @foreach($category as $item)
      <tr>
           <th scope="row">{{ $item->id}}</th>	
           <td>{{$item->name}}</td>

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
