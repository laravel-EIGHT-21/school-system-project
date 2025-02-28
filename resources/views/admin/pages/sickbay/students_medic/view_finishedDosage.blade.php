@extends('admin.body.master')
@section('admin')

@section('title')
Clinic Details
@endsection

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Completed Medications List</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active"> Medication List </li>
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
<h3 class="card-title">Completed Medications List</h3>
<a href="{{ route('get.students.medic') }}" class="btn btn-primary" style="float: right;">Students</a>
</div>

<div class="card-body">
<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
	<th>Clinic_No</th>
	<th> Date </th>
	<th>Student </th>
	<th>Class </th>
	<th>Term</th>
	<th>Year</th>
	<th>Medic Status</th>
	<th>Action</th>
</tr>
</thead>
<tbody>
	 @foreach($medic1_issued as $value)
	 <tr>
		<td> {{ $value->clinic_no}}  </td>
        <td> {{ $value->date }}  </td>
		<td> {{ $value['student']['name'] }}  </td>
		<td> {{ $value->class }}  </td>
		<td> {{ $value->term }}  </td>
        <td> {{ $value->year }}  </td>
		<td> <span class="badge badge-pill badge-success"><b>{{ $value->medic_status }}</b> </span>  </td>

		<td width="10%">
	 <a href="{{ route('medication.details',$value->clinic_no) }}" class="btn btn-warning" title="Medical Details"><i class="fa-solid fa-notes-medical"></i> </a>
 
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
