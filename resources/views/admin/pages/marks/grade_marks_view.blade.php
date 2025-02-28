
@extends('admin.body.master')
@section('admin')



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Grade Marks Management</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Grade Marks Details </li>
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
<h3 class="card-title"> Grade Marks List </h3>


<a href="{{ route('marks.grade.add') }}" class="btn btn-success" style="float: right;">Add Grade Marks</a>



</div>

<div class="card-body">

<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th>SL</th>  
<th>Grade Name</th> 
<th>Numeric Grade</th> 
<th>Start Marks</th>
<th>End Marks </th>
<th>Remarks</th>
<th width="15%">Action</th>
</tr>
</thead>
<tbody>
@foreach($allData as $key => $value )
<tr>
<td>{{ $key+1 }}</td>
<td> {{ $value->grade_name }}</td>	
<td> {{ $value->numeric_grade }}</td>
<td> {{ $value->start_marks }}</td>	
<td> {{ $value->end_marks }}</td>	
<td> {{ $value->remarks }}</td>

<td>


<a href="{{ route('marks.grade.edit',$value->id) }}" class="btn btn-sm btn-success" title="Edit"><i class="fa fa-edit"></i></a>



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
