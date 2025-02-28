@extends('admin.body.master')
@section('admin')


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
 

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Update Student`s Fees Info</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Student`s Fees</li>
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
          <h3 class="card-title"><b> Update Student`s Fees</b></h3>
          @can('students-fees-view')
<a href="{{ route('student.fee.view') }}" class="btn btn-success" style="float: right;">Back </a>
@endcan
          
        </div>
        <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-12 col-md-offset-1">
<form method="post" action="{{ route('student.fees.update',$editData->id) }}" enctype="multipart/form-data">
	 	@csrf
         <input type="hidden" name="id" value="{{ $editData->id }}">

         

<div class="row">
<div class="col-6">
<div class="form-group">
<label>Student Name</label>
<input type="text" name="name" class="form-control" readonly  value="{{ $editData['student']['name'] }}" > 
	 </div>
   </div>


   <div class="col-6">
<div class="form-group">
<label>Student ID_No </label>
<input type="text" name="id_no" class="form-control" readonly  value="{{ $editData['student']['id_no'] }}" > 
	 </div>
   </div>

  
   </div><!--End 1st Row-->
 
    
<!-- 3rd Row -->
<div class="row">


<div class="col-4">
<div class="form-group">
<label>Class <span style="color:red;">*</span></label>
<select name="class" id="class"  required="" class="form-control">
    <option value="Senior 1" {{ $editData->class == 'Senior 1' ? 'selected' : ''  }} >Senior 1</option>
    <option value="Senior 2" {{ $editData->class == 'Senior 2' ? 'selected' : ''  }}>Senior 2</option>
    <option value="Senior 3" {{ $editData->class == 'Senior 3' ? 'selected' : ''  }}>Senior 3</option>
    <option value="Senior 4" {{ $editData->class == 'Senior 4' ? 'selected' : ''  }}>Senior 4</option>
    <option value="Senior 5" {{ $editData->class == 'Senior 5' ? 'selected' : ''  }}>Senior 5</option>
    <option value="Senior 6" {{ $editData->class == 'Senior 6' ? 'selected' : ''  }}>Senior 6</option>
    
    </select>
</div>
</div>






              
<div class="col-4">
    <div class="form-group">
    <label>Boarding/Day<span style="color:red;">*</span></label>
    <select name="day_boarding" id="day_boarding" required="" class="form-control">
    <option value="" selected="" disabled="">Select Boarding/Day</option>
    <option value="Boarding" {{ ($editData->day_boarding == 'Boarding')? 'selected':'' }}>Boarding</option>
    <option value="Day" {{ ($editData->day_boarding == 'Day')? 'selected':'' }}>Day</option>
    
    </select>	
    </div>
    </div>



<div class="col-md-4">
<div class="form-group">
<label>Term<span style="color:red;">*</span></label> 
<select name="term"  required="" class="form-control">
<option value="Term 1" {{ $editData->term == 'Term 1' ? 'selected' : ''  }} >Term 1</option>
<option value="Term 2" {{ $editData->term == 'Term 2' ? 'selected' : ''  }}>Term 2</option>
<option value="Term 3" {{ $editData->term == 'Term 3' ? 'selected' : ''  }}>Term 3</option>

</select>
</div>
</div> <!-- end col md 4 -->




 

    </div><!--End 3nd Row--> 

 <!-- 4th Row -->
 <div class="row">
 
 
<div class="col-md-4">
<div class="form-group">
<label>Fee Category<span style="color:red;">*</span></label>
<select name="fee_category_id" id="fee_category_id" required="" class="form-control">
<option value="" selected="" disabled="">Select Fee Category</option>
@foreach($fee_categories as $fee)
<option value="{{ $fee->id }}" {{ ($editData->fee_category_id == $fee->id)? "selected":"" }}>{{ $fee->name }}</option>
@endforeach
</select>
</div>
</div> <!-- end col md 4 -->



<div class="col-4">
<div class="form-group">
<label>Fees Amount Paid</label>
<input type="text" name="fee_amount" class="form-control" required  value="{{ $editData->fee_amount }}" > 
	 </div>
   </div>


   <div class="col-4">
<div class="form-group"> 
<label>Payment Method</label>
    <select name="payment_mode" id="payment_mode"  class="form-control">
    <option value="" selected="" disabled="">Select Method</option>
    <option value="Bank Slip" {{ ($editData->payment_mode == 'Bank Slip')? 'selected':'' }}>Bank Slip</option>
    <option value="Cash" {{ ($editData->payment_mode == 'Cash')? 'selected':'' }}>Cash</option>
    <option value="Mobile Money" {{ ($editData->payment_mode == 'Mobile Money')? 'selected':'' }}>Mobile Money</option>

    </select>	
     </div>
   </div>



    </div><!--End 4th Row--> 



<button type="submit" class="btn btn-rounded btn-primary mb-5">Update Student`s Fees </button>

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