
@extends('admin.body.master')
@section('admin')



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>



<link rel="stylesheet" href="{{asset('Backend/plugins/fullcalendar/main.css')}}">
<script src="{{asset('Backend/plugins/fullcalendar/main.js')}}"></script>

<link href="{{asset('Backend/plugins/lib/colorpicker/css/colorpicker.css')}}" rel="stylesheet">
<link href="{{asset('Backend/plugins/lib/validation/css/validation.css')}}" rel="stylesheet">
<link href="{{asset('Backend/plugins/lib/timepicker/jquery-ui-timepicker-addon.css')}}" rel="stylesheet">

<link rel="stylesheet" href="{{asset('Backend/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">

<link rel="stylesheet" href="{{asset('Backend/plugins/toastr/toastr.min.css')}}">

<!-- fullCalendar -->
  <link href="{{asset('Backend/css/ui-lightness/jquery-ui.css')}}" rel="stylesheet">
    <link href="{{asset('Backend/css/fullcalendar.css')}}" rel="stylesheet">
  


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Update Lessons Schedule</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Lessons Schedule</li>
</ol>
</div>
</div>
</div>
</section>



 <!-- Main content -->
 <section class="content">
      <div class="container-fluid">
      <div class="row">
  
  <div class="col-12 ">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title"><b>Update Lessons Schedule Details</b></h3>

            

<a href="{{ route('lessons.view') }}" style="float: right;" class="btn btn-rounded btn-success ">View Lessons Schedule</a>	


          </div>
          <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-12 col-md-offset-1">
<form method="post" action="{{ route('lessons.update',$editData[0]->lesson_id) }}">
	 	@csrf         
         <div class="add_item">
         <div class="row"> <!-- start 2nd row  -->
     
<div class="col-4"> 
     <div class="form-group"> 
    <label>Term  <span style="color:red;">*</span></label>
    <select name="term"  required="" class="form-control">
      <option value="Term 1" {{ $editData['0']->term == 'Term 1' ? 'selected' : ''  }} >Term 1</option>
      <option value="Term 2" {{ $editData['0']->term == 'Term 2' ? 'selected' : ''  }}>Term 2</option>
      <option value="Term 3" {{ $editData['0']->term == 'Term 3' ? 'selected' : ''  }}>Term 3</option>
  
      
      </select>
    </div>
    </div>


    
         
<div class="col-md-4">
    <div class="form-group">
    <label>Class<span style="color:red;">*</span></label>
    <select name="class"  required="" class="form-control">
      <option value="Senior 1" {{ $editData['0']->class == 'Senior 1' ? 'selected' : ''  }} >Senior 1</option>
      <option value="Senior 2" {{ $editData['0']->class == 'Senior 2' ? 'selected' : ''  }}>Senior 2</option>
      <option value="Senior 3" {{ $editData['0']->class == 'Senior 3' ? 'selected' : ''  }}>Senior 3</option>
      <option value="Senior 4" {{ $editData['0']->class == 'Senior 4' ? 'selected' : ''  }}>Senior 4</option>
      <option value="Senior 5" {{ $editData['0']->class == 'Senior 5' ? 'selected' : ''  }}>Senior 5</option>
      <option value="Senior 6" {{ $editData['0']->class == 'Senior 6' ? 'selected' : ''  }}>Senior 6</option>
      
      </select>
    </div>
    </div>



    <div class="col-md-4">     		
        <div class="form-group">
        <label>Day <span style="color:red;">*</span></label>
        <select name="day" id="day" required="" class="form-control select2">
    <option value="" selected="" disabled="">Select Day</option>
    
    <option value="Monday" {{ ($editData['0']->day== 'Monday')? 'selected':'' }}>Monday</option>
    
    <option value="Tuesday" {{ ($editData['0']->day== 'Tuesday')? 'selected':'' }}>Tuesday</option>
    
    <option value="Wednesday" {{ ($editData['0']->day== 'Wednesday')? 'selected':'' }}>Wednesday</option>
    
    <option value="Thursday" {{ ($editData['0']->day== 'Thursday')? 'selected':'' }}>Thursday</option>
    
    <option value="Friday" {{ ($editData['0']->day== 'Friday')? 'selected':'' }}>Friday</option>
    
    <option value="Saturday" {{ ($editData['0']->day== 'Saturday')? 'selected':'' }}>Saturday</option>
    
    <option value="Sunday" {{ ($editData['0']->day== 'Sunday')? 'selected':'' }}>Sunday</option>
    
    
    </select>
        
        </div>
        </div><!-- End col-md-5 -->


</div> <!-- end 2nd row  -->

@foreach($editData as $edit)
<div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
<div class="row">


<div class="col-md-2">
<div class="form-group">
<div class="clearfix"></div>
<div class="pull-left">
<label>StartTime:</label>
<input type="text" class="form-control input-sm" name="start_time[]" value="{{$edit->start_time}}" id="tp1">
</div>
</div>
</div>


<div class="col-md-2">
<div class="form-group">
<div class="clearfix"></div>
<div class="pull-left">
<label>EndTime:</label>
<input type="text" class="form-control input-sm" name="end_time[]" value="{{$edit->end_time}}" id="tp2">
</div>
</div>
</div>


<div class="col-md-3">
<div class="form-group">
<label> Subject <span style="color:red;">*</span></label>
<select name="subject_id[]" required="" class="form-control select2">
<option value="" selected="" disabled=""> Subjects</option>
@foreach($subjects as $subject)
<option value="{{ $subject->id }}" {{ ($edit->subject_id == $subject->id)? "selected": ""  }}>{{ $subject->name }}</option>
@endforeach	 
</select>
</div>
</div> <!-- end col md 4 -->



<div class="col-md-3">
    <div class="form-group">
    <label> Teacher <span style="color:red;">*</span></label>
    <select name="user_id[]" required="" class="form-control select2">
    <option value="" selected="" disabled=""> Teachers</option>
    @foreach($teachers as $teach)
    <option value="{{ $teach->id }}" {{ ($edit->user_id == $teach->id)? "selected": ""  }}>{{ $teach->name }}</option>
    @endforeach	 
    </select>
    </div>
    </div> <!-- end col md 4 -->
    


<div class="col-md-2" style="padding-top: 30px;">
 <span class="btn btn-sm btn-success addeventmore"><i class="fa fa-plus-circle"></i> </span>    
 <span class="btn btn-sm btn-danger removeeventmore"><i class="fa fa-minus-circle"></i> </span>		
     	</div><!-- End col-md-5 -->

</div>

         </div>
         @endforeach


    </div>


<button type="submit"  class="btn btn-rounded btn-primary mb-5"> Update Lessons Schedule </button>

      
                                    </form>
                            </div>
                        </div><!--End of row-->


                            </div>

        </div>

        </div>
    </div>
   
             <!-- /.SELECT2 EXAMPLE-->

             </div>
     <!-- /.card -->
     </section>
    <!-- /.content -->


    
    <div style="visibility: hidden;">
  	<div class="whole_extra_item_add" id="whole_extra_item_add">
  		<div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
  			<div class="form-row">


              <div class="col-md-2">
<div class="form-group">
<div class="clearfix"></div>
<div class="pull-left">
<label>StartTime:</label>
<input type="text" class="form-control input-sm" name="start_time[]" id="tp1">
</div>
</div>
</div>


<div class="col-md-2">
<div class="form-group">
<div class="clearfix"></div>
<div class="pull-left">
<label>EndTime:</label>
<input type="text" class="form-control input-sm" name="end_time[]" id="tp2">
</div>
</div>
</div>




         <div class="col-md-3">
     	     		
                      <div class="form-group">
                       <h5>Subject <span class="text-danger">*</span></h5>
                       <div class="controls">
                        <select name="subject_id[]" required="" class="form-control">
                           <option value="" selected="" disabled="">Subject</option>
                           @foreach($subjects as $subject)
                           <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                           @endforeach	 
                           </select>
                        </div>
                             </div> <!-- // end form group -->
                            </div> <!-- End col-md-5 -->
                   

                            <div class="col-md-3">
     	     		
                      <div class="form-group">
                       <h5>Teacher <span class="text-danger">*</span></h5>
                       <div class="controls">
                        <select name="user_id[]" required="" class="form-control">
                           <option value="" selected="" disabled="">Teachers</option>
                           @foreach($teachers as $teach)
                           <option value="{{ $teach->id }}">{{ $teach->name }}</option>
                           @endforeach	 
                           </select>
                        </div>
                             </div> <!-- // end form group -->
                            </div> <!-- End col-md-5 -->
                   




     	<div class="col-md-2" style="padding-top: 30px;">
 <span class="btn btn-sm btn-success addeventmore"><i class="fa fa-plus-circle"></i> </span>
  <span class="btn btn-sm btn-danger removeeventmore"><i class="fa fa-minus-circle"></i> </span>    		
     	</div><!-- End col-md-2 -->
     	
       </div>  			
  		</div>  		
  	</div>  	
  </div>



       <script type="text/javascript">
 	$(document).ready(function(){
 		var counter = 0;
 		$(document).on("click",".addeventmore",function(){
 			var whole_extra_item_add = $('#whole_extra_item_add').html();
 			$(this).closest(".add_item").append(whole_extra_item_add);
 			counter++;
 		});
 		$(document).on("click",'.removeeventmore',function(event){
 			$(this).closest(".delete_whole_extra_item_add").remove();
 			counter -= 1
 		});

 	});
 </script>

  <!--Calendar -->    
  <script src="{{asset('Backend/js/jquery.js')}}"></script>
<script src="{{asset('Backend/js/bootstrap.js')}}"></script>
<script src="{{asset('Backend/js/fullcalendar.js')}}"></script>
<script src="{{asset('Backend/js/gcal.js')}}"></script>
<script src="{{asset('Backend/js/jquery-ui.js')}}"></script>
<script src="{{asset('Backend/js/jquery.calendar.js')}}"></script>
<script src="{{asset('Backend/plugins/lib/colorpicker/bootstrap-colorpicker.js')}}"></script>
<script src="{{asset('Backend/plugins/lib/validation/jquery.validationEngine.js')}}"></script>
<script src="{{asset('Backend/plugins/lib/validation/jquery.validationEngine-en.js')}}"></script>

<script src="{{asset('Backend/plugins/lib/timepicker/jquery-ui-sliderAccess.js')}}"></script>
<script src="{{asset('Backend/plugins/lib/timepicker/jquery-ui-timepicker-addon.min.js')}}"></script>

<script src="{{asset('Backend/js/custom.js')}}"></script>

<script type="text/javascript">
$().FullCalendarExt();
</script>
 



@endsection