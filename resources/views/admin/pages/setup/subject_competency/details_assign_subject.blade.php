
@extends('admin.body.master')
@section('admin')


@section('title')
Subject Competencies
@endsection


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>



<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-8">
<h1><b> Assigned Subject Competencies Details </b></h1>
</div>
<div class="col-sm-4">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active"> Subject Competencies  </li>
</ol>
</div>
</div>
</div>
</section>


<section class="content">
<div class="container-fluid">

    <br>
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-header">
<h3><strong> Subject : {{ $detailsData['0']['school_subject']['name'] }}   </strong> 


@can('subject-view')
<a href="{{ route('subject.competency.view') }}" class="btn btn-rounded btn-success" style="float: right;">View All Details</a>			  
@endcan

</h3>

		  
</div>

<div class="card-body">
<table class="table table-bordered table-striped">
<thead>
<tr>
<th>SL</th>  
<th>Competencies</th> 

</tr>
</thead>
<tbody>
@foreach($detailsData as $key => $detail )
<tr>
<td>{{ $key+1 }}</td>
<td> {{ $detail->competency}}</td>				 

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
