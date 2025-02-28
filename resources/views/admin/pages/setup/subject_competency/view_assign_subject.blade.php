
@extends('admin.body.master')
@section('admin')


@section('title')
Assign Subject Competencies
@endsection


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>



<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-8">
<h1><b> Assigned Subject Competencies </b></h1>
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
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-header">
<h3 class="card-title">Assigned Subject Competencies List </h3>


<a href="{{ route('subject.competency.add') }}" style="float: right;" class="btn btn-rounded btn-success "> Assign Subject Competencies</a>			  

</div>

<div class="card-body">
<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th width="5%">SL</th>
<th>Subjects</th> 

<th width="15%">Action</th>
</tr>
</thead>
<tbody>
@foreach($allData as $key => $assign )
<tr>
<td>{{ $key+1 }}</td>
<td> {{ $assign['school_subject']['name'] }}</td>	
			 			 
<td>


<a href="{{ route('subject.competency.edit',$assign->subject_id) }}" class="btn btn-sm btn-info" title="Edit"><i class="fa fa-edit"></i></a>

<a href="{{ route('subject.competency.details',$assign->subject_id ) }}" class="btn btn-sm btn-warning" title="Edit" ><i class="fa fa-eye"></i></a>


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
