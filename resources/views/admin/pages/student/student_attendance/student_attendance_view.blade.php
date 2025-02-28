
@extends('admin.body.master')
@section('admin')



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script>


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-9">
<h1>Students Attendance Details </h1>
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

          <h4 class="card-title">Search Students` <strong>Attendance Deatils </strong></h4>
        
          <a href="{{ route('student.attendance.add') }}" style="float: right;" class="btn btn-rounded btn-success "> Add Students Attendance</a>			  


          </div>
          <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-12 ">

             <div class="row"> <!-- start 2nd row  -->


<div class="col-md-2">
<div class="form-group">
<label>Class <span class="text-danger"></span></label>
<select id="class" name="class" class="form-control select2" data-allow-clear="true">
  <option value="">Select Class</option>
  <option value="Senior 1">Senior 1</option>
  <option value="Senior 2">Senior 2</option>
  <option value="Senior 3">Senior 3</option>
  <option value="Senior 4">Senior 4</option>
  <option value="Senior 5">Senior 5</option>
  <option value="Senior 6">Senior 6</option> 
</select>
</div>
</div> <!-- end col md 4 -->
 

<div class="col-md-2">
<div class="form-group">
<label> Term <span class="text-danger"></span></label>
<select id="term" name="term" class="form-control select2" data-allow-clear="true">
  <option value="">Select Term</option>
  <option value="Term 1">Term 1 </option>
  <option value="Term 2">Term 2 </option>
  <option value="Term 3">Term 3 </option>
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
<option value="{{ $subject->subject_id }}">{{ $subject['subject']['name']}}</option>
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


<div class="col-md-2" style="padding-top: 30px;">
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
<h3 class="card-title"> Students Attendace Details </h3>
</div>
  
<div class="card-body">
<script id="document-template" type="text/x-handlebars-template">

<table class="table table-bordered table-striped" style="width: 100%;">
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
    var classes = $('#class').val();
    var term = $('#term').val();
    var session_id = $('#session_id').val();
    var subject_id = $('#subject_id').val();
    var date= $('#date').val(); 
     $.ajax({
      url: "{{ route('students.attendance.details.get')}}",
      type: "get",
      data: {'class':classes,'term':term,'session_id':session_id,'subject_id':subject_id,'date':date},
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
