
@extends('admin.body.master')
@section('admin')



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Add Employee`s Leave Info</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Employee`s Leave Details</li>
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
          <h3 class="card-title"><b> Add Employee`s Leave Details</b></h3>

          
        </div>
        <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-12 col-md-offset-1">

<form method="post" action="{{ route('store.employee.leave') }}">
	 	@csrf

<div class="row">

<div class="col-6">
<div class="form-group">
<label>Employee Name<span style="color:red;">*</span></label>
<select name="employee_id" required="" class="form-control select2">
<option value="" selected="" disabled="">Select Employee Name</option>
@foreach($employees as $employee)
<option value="{{ $employee->id }}">{{ $employee->name }}</option>
@endforeach
</select>
</div>
</div>


  
<div class="col-6">
<div class="form-group">
<label>Leave Purpose<span style="color:red;">*</span></label>
<select name="leave_purpose_id" id="leave_purpose_id" required="" class="form-control">
<option value="" selected="" disabled="">Select Purpose</option>
@foreach($leave_purpose as $leave)
<option value="{{ $leave->id }}">{{ $leave->name }}</option>
@endforeach
<option value="0">New Purpose</option>
</select>
<input type="text" name="name" id="add_another" class="form-control" placeholder="Write Purpose" style="display: none;">	
    
    </div>
</div>


   
   </div><!--End 1st Row-->


<!-- 3rd Row -->
<div class="row">


<div class="col-6">
<div class="form-group">
<label>Start Date<span style="color:red;">*</span></label>
<input type="date" name="start_date" class="form-control" required="" > 
	 </div>
   </div>


   <div class="col-6">
<div class="form-group">
<label>End Date<span style="color:red;">*</span></label>
<input type="date" name="end_date" class="form-control" required="" > 
	 </div>
   </div>



    </div><!--End 3nd Row--> 


<button type="submit" class="btn btn-rounded btn-primary mb-5">Add Employee`s Leave Info </button>

                                  </form>
                          </div>
                      </div>
                          </div>
                          </div>
                          </div>

</div>


      </div>

</section>


<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('change','#leave_purpose_id',function(){
			var leave_purpose_id = $(this).val();
			if (leave_purpose_id == '0') {
				$('#add_another').show();
			}else{
				$('#add_another').hide();
			}
		});
	});
</script>

	  

@endsection