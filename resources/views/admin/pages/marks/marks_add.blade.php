
@extends('admin.body.master')
@section('admin')



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1><b>Students Marks (Primary Setting)</b></h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right"> 
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Marks Entry </li>
</ol>
</div> 
</div>
</div>
</section>


<section class="content">
<div class="container-fluid">
<form method="post" action="{{ route('marks.entry.store') }}">
			@csrf
<div class="row">

<div class="col-12 ">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">

          <h4 class="card-title"><b>Student`s <strong>Marks Entry</strong></b></h4>

    @can('students-marks-details')
    <a href="{{ route('marks.entry.details') }}" class="btn btn-success" style="float: right;">View Marks Details Only </a>
    @endcan

          </div>
          <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-12 ">

             <div class="row"> <!-- start 2nd row  -->
    
<div class="col-md-2">
<div class="form-group">
  <label>Year <span class="text-danger"></span></label>
  <input type="text" name="year" class="form-control" required > 
</div>
</div> <!-- end col md 4 -->


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

 

<div class="col-md-3">
<div class="form-group">
<label>Subject Name <span class="text-danger"></span></label>
<select name="subject_id" id="subject_id"  required="" class="form-control select2">
<option value=""  selected="" disabled="">Select Subject</option>
@foreach($subjects as $subject)
<option value="{{ $subject->subject_id }}">{{ $subject['subject']['name']}}</option>
@endforeach
</select>
</div>
</div> <!-- end col md 4 -->


<div class="col-md-3">
<div class="form-group">
<label>Exam Type <span class="text-danger"></span></label>
<select id="exam_type" name="exam_type" class="form-control select2" data-allow-clear="true">
  <option value="">Select Type</option>
  <option value="Beginning Of Term">Beginning Of Term </option>
  <option value="Mid Term">Mid Term </option>
  <option value="End Of Term">End Of Term</option>
</select>
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

<div class="row d-none" id="marks-entry">
<div class="col-md-12">
<div class="card">
<div class="card-header">
<h3 class="card-title"> Student`s Marks </h3>
</div>

<div class="card-body">

<table class="table table-bordered table-striped" style="width: 100%;">
<thead>
<tr>
<th>ID No</th>
<th>Student Name </th>
<th>Gender</th>
<th>Marks</th>
</tr>

</thead>
<tbody id="marks-entry-tr">
 				
</tbody>

</table>


</div>



</div>

</div>
</div>

<input type="submit" class="btn btn-rounded btn-info" value="Submit">


                                    </form>

</div>

</section> 
<br><br>

<script type="text/javascript">
  $(document).on('click','#search',function(){
    var year = $('#year').val();
    var classes = $('#class').val();
    var term = $('#term').val();
    var subject_id = $('#subject_id').val();
    var exam_type = $('#exam_type').val();
     $.ajax({
      url: "{{ route('getstudents.info')}}",
      type: "GET",
      data: {'class':classes},
      success: function (data) {
        $('#marks-entry').removeClass('d-none');
        var html = '';
        $.each( data, function(key, v){
          html +=
          '<tr>'+
          '<td>'+v.id_no+'<input type="hidden" name="id[]" value="'+v.id+'"> </td>'+
          '<td>'+v.name+'</td>'+
          '<td>'+v.gender+'</td>'+
          '<td><input type="text" class="form-control form-control-sm" required="" name="marks[]" ></td>'+
          '</tr>';
        });
        html = $('#marks-entry-tr').html(html);
      }
    });
  });

</script>




@endsection
