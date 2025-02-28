@extends('admin.admin_master')
@section('admin')

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Issued Book Records</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active"> Issued Books </li>
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
<h3 class="card-title">Issued Books Records</h3>
</div>

<div class="card-body">
<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th>Issued Date </th>
<th>Returned Date </th>
<th>Student Name </th>
<th>Book Name </th> 
<th>Status </th>
<th>Action</th>
</tr>
</thead>
<tbody>
	 @foreach($issued_books as $item)
	 <tr>
		<td> {{ $item->issue_date }}  </td>
		<td> {{ $item->return_date }}  </td>
		<td> {{ $item['student']['name'] }}  </td>
		<td> {{ $item['book']['name'] }}  </td>

		<td>
		@if($item->issue_status == 'Issued')
		<span class="badge badge-pill badge-primary">Issued </span> 
	
		@elseif($item->issue_status == 'Returned All')
		<span class="badge badge-pill badge-success">Returned All </span> 

		@elseif($item->issue_status == 'Returned Less')
		<span class="badge badge-pill badge-danger">Returned Less </span> 

		@endif
	</td>

        <td width="5%">
<a href="{{ route('issued.book.details',$item->id) }}" class="btn btn-warning" title="Details"><i class="fa fa-eye"></i> </a>

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
