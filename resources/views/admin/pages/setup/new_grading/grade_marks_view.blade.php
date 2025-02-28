
@extends('admin.body.master')
@section('admin')



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-8">
<h1>Competency Grading Management</h1>
</div>
<div class="col-sm-4">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Competency Grading Details </li>
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
<h3 class="card-title"> Competency Grading Details </h3>


<a href="{{ route('competency.grades.add') }}" class="btn btn-success" style="float: right;">Add Competency Grade</a>



</div>

<div class="card-body">

<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th>SL</th>  
<th>Score Range</th> 
<th>Remarks</th>
<th>Descriptor</th>
<th width="5%">Action</th>
</tr>
</thead>
<tbody>
@foreach($allData as $key => $value )
<tr>
<td>{{ $key+1 }}</td>
<td> {{ $value->score_start }} - {{ $value->score_end }}</td>	
<td> {{ $value->remarks }}</td>
<td> {{ $value->descriptor }}</td>

<td>


<a href="{{ route('competency.grades.edit',$value->id) }}" class="btn btn-sm btn-success" title="Edit"><i class="fa fa-edit"></i></a>



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
