@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script>

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-8">
<h1>A-Level Students Attendance Management</h1> 
</div>
<div class="col-sm-4">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Attendance Details </li>
</ol>
</div>
</div>
</div> 
</section>


<section class="content">
<div class="container-fluid">

    @php
    $id = Auth::user()->id;
    $user = App\Models\User::find($id);
    $subject_id= App\Models\AssignSubjectTeacher::with(['school_subject'])->where('user_id',$id)->get();
    @endphp
        

<form method="post" action="{{ route('store.alevel.student.attendance') }}">
  	@csrf

<div class="row"> 

<div class="col-12 ">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">

          <h4 class="card-title">A-Level Students` <strong>Attendance Entry</strong></h4>

          <a href="{{ route('alevel.student.attendance.view') }}" style="float: right;" class="btn btn-rounded btn-success "> View Attendance Details</a>			  

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


<div class="col-md-3">
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
<select name="session_id" id="session_id"  required="" class="form-control">
<option value="" selected="" disabled="">Select Session</option>
@foreach($sessions as $session)
<option value="{{ $session->id }}">{{ $session->name }}</option>
@endforeach
</select>
</div>
</div> <!-- end col md 4 -->

 
<div class="col-md-3">
<div class="form-group">
<label>Subject Name <span class="text-danger"></span></label>
<select name="subject_id" id="subject_id"  required="" class="form-control select2">
<option  selected="" >Select Subject</option>
@foreach($subject_id as $subject)
<option value="{{ $subject->subject_id }}">{{ $subject['school_subject']['name']}}</option>
@endforeach
</select>
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
  <div class="row d-none" id="attendance-entry">
<div class="col-md-12">
<div class="card">
<div class="card-header">
<h3 class="card-title"> Student`s Attendance </h3>
</div>

<div class="card-body">

<table id="example2" class="table table-bordered table-striped" style="width: 100%;">
<thead>
<tr>
<th>ID No</th>
<th>Student Name </th>
<th>Gender</th>
<th>Attendance</th>
</tr>

</thead>
<tbody id="attendance-entry-tr">
 				
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
    var year_id = $('#year_id').val();
    var class_id = $('#class_id').val();
    var term_id = $('#term_id').val();
    var session_id = $('#session_id').val();
    var subject_id = $('#subject_id').val(); 

     $.ajax({
      url: "{{ route('alevel.student.year.class.attend')}}",
      type: "GET",
      data: {'year_id':year_id,'class_id':class_id,'subject_id':subject_id},

      success: function (data) {
        $('#attendance-entry').removeClass('d-none');
        var html = '';
        $.each( data, function(key, v){
          html +=
          '<tr>'+
          '<td>'+v.alevelstudent.id_no+'<input type="hidden" name="student_id[]" value="'+v.student_id+'"> </td>'+
          '<td>'+v.alevelstudent.name+'</td>'+
          '<td>'+v.alevelstudent.gender+'</td>'+
          '<td><select name="attend_status[]" id="attend_status" required="" class="form-control"><option value="" selected="" disabled="">Select Attendance</option><option value="Present">Present</option><option value="Absent">Absent</option></select></td>'+
          '</tr>';
        });
        html = $('#attendance-entry-tr').html(html);
      }


    });
  });

</script>



<!--   // for get Student Subject  -->

<script type="text/javascript">
  $(function(){
    $(document).on('change','#user_id',function(){
      var user_id = $('#user_id').val();
      $.ajax({
        url:"{{ route('get.subject.teacher') }}",
        type:"GET",
        data:{user_id:user_id},
        success:function(data){
          var html = '<option value="">Select Subject</option>';
          $.each( data, function(key, v) {
            html += '<option value="'+v.id+'">'+v.school_subject.name+'</option>';
          });
          $('#subject_id').html(html);
        }
      });
    });
  });
</script>





@endsection
