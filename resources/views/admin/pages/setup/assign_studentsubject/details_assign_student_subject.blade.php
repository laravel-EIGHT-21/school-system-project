
@extends('admin.body.master')
@section('admin')



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<section class="content-header"> 
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-12">
<h1> Student`s Subjects Information</h1>
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
<h5 class="card-title"><b>Student Name : </strong>{{ $detailsData['0']['student']['name'] }} &nbsp;|&nbsp; ID: {{ $detailsData['0']['student']['id_no'] }} &nbsp;|&nbsp;Class: {{ $detailsData['0']['class'] }}</b> </h5>
&nbsp;

@can('olevel-students-subjects-get')
<a href="{{ route('assign.student.subject.view') }}" style="float: right;" class="btn btn-rounded btn-success ">Back</a>		
@endcan	  

</div>

<div class="card-body">
<table class="table table-bordered table-striped"> 
<thead>
<tr>
<th width="5%">SL</th>  
<th width="20%">Subject Name</th>  
</tr>
</thead>
<tbody>
@foreach($detailsData as $key => $detail )
<tr>
<td>{{ $key+1 }}</td>			 
<td> {{ $detail['school_subject']['name'] }}</td>
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
