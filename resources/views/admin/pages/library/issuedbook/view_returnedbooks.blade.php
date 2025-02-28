@extends('admin.body.master')
@section('admin')



<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Returned Books List</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active"> Returned Books </li>
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
<h3 class="card-title">Returned Books List</h3>
<a href="{{ route('get.students.view') }}" class="btn btn-success" style="float: right;">Students</a>
</div>

<div class="card-body">
<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th>Returned Date </th>
<th>Student </th>
<th>Book </th>
<th>Day For Returning </th>
<th>Fine  </th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>
<tbody>
@foreach($return_books as $value)
<tr>
<td> {{ $value->return_date }}  </td>
<td> {{ $value['student']['name'] }}  </td>
<td> {{ $value['book']['name'] }}  </td>


<td width="5%"> {{$value->return_day}}</td>



<td>
@if($value->return_date <= $value->return_day)
<span class="badge badge-pill badge-success"><b> No Fine </b></span>
@else
<span class="badge badge-pill badge-danger"><b> Has To Pay Fine  </b></span>
@endif

</td>

<td> <span class="badge badge-pill badge-info"><b>{{ $value->issue_status }}</b> </span>  </td>

<td width="5%">
<a href="{{ route('issued.book.details',$value->id) }}" class="btn btn-sm btn-warning" title="View Details"><i class="fa fa-book"></i> </a>

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
