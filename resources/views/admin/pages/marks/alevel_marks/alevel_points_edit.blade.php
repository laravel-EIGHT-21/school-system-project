

@extends('admin.body.master')
@section('admin')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>



<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-8"> 
<h1>Update A-Level Student`s Points Details</h1>
</div>
<div class="col-sm-4">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Students Results </li>
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
          <h3 class="card-title"><b> Update A-level Student`s Points</b></h3>

          @can('alevel-points-details')
        <a href="{{ route('points.alevel.entry.details') }}" class="btn btn-success" style="float: right;">View Details </a>
        @endcan

          
        </div>
        <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-12 col-md-offset-1">
<form method="post" action="{{ route('alevel.marks.entry.update',$editData->id) }}" enctype="multipart/form-data">
	 	@csrf
         <input type="hidden" name="id" value="{{ $editData->id }}">

         

<div class="row">
<div class="col-4">
<div class="form-group">
<label>Student Name</label>
<input type="text" name="name" class="form-control" readonly  value="{{ $editData['student']['name'] }}" > 
	 </div>
   </div>

   <div class="col-4">
<div class="form-group">
<label>Student ID_No </label>
<input type="text" name="id_no" class="form-control" readonly  value="{{ $editData['student']['id_no'] }}" > 
	 </div>
   </div>

   <div class="col-4">
<div class="form-group">
<label>Year</label>
<input type="text" name="year" class="form-control" readonly  value="{{ $editData->year }}" > 
</div>
</div>
  
   </div><!--End 1st Row-->
 
    
<!-- 3rd Row -->
<div class="row">



<div class="col-4">
<div class="form-group">
<label>Class</label>
<input type="text" name="class" class="form-control" readonly  value="{{ $editData->class }}" > 
</div>
</div>




<div class="col-md-4">
<div class="form-group">
<label>Term<span style="color:red;">*</span></label> 
<select name="term"  required="" class="form-control">
    <option value="Term 1" {{ $editData->term == 'Term 1' ? 'selected' : ''  }} >Term 1</option>
    <option value="Term 2" {{ $editData->term == 'Term 2' ? 'selected' : ''  }}>Term 2</option>
    <option value="Term 3" {{ $editData->term == 'Term 3' ? 'selected' : ''  }}>Term 3</option>
    </select>
</div>
</div>



<div class="col-md-4">
<div class="form-group">
<label>Exam Type<span style="color:red;">*</span></label> 
<select id="exam_type" name="exam_type" class="form-control select2" data-allow-clear="true">
    <option value="Beginning Of Term" {{ $editData->exam_type == 'Beginning Of Term' ? 'selected' : ''  }}>Beginning Of Term </option>
    <option value="Mid Term" {{ $editData->exam_type == 'Mid Term' ? 'selected' : ''  }}>Mid Term </option>
    <option value="End Of Term" {{ $editData->exam_type == 'End Of Term' ? 'selected' : ''  }}>End Of Term</option>
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
<option value="{{ $subject->subject_id }}" {{ ($editData->subject_id == $subject->subject_id)? "selected":"" }}>{{ $subject['subject']['name']}}</option>
@endforeach
</select>
</div>
</div>




<div class="col-4"> 
<div class="form-group">
<label>Subject Points </label>
<input type="text" name="points" class="form-control" required  value="{{ $editData->points }}" > 
	 </div>
   </div>


    </div><!--End 4th Row--> 



<button type="submit" class="btn btn-rounded btn-primary mb-5">Update Student`s Points </button>

                                  </form>
                          </div>
                      </div>
                          </div>
                          </div>
                          </div>

</div>


<br>

      </div>

</section>

	  

@endsection