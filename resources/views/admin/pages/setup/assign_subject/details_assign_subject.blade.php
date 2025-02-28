@extends('admin.admin_master')
@section('admin')

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-9">
<h1> Assign Subject Management (O-Level)</h1>
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
<h3 class="card-title">Assigned Subjects Details </h3>
<a href="{{ route('assign.subject.add') }}" style="float: right;" class="btn btn-rounded btn-success">  Assign Subject</a>			  
</div>

<div class="card-body">
<h4><strong>Assign Subject : </strong>{{ $detailsData['0']['student_class']['name'] }} </h4>
<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th width="5%">SL</th>  
<th width="20%">Subject</th> 
<th width="20%">Full Mark</th>
<th width="20%">Pass Mark</th>
<th width="20%">Subjective Mark</th>
</tr>
</thead>
<tbody>
@foreach($detailsData as $key => $detail )
<tr>
<td>{{ $key+1 }}</td>
<td> {{ $detail['school_subject']['name'] }}</td>				 
<td> {{ $detail->full_mark }}</td>
<td> {{ $detail->pass_mark }}</td>
<td> {{ $detail->subjective_mark }}</td>

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
