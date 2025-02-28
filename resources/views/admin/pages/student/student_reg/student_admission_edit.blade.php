
@extends('admin.body.master')
@section('admin')



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Update Student Admission Details</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Admission Details</li>
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
          <h3 class="card-title"><b> Admission Details</b></h3>

          
        
<a href="{{ route('student.admissions.view') }}" class="btn btn-sm btn-success" style="float: right;">Back to Details</a>


          
        </div>
        <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-12 col-md-offset-1">
<form method="post" action="{{ route('update.student.admission',$student->id) }}" enctype="multipart/form-data">
	 	@csrf
	 	<input type="hidden" name="id" value="{{ $student->id }}">


<div class="row">
<div class="col-4"> 
<div class="form-group">
<label>Student Name : </label> 
<input type="text" name="name" class="form-control" required=""  value="{{ $student->student_name }}" > 
	 </div>
   </div>

   
   <div class="col-4"> 
    <div class="form-group">

    
         </div>
       </div>
    

   <div class="col-4"> 
<div class="form-group">
<label>Student ID : </label> <label><b>{{ $student->id_no }} </b></label> 

	 </div>
   </div>


   </div><!--End 1st Row-->


   
<b><hr /></b>




  <!-- 2nd Row -->
  <div class="row">

   <div class="col-4">
<div class="form-group">
<label>Gender<span style="color:red;">*</span></label>
    <select name="gender" id="gender" required="" class="form-control">
    <option value="" selected="" disabled="">Select Gender</option>
    <option value="Male" {{ ($student->gender == 'Male')? 'selected':'' }}>Male</option>
    <option value="Female" {{ ($student->gender == 'Female')? 'selected':'' }}>Female</option>

    </select>	
     </div>
   </div>


          
<div class="col-4">
    <div class="form-group">
    <label>Boarding/Day<span style="color:red;">*</span></label>
    <select name="day_boarding" id="day_boarding" required="" class="form-control">
    <option value="" selected="" disabled="">Select Boarding/Day</option>
    <option value="Boarding" {{ ($student->day_boarding == 'Boarding')? 'selected':'' }}>Boarding</option>
    <option value="Day" {{ ($student->day_boarding == 'Day')? 'selected':'' }}>Day</option>
    
    </select>	
    </div>
    </div>


    
 <div class="col-4">
    <div class="form-group">
    <label>Class<span style="color:red;">*</span></label>
    <select name="class"  required="" class="form-control">
    <option value="Senior 1" {{ $student->class == 'Senior 1' ? 'selected' : ''  }} >Senior 1</option>
    <option value="Senior 2" {{ $student->class == 'Senior 2' ? 'selected' : ''  }}>Senior 2</option>
    <option value="Senior 3" {{ $student->class == 'Senior 3' ? 'selected' : ''  }}>Senior 3</option>
    <option value="Senior 4" {{ $student->class == 'Senior 4' ? 'selected' : ''  }}>Senior 4</option>
    <option value="Senior 5" {{ $student->class == 'Senior 5' ? 'selected' : ''  }}>Senior 5</option>
    <option value="Senior 6" {{ $student->class == 'Senior 6' ? 'selected' : ''  }}>Senior 6</option>
    
    </select>
    </div>
    </div>



    </div><!--End 2nd Row--> 
    
 
    

 <!-- 4th Row -->
 <div class="row">






<div class="col-4">
    <div class="form-group">
    <label>Term<span style="color:red;">*</span></label>
    <select name="term"  required="" class="form-control">
    <option value="Term 1" {{ $student->term == 'Term 1' ? 'selected' : ''  }} >Term 1</option>
    <option value="Term 2" {{ $student->term == 'Term 2' ? 'selected' : ''  }}>Term 2</option>
    <option value="Term 3" {{ $student->term == 'Term 3' ? 'selected' : ''  }}>Term 3</option>

    
    </select>
    </div>
    </div>


           
    <div class="col-4">
        <div class="form-group">
        <label>Student Level<span style="color:red;">*</span></label>
        <select name="student_level" id="student_level" required="" class="form-control">
        <option value="" selected="" disabled="">Select Level</option>
        <option value="O-LEVEL" {{ ($student->student_level == 'O-LEVEL')? 'selected':'' }}>O-LEVEL</option>
        <option value="A-LEVEL" {{ ($student->student_level == 'A-LEVEL')? 'selected':'' }}>A-LEVEL</option>
        
        </select>	
        </div>
        </div>




        <div class="col-4"> 
            <div class="form-group">
            <label>Admission Fees: </label> 
            <input type="text" name="admission_fees" class="form-control" required=""  value="{{ $student->admission_fees }}" > 
                 </div>
               </div>
            


    </div><!--End 4th Row--> 





<button type="submit" class="btn btn-rounded btn-primary mb-5">Update Admission Details </button>

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