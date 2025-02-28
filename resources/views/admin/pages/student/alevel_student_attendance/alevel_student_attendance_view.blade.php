@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script>


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>A-Level Students Attendance</h1>
</div>
<div class="col-sm-6"> 
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">A-Level Attendance </li>
</ol>
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

          <h4 class="card-title">A-Level Students` <strong>Attendance Details</strong></h4>
          <a href="{{ route('alevel.student.attendance.add') }}" style="float: right;" class="btn btn-rounded btn-success "> Add Attendance Info</a>			  
          </div>
          <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-12 ">

             <div class="row"> <!-- start 2nd row  -->
    
<div class="col-md-2">
<div class="form-group">
<label>Year <span class="text-danger"></span></label>
<select name="year_id" id="year_id" required="" class="form-control select2">
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
<select name="class_id" id="class_id"  required="" class="form-control select2">
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
<label>Session <span class="text-danger"></span></label>
<select name="session_id" id="session_id"  required="" class="form-control select2">
<option value="" selected="" disabled="">Select Session</option>
@foreach($sessions as $session)
<option value="{{ $session->id }}">{{ $session->name }}</option>
@endforeach
</select>
</div>
</div> <!-- end col md 4 -->

<div class="col-md-2">
<div class="form-group">
<label>Subject Name <span class="text-danger"></span></label>
<select name="subject_id" id="subject_id"  required="" class="form-control select2">
<option  selected="" >Select Subject</option>
@foreach($subjects as $subject)
<option value="{{ $subject->subject_id }}">{{ $subject['school_subject']['name']}}</option>
@endforeach
</select>
</div>
</div> <!-- end col md 4 -->


<div class="col-md-2">
<div class="form-group">
<label>Attendace Date <span class="text-danger"></span></label>
<input type="date" name="date" id=date class="form-control" > 
</div>
</div> <!-- end col md 4 -->




<div class="col-md-2" style="padding-top: 10px;">
<a id="search" class="btn btn-info" name="search"> Enter</a>

</div> <!-- end col md 4 -->


</div> <!-- end 2nd row  -->
                            </div>
                        </div><!--End of row-->


                            </div>

							</div>

							</div>

                            </div><!--End of  main row-->

        <br>
        
<div class="row">
<div class="col-md-12">

<div id="DocumentResults">
<div class="card">
<div class="card-header">
<h3 class="card-title"> Attendance Details </h3>
</div>
  
<div class="card-body">
<script id="document-template" type="text/x-handlebars-template">

<table id="example2" class="table table-bordered table-striped" style="width: 100%;">
<thead>
<tr>
<tr>
@{{{thsource}}}
</tr>
</thead>
<tbody>
@{{#each this}}
<tr>
@{{{tdsource}}}	
</tr>
@{{/each}}
</tbody>
</table>
</script>

</div>

</div>
</div>




</div>
</div>


</div>

</section>
<br><br>

<script type="text/javascript">
  $(document).on('click','#search',function(){
    var year_id = $('#year_id').val();
    var class_id = $('#class_id').val();
    var term_id = $('#term_id').val();
    var session_id = $('#session_id').val();
    var subject_id = $('#subject_id').val();
    var date = $('#date').val(); 
     $.ajax({
      url: "{{ route('alevel.students.attendance.get')}}",
      type: "get",
      data: {'year_id':year_id,'class_id':class_id,'term_id':term_id,'session_id':session_id,'subject_id':subject_id,'date':date},
      beforeSend: function() {       
      },
      success: function (data) {
        var source = $("#document-template").html();
        var template = Handlebars.compile(source);
        var html = template(data);
        $('#DocumentResults').html(html);
        $('[data-toggle="tooltip"]').tooltip();
      }
    });
  });

</script>
 


@endsection
