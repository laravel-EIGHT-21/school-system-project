@extends('admin.admin_master')
@section('admin')

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1> Assign Subjects Management</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Assign Subjects </li>
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
<h3 class="card-title">Assign Subject List </h3>
<a href="{{ route('assign.subject.add') }}" style="float: right;" class="btn btn-rounded btn-success "> Add Assign Subject</a>			  


</div>

<div class="card-body">
<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th width="5%">SL</th>
<th>Class Name</th> 
<th width="25%">Action</th>
</tr>
</thead>
<tbody>
@foreach($allData as $key => $assign )
<tr>
<td>{{ $key+1 }}</td>
<td> {{ $assign['student_class']['name'] }}</td>				 
<td>
 					
<a href="{{ route('assign.subject.edit',$assign->class_id ) }}" class="btn btn-info">Edit</a>
<a href="{{ route('assign.subject.details',$assign->class_id ) }}" class="btn btn-primary" >Details</a>

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
