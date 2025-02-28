
@extends('admin.body.master')
@section('admin')


@section('title')
Employees Attendance
@endsection


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Update Employee Attendance</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Employee`s Attendance</li>
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
          <h3 class="card-title"><b> Update Employee Attendance</b></h3>

                    
@can('employees-attend-view')
<a href="{{ route('employee.attendance.view') }}" style="float: right;" class="btn btn-rounded btn-success "> View Attendance Details</a>
@endcan
          
        </div>
        <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-12 col-md-offset-1">
<form method="post" action="{{ route('update.employee.attendance',$editData->id) }}" >
	 	@csrf
    

         <div class="row">



         
   <div class="col-6">
<div class="form-group">
<label>Name</label>
<input type="text" name="name" class="form-control" readonly  value="{{ $editData['user']['name'] }}" > 
	 </div>
   </div>

            
   <div class="col-6">
<div class="form-group">
<label>Designation</label>
<input type="text" name="name" class="form-control" readonly  value="{{ $editData['user']['designation']['name'] }}" > 
	 </div>
   </div>



         </div>

         <div class="row">


         
<div class="col-6">
<div class="form-group">
<label>Attendance </label>
    <select name="attend_status" id="attend_status" required="" class="form-control">
    <option value="" selected="" disabled="">Select Attendance</option>
    <option value="Present" {{ ($editData->attend_status == 'Present')? 'selected':'' }}>Present</option>
    <option value="Absent" {{ ($editData->attend_status == 'Absent')? 'selected':'' }}>Absent</option>
    <option value="Leave" {{ ($editData->attend_status == 'Leave')? 'selected':'' }}>Leave</option>
    <option value="No Class" {{ ($editData->attend_status == 'No Class')? 'selected':'' }}>No Class</option>

    </select>	
     </div>
   </div>




         </div>




<button type="submit" class="btn btn-rounded btn-info mb-5">Update Employee Attendance </button>

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