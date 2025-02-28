
@extends('admin.body.master')
@section('admin')


@section('title')
Competency Results Details
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script>


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-8">
<h1>Students` Competency Results Details </h1>
</div>
<div class="col-sm-4">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Competency Results  Details </li>
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

          <h4 class="card-title"><b>Students` <strong>Competency Results</strong></b></h4>

          @can('olevel-marks-details')
    <a href="{{ route('competency.results.add') }}" class="btn btn-success" style="float: right;">Add Results</a>
@endcan

          </div>
          <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-12 ">

             <div class="row"> <!-- start 2nd row  -->
    

<div class="col-md-3">
<div class="form-group">
  <label>Year <span class="text-danger"></span></label>
  <input type="text" name="year" id="year" class="form-control" required > 
</div>
</div> <!-- end col md 4 -->


<div class="col-md-3">
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


<div class="col-md-3">
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
<label>Exam Type <span class="text-danger"></span></label>
<select id="exam_type" name="exam_type" class="form-control select2" data-allow-clear="true">
  <option value="">Select Type</option>
  <option value="Beginning Of Term">Beginning Of Term </option>
  <option value="Mid Term">Mid Term </option>
  <option value="End Of Term">End Of Term</option>
</select>
</div>
</div> <!-- end col md 4 -->

             </div>

             <div class="row">
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




<div class="col-md-8">
<div class="form-group">
<label>Competency <span class="text-danger"></span></label>
<select name="competency_id" id="competency_id" required="" class="form-control select2">
<option  selected="" >Competency</option>
</select>
</div>
</div> <!-- end col md 4 -->


             </div>


<div class="row">

<div class="col-md-2" style="padding-top: 30px;">
<a id="search" class="btn btn-info" name="search"> Search </a>

</div> <!-- end col md 4 -->


</div> <!-- end 2nd row  -->






  </div> <!-- end 2nd row  -->
  </div>
  </div><!--End of row-->

  </div>

  </div>

  </div>
        <br>
        
<div class="row">
<div class="col-md-12">

<div id="DocumentResults">
<div class="card">
<div class="card-header">
<h3 class="card-title">Students` Competency Results Details </h3>
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
    var year = $('#year').val();
    var classes = $('#class').val();
    var term = $('#term').val();
    var exam_type = $('#exam_type').val();
    var subject_id = $('#subject_id').val();
    var competency_id = $('#competency_id').val();
     $.ajax({
      url: "{{ route('competency.results.student.edit.getstudents')}}",
      type: "get",
     data: {'year':year,'class':classes,'term':term,'exam_type':exam_type,'subject_id':subject_id,'competency_id':competency_id},
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



<script type="text/javascript">
    $(function(){
        $(document).on('change','#subject_id',function(){
          var subject_id = $('#subject_id').val();
            $.ajax({
                url:"{{ route('get.subject.competency') }}",
                type: "GET",
                data:{'subject_id':subject_id},
                success:function(data){
                    var html = '<option value="">Competency</option>';
                    $.each(data,function(key,v){
                        html += '<option value=" '+v.id+' "> '+v.competency+'</option>';
                    });
                    $('#competency_id').html(html);
                }
            })
        });
    });
</script>

@endsection
