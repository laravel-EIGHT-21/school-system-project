
@extends('admin.body.master')
@section('admin')



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>



<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Lessons Schedules Management </h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Lessons Schedules </li>
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
<h3 class="card-title">Lessons Schedules List </h3>


<a href="{{ route('lessons.add') }}" style="float: right;" class="btn btn-rounded btn-success ">Add Lessons Schedule</a>	


</div>

<div class="card-body">
<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th width="5%">SL</th> 
<th>Class</th> 
<th>Term</th>
<th>Days</th>
<th width="20%">Action</th>
</tr>
</thead>
<tbody>
@foreach($allData as $key => $subject )
<tr>
<td>{{ $key+1 }}</td>
<td> {{ $subject->class }}</td>
<td> {{ $subject->term }}</td>	
<td> {{ $subject->day }}</td>		

<td>


<a href="{{ route('lessons.edit',$subject->lesson_id) }}" class="btn btn-sm btn-info" title="Edit"><i class="fa fa-edit"></i></a>


<a href="{{ route('lessons.details',$subject->lesson_id) }}" class="btn btn-sm btn-warning" title="View Details"><i class="fa fa-eye"></i></a>


<a href="{{ route('lessons.schedule',$subject->class) }}?class={{ $subject->class }}" class="btn btn-sm btn-success" target="_blank" title="View Schedule Details"><i class="fa fa-calendar"></i></a>

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
