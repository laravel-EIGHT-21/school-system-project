@extends('admin.admin_master')
@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Update Student`s Attendance Info</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Student`s Attendance</li>
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
          <h3 class="card-title"><b> Update Student`s Attendance</b></h3>

          
        </div>
        <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-12 col-md-offset-1">
<form method="post" action="{{ route('update.alevel.student.attendance',$editData->id) }}" enctype="multipart/form-data">
	 	@csrf
         <input type="hidden" name="id" value="{{ $editData->id }}">

         

<div class="row">
<div class="col-4">
<div class="form-group">
<label>Student Name</label>
<input type="text" name="name" class="form-control" readonly  value="{{ $editData['alevelstudent']['name'] }}" > 
	 </div>
   </div>


   <div class="col-4">
<div class="form-group">
<label>Student ID </label>
<input type="text" name="name" class="form-control" readonly  value="{{ $editData['alevelstudent']['id_no'] }}" > 
	 </div>
   </div>


   <div class="col-4">
<div class="form-group">
<label>Year</label>
<input type="text" name="year_id" class="form-control" readonly  value="{{ $editData['student_year']['name'] }}" > 
</div>
</div>


  
   </div><!--End 1st Row-->
 
    
<!-- 3rd Row -->
<div class="row">


<div class="col-4"> 
<div class="form-group">
<label>Class</label>
<input type="text" name="class_id" class="form-control" readonly  value="{{ $editData['student_class']['name'] }}" > 
</div>
</div>


<div class="col-md-4">
<div class="form-group">
<label>Term<span style="color:red;">*</span></label> 
<select name="term_id" id="term_id" required="" class="form-control">
<option value="" selected="" disabled="">Select Term</option>
@foreach($terms as $term)
<option value="{{ $term->id }}" {{ ($editData->term_id == $term->id)? "selected":"" }}>{{ $term->name }}</option>
@endforeach
</select>
</div>
</div>


 
<div class="col-4">
<div class="form-group">
<label>Session <span class="text-danger"></span></label>
<select name="session_id" id="session_id"  required="" class="form-control">
<option value="" selected="" disabled="">Select Session</option>
@foreach($sessions as $session)
<option value="{{ $session->id }}" {{ ($editData->session_id == $session->id)? "selected":"" }}>{{ $session->name }}</option>
@endforeach
</select>
</div>
</div>




 

    </div><!--End 3nd Row--> 

 <!-- 4th Row -->
 <div class="row">



 <div class="col-4">
<div class="form-group">
<label>Subject Name <span class="text-danger"></span></label>
<select name="subject_id" id="subject_id"  required="" class="form-control select2">
<option  selected="" >Select Subject</option>
@foreach($subjects as $subject)
<option value="{{ $subject->subject_id }}" {{ ($editData->subject_id == $subject->subject_id)? "selected":"" }}>{{ $subject['school_subject']['name']}}</option>
@endforeach
</select>
</div>
</div>

<div class="col-4">
<div class="form-group">
<label>Attendance</label>
    <select name="attend_status" id="attend_status" required="" class="form-control">
    <option value="" selected="" disabled="">Select Attendance</option>
    <option value="Present" {{ ($editData->attend_status == 'Present')? 'selected':'' }}>Present</option>
    <option value="Absent" {{ ($editData->attend_status == 'Absent')? 'selected':'' }}>Absent</option>

    </select>	
     </div>
   </div>


    </div><!--End 4th Row--> 



<button type="submit" class="btn btn-rounded btn-primary mb-5">Update Student`s Attendance </button>

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