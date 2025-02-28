@extends('admin.body.master')
@section('admin')

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Recoverd Books Submitted </h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active"> Recoverd Books </li>
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
<h3 class="card-title">Recoverd Books Submitted List</h3>
<a href="{{ route('get.students.view') }}" class="btn btn-success" style="float: right;">Students</a>
</div>

<div class="card-body">
<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th>Issued Date </th>
<th>Student </th>
<th>Class </th>
<th>term </th>
<th>Book</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>
<tbody>
	 @foreach($issued_books as $value)
	 <tr>
        <td> {{ $value->issue_date }}  </td>
		<td> {{ $value['student']['name'] }}  </td> 
		<td> {{ $value->class }}  </td>
		<td> {{ $value->term }}  </td>
        <td> {{ $value['book']['name'] }}  </td>
		<td> <span class="badge badge-pill badge-info"><b>{{ $value->issue_status }}</b> </span>  </td>

		<td width="10%">
	 <a href="{{ route('issued.book.details',$value->id) }}" class="btn btn-sm btn-info" title="Recovered Books Details"><i class="fa fa-book"></i> </a>

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
