
@extends('admin.body.master')
@section('admin')



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Add Teaching-Staff Attendance</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Teaching-Staff Attendance</li>
</ol>
</div>
</div>
</div>
</section>

<section class="content">
<div class="container-fluid">
<div class="row">
  
<div class="col-12 ">

    <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title"><b> Add Teaching-Staff Attendance</b></h3>

          
@can('employees-attend-view')
<a href="{{ route('employee.attendance.view') }}" style="float: right;" class="btn btn-rounded btn-success "> View Attendance Details</a>
@endcan
        </div>
        <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-12 col-md-offset-1">
<form method="post" action="{{ route('store.employee.attendance') }}" >
	 	@csrf
    
<!-- 3rd Row -->
<div class="row">
<div class="col-md-12">

<table id="example2" class="table table-bordered table-striped" style="width: 100%">
<thead>
<tr>
<th rowspan="2" class="text-center" style="vertical-align: middle;">Sl</th>
<th rowspan="4" class="text-center" style="vertical-align: middle;">Teaching-Staff List</th>
<th colspan="5" class="text-center" style="vertical-align: middle; width:35%">Attendance Status</th>				
</tr>

<tr>
<th class="text-center btn present_all" style="display: table-cell; background-color: #000000; color:yellow;">Present</th>
<th class="text-center btn leave_all" style="display: table-cell; background-color: #000000; color:yellow;">Leave</th>
<th class="text-center btn absent_all" style="display: table-cell; background-color: #000000; color:yellow;">Absent</th>
<th class="text-center btn no_class" style="display: table-cell; background-color: #000000; color:yellow;">No Class</th>
</tr>   				
</thead> 
<tbody>
@foreach($employees as $key => $employee)		

<tr id="div{{$employee->id}}" class="text-center">
<input type="hidden" name="user_id[]" value="{{ $employee->id }}">
<td>{{ $key+1  }}</td>
<td>{{ $employee->name }}</td>

<td colspan="5">
<div class="switch-toggle switch-4 switch-candy">

<input name="attend_status{{$key}}" type="radio" value="Present" id="present{{$key}}" checked="checked">
<label for="present{{$key}}">Present</label>

&nbsp;

<input name="attend_status{{$key}}" value="Leave" type="radio" id="leave{{$key}}" >
<label for="leave{{$key}}">Leave</label>

&nbsp;

<input name="attend_status{{$key}}" value="Absent"  type="radio" id="absent{{$key}}" >
<label for="absent{{$key}}">Absent</label>

&nbsp;
&nbsp;


<input name="attend_status{{$key}}" value="No Class"  type="radio" id="no_class{{$key}}" >
<label for="no_class{{$key}}">No Class</label>

</div>			
</td>
</tr>			

@endforeach
</tbody>   			
</table>


</div>   <!-- // End Col md 12 -->	


</div><!--End 3nd Row--> 


<button type="submit" class="btn btn-rounded btn-info mb-5">Add Employee Attendance Details </button>

                                  </form>
                          </div>
                      </div>
                          </div>
                          </div>
                          </div>

</div>


      </div>

</section>

	  

@endsection