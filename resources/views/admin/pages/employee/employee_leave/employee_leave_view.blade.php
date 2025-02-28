
@extends('admin.body.master')
@section('admin')



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Employee Leave Management</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Employee Leave Details </li>
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
<h3 class="card-title"> Employee Leave List </h3>

@can('employees-leave-create')
<a href="{{ route('employee.leave.add') }}" style="float: right;" class="btn btn-rounded btn-success "> Add Employee`s Leave Info</a>
@endcan

</div>

<div class="card-body">

<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th width="5%">SL</th>  
<th>Name</th>
<th>Purpose </th>
<th>Start Date</th>
<th>End Date</th> 
<th width="15%">Action</th>
</tr>
</thead>
<tbody>
@foreach($allData as $key => $leave )
<tr>
<td>{{ $key+1 }}</td>
<td> {{ $leave['user']['name'] }}</td>
<td> {{ $leave['purpose']['name'] }}</td>
<td> {{ $leave->start_date }}</td>
<td> {{ $leave->end_date }}</td>

<td>
  
@can('employees-leave-edit')
<a href="{{ route('employee.leave.edit',$leave->id) }}" class="btn-sm btn-info" title="Edit"><i class="fa fa-edit"></i></a>
@endcan

@can('employees-leave-delete')
<a href="{{ route('employee.leave.delete',$leave->id) }}" class="btn-sm btn-danger" id="delete" ><i class="fa fa-trash"></i></a>
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
<br><br>

@endsection
