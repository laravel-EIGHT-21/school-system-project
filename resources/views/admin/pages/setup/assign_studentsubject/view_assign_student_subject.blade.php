
@extends('admin.body.master')
@section('admin')



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>



<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-12">
<h1> Assigned Student`s Subjects Management</h1>
</div>

</div>
</div>
</section>
<br><br>
<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-header">
<h3 class="card-title">Assign Subject List </h3>

@can('alevel-students-subjects-view')
<a href="{{ route('get.students.info') }}" style="float: right;" class="btn btn-rounded btn-success ">Get Student</a>		
@endcan	  


</div>

<div class="card-body">
<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th width="5%">SL</th>
<th>Student Name</th>
<th>ID No.</th>
<th>Class</th> 
<th width="15%">Action</th>
</tr>
</thead>
<tbody>
@foreach($allData as $key => $assign )
<tr>
<td>{{ $key+1 }}</td>
<td> {{ $assign['student']['name'] }}</td>	
<td> {{ $assign['student']['id_no'] }}</td>	
<td> {{ $assign->class }}</td>				 
<td>

@can('olevel-students-subjects-edit')
<a href="{{ route('assign.student.subject.edit',$assign->student_id ) }}" class="btn btn-info" title="Edit"><i class="fa fa-edit"></i></a>
@endcan

@can('olevel-students-subjects-details')
<a href="{{ route('assign.student.subject.details',$assign->student_id ) }}" class="btn btn-success" title="Details"><i class="fa fa-book"></i></a>
@endcan

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
