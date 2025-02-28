
@extends('admin.body.master')
@section('admin')

@section('title')
Students Attendance Report
@endsection



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
 


<section class="content-header">
    <div class="container-fluid">
   <div class="row mb-2">
   <div class="col-sm-6">
   <h1>Students Attendance Report</h1>
   </div>

   </div>
   </div>
   </section>
   
   <section class="content">
   <div class="container-fluid">
   
   
<div class="card">
    <div class="card-header border-transparent">
    <h3 class="card-title"><b>Students Attendance Report Search</b></h3>
    <div class="card-tools">
    <button type="button" class="btn btn-tool" data-card-widget="collapse">
    <i class="fas fa-minus"></i>
    </button>

    </div>
    </div>
    
 
    <div class="card-body p-0">
    <div class="row">

             
        <div class="col-md-12">
        <div class="card">

        
        <div class="card-body">
     
        <form method="get" action="{{ route('students.attendance.report.get') }}" target="_blank">
              @csrf
              <div class="row"> <!-- start 2nd row  -->
              
      



<div class="col-md-2">
<div class="form-group">
<label>Class <span class="text-danger"></span></label>
<select name="class" id="class"  required="" class="form-control">
    <option value="Senior 1" >Senior 1</option>
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
<select name="term"  required="" class="form-control">
    <option value="Term 1"  >Term 1</option>
    <option value="Term 2" >Term 2</option>
    <option value="Term 3" >Term 3</option>
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
     <label>Teacher</label>
     <select name="teacher_id" id="teacher_id"  required="" class="form-control select2">
     <option value="" selected="" disabled=""> Teachers</option>
     @foreach($users as $term)
     <option value="{{ $term->id }}">{{ $term->name }}</option>
     @endforeach
     </select> 
     </div> 
</div>



<div class="col-md-2">
<div class="form-group">
<label>Subject  <span class="text-danger"></span></label>
<select name="subject_id" id="subject_id"  required="" class="form-control select2">
<option  selected="" >Subjects</option></select>
</div>
</div> <!-- end col md 4 -->



<div class="col-md-2">
<div class="form-group">
<label>Attendace Date <span class="text-danger"></span></label>
<input type="date" name="date" id=date class="form-control" > 
</div>
</div>


<div class="col-md-2" style="padding-top: 30px;">
     <div class="text-xs-right">
     <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Search">					 
     </div>
</div>

              </div>

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




   <script type="text/javascript">
    $(function(){
        $(document).on('change','#teacher_id',function(){
          var teacher_id = $('#teacher_id').val(); 
            $.ajax({
                url:"{{ route('get.teacher.subject') }}",
                type: "GET",
                data:{'teacher_id':teacher_id},
                success:function(data){
                    var html = '<option value="">Subjects</option>';
                    $.each(data,function(key,v){
                        html += '<option value=" '+v.subject_id+' "> '+v.subject.name+'</option>';
                    });
                    $('#subject_id').html(html);
                }
            })
        });
    });
</script>
   

@endsection
