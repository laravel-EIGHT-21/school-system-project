@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-8">
<h1>A-level Student MarkSheet Management</h1>
</div>

</div>
</div>
</section>


<section class="content">
<div class="container-fluid">

<div class="row">

<div class="col-12 ">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">

          <h4 class="card-title">Student <strong>MarkSheet Generate</strong></h4>

          </div>
          <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-12 ">

<form method="GET" action="{{ route('alevel.report.marksheet.get') }}" target="_blank">
			@csrf
             <div class="row"> <!-- start 2nd row  -->
    
            
<div class="col-md-2">
<div class="form-group">
<label>Year <span class="text-danger"></span></label>
<select name="year_id" id="year_id" required="" class="form-control">
<option value="" selected="" disabled="">Select Year</option>
@foreach($years as $year)
<option value="{{ $year->id }}" >{{ $year->name }}</option>
@endforeach

</select>
</div>
</div> <!-- end col md 4 -->


<div class="col-md-2">
<div class="form-group">
<label>Class <span class="text-danger"></span></label>
<select name="class_id" id="class_id"  required="" class="form-control">
<option value="" selected="" disabled="">Select Class</option>
@foreach($classes as $class)
<option value="{{ $class->id }}">{{ $class->name }}</option>
@endforeach
</select>
</div>
</div> <!-- end col md 4 -->


<div class="col-md-2">
<div class="form-group">
<label> Term <span class="text-danger"></span></label>
<select name="term_id" id="term_id"  required="" class="form-control">
<option value="" selected="" disabled="">Select Term</option>
@foreach($terms as $term)
<option value="{{ $term->id }}">{{ $term->name }}</option>
@endforeach
</select>
</div>
</div> <!-- end col md 4 -->

 

<div class="col-md-2">
<div class="form-group">
<label>Subject Name <span class="text-danger"></span></label>
<select name="subject_id" id="subject_id"  required="" class="form-control">
<option  selected="" >Select Subject</option>
@foreach($subjects as $subject)
<option value="{{ $subject->subject_id }}">{{ $subject['school_subject']['name']}}</option>
@endforeach
</select>
</div>
</div> <!-- end col md 4 -->


<div class="col-md-2">
<div class="form-group">
<label>Exam Type <span class="text-danger"></span></label>
<select name="exam_type_id" id="exam_type_id"  required="" class="form-control">
<option value="" selected="" disabled="">Select Exam</option>
@foreach($exam_types as $exam)
<option value="{{ $exam->id }}">{{ $exam->name }}</option>
@endforeach
</select>
</div>
</div> <!-- end col md 4 -->


<div class="col-md-2">
<div class="form-group">
<label> Student ID No <span class="text-danger">*</span></label>
<input type="text" name="id_no" class="form-control" > 
</div>

</div> <!-- End Col md 3 --> 



<div class="col-md-2" style="padding-top: 30px;">
<input type="submit" class="btn btn-rounded btn-info" value="Search">

</div> <!-- end col md 4 -->


</div> <!-- end 2nd row  -->

</form> 



                            </div>
                        </div><!--End of row-->


                            </div>

							</div>

							</div>

                            </div><!--End of  main row-->


 


</div>

</section>
<br><br>



@endsection
