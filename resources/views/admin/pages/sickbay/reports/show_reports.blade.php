@extends('admin.body.master')
@section('admin')

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>School SickBay Records</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active"> SickBay </li>
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
<h3 class="card-title">SickBay Records</h3>
</div>

<div class="card-body">
<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th>Administered Date </th>
<th>Student Name </th> 
<th>Medicine Name </th>
<th>Start Date</th>
<th>End Date</th>
<th>Medic Status</th>
<th>Action</th>
</tr>
</thead>
<tbody>
	
	 @foreach($medic_issued as $value)
	 <tr>
        <td> {{ $value->date }}  </td>
		<td> {{ $value['student']['name'] }}  </td>
		<td> {{ $value['medicine']['name'] }}  </td>
        <td> {{ $value->start_date }}  </td>
        <td> {{ $value->end_date }}  </td>
		<td>
		@if($value->medic_status == 'On Medication')
		<span class="badge badge-pill badge-warning">On Medication </span> 
	
		@elseif($value->medic_status == 'Finished Medication')
		<span class="badge badge-pill badge-success">Finished Medication </span> 

		@endif
	</td>

        <td width="5%">
		<a href="{{ route('medication.details',$value->id) }}" class="btn btn-info" title="Details"><i class="fa fa-eye"></i> </a>

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
