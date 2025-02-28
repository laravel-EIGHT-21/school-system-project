@extends('admin.body.master')
@section('admin')


@section('title')
O-Level Results Details
@endsection


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-12"> 
<h1><b>Results Marks Report Generate (Primary Setting)</b></h1>
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
          <h3 class="card-title"><b> Results Report Generate (Primary Setting)</b></h3>

        
<a href="{{ route('marksheet.generate.view') }}" class="btn btn-success" style="float: right;">Back </a>

          
        </div>
        <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-12 col-md-offset-1">

<form method="GET" action="{{ route('students.results.details.pdf',$allData->id) }}" >
			@csrf

	 	<input type="hidden" name="student_id" value="{{ $allData->id }}">

<div class="row">

<div class="col-4">
<div class="form-group">
<label>Name<span style="color:red;"></span></label>
<input type="text" name="name" class="form-control" readonly value="{{ $allData->name }}" > 
	 </div>
   </div>


     
<div class="col-4">
    <div class="form-group">
    <label>Class <span style="color:red;">*</span></label>
    <select name="class" id="class"  required="" class="form-control">
        <option value="Senior 1" {{ $allData->class == 'Senior 1' ? 'selected' : ''  }} >Senior 1</option>
        <option value="Senior 2" {{ $allData->class == 'Senior 2' ? 'selected' : ''  }}>Senior 2</option>
        <option value="Senior 3" {{ $allData->class == 'Senior 3' ? 'selected' : ''  }}>Senior 3</option>
        <option value="Senior 4" {{ $allData->class == 'Senior 4' ? 'selected' : ''  }}>Senior 4</option>
        <option value="Senior 5" {{ $allData->class == 'Senior 5' ? 'selected' : ''  }}>Senior 5</option>
        <option value="Senior 6" {{ $allData->class == 'Senior 6' ? 'selected' : ''  }}>Senior 6</option>
        
        </select>
    </div>
    </div>
    
    
    

   <div class="col-4">
    <div class="form-group">
    <label>Year</label>
    <input type="text" name="year" class="form-control" required > 
    </div>
    </div>



  


   </div><!--End 1st Row-->



  <!-- 2nd Row -->
  <div class="row">





  <div class="col-md-4">
<div class="form-group">
<label>Term<span style="color:red;">*</span></label> 
<select name="term"  required="" class="form-control">
<option value="Term 1"  >Term 1</option>
<option value="Term 2" >Term 2</option>
<option value="Term 3" >Term 3</option>
</select>
</div>
</div> <!-- end col md 4 -->




<div class="col-md-4">
<div class="form-group">
<label>Exam Type <span class="text-danger"></span></label>
<select id="exam_type" name="exam_type" class="form-control select2" data-allow-clear="true">
    <option value="Beginning Of Term" >Beginning Of Term </option>
    <option value="Mid Term" >Mid Term </option>
    <option value="End Of Term">End Of Term</option>
    </select>
</div>
</div> <!-- end col md 4 -->




    </div><!--End 2nd Row--> 




    



<button type="submit" class="btn btn-rounded btn-info "> Generate Report Card </button>

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