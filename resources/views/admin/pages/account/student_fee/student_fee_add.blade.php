@extends('admin.body.master')
@section('admin')

@section('title')
Student`s Fees Add
@endsection



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
 

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1> Add Student Fees </h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Student Fees Details</li>
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
          <h3 class="card-title"><b> Add Student Fees </b></h3>

          @can('students-fees-get')
<a href="{{ route('get.student.fee') }}" class="btn btn-success" style="float: right;">Back </a>
@endcan


          
        </div>
        <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-12 col-md-offset-1">
<form method="post" action="{{ route('account.fee.store',$allData->id) }}" enctype="multipart/form-data">
	 	@csrf
	 	<input type="hidden" name="id" value="{{ $allData->id }}">

<div class="row">
<div class="col-4">
<div class="form-group">
<label>Student Name<span style="color:red;"></span></label>
<input type="text" name="name" class="form-control" readonly  value="{{ $allData->name }}" > 
	 </div>
   </div>

   <div class="col-4">
<div class="form-group">
<label>Student ID<span style="color:red;"></span></label>
<input type="text" name="id_no" class="form-control" readonly value="{{ $allData->id_no }}" > 
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
    
  


   </div><!--End 1st Row-->



  <!-- 2nd Row -->
  <div class="row">

              
<div class="col-4">
    <div class="form-group">
    <label>Boarding/Day<span style="color:red;">*</span></label>
    <select name="day_boarding" id="day_boarding" required="" class="form-control">
    <option value="" selected="" disabled="">Select Boarding/Day</option>
    <option value="Boarding" {{ ($allData->day_boarding == 'Boarding')? 'selected':'' }}>Boarding</option>
    <option value="Day" {{ ($allData->day_boarding == 'Day')? 'selected':'' }}>Day</option>
    
    </select>	
    </div>
    </div>


<div class="col-md-4">
<div class="form-group">
<label>Fee Category<span style="color:red;">*</span></label>
<select name="fee_category_id" id="fee_category_id"  required="" class="form-control select2">
<option value="" selected="" disabled="">Select Fee Category</option>
@foreach($fee_categories as $fee)
<option value="{{ $fee->id }}">{{ $fee->name }}</option>
@endforeach
</select>
</div>
</div> <!-- end col md 4 -->
 

<div class="col-md-4">
<div class="form-group">
<label>Total Fee Amount<span style="color:red;">*</span></label>
<input type="text" name="totalfee_amount" id="fee_cate_amount" style="background-color:#ddd"  class="form-control" required="" > 
	 </div>
   </div>



    </div><!--End 2nd Row--> 




    
  <!-- 2nd Row -->
  <div class="row">

  
  <div class="col-md-4">
<div class="form-group">
<label>Term<span style="color:red;">*</span></label> 
<select name="term"  required="" class="form-control">
<option value="Term 1" {{ $allData->term == 'Term 1' ? 'selected' : ''  }} >Term 1</option>
<option value="Term 2" {{ $allData->term == 'Term 2' ? 'selected' : ''  }}>Term 2</option>
<option value="Term 3" {{ $allData->term == 'Term 3' ? 'selected' : ''  }}>Term 3</option>

    
    </select>
</div>
</div> <!-- end col md 4 -->





<div class="col-4">
<div class="form-group">
<label>Fees Amount Paid<span style="color:red;">*</span></label>
<input type="text" maxlength="7" name="fee_amount" class="form-control" required="" > 
</div>
</div>


<div class="col-4">
<div class="form-group">
<label>Payment Method</label>
<select name="payment_mode" id="payment_mode" class="form-control">
<option value="" selected="" disabled="">Select Method</option>
<option value="Bank Slip">Bank Slip</option>
<option value="Cash">Cash</option>
<option value="Mobile Money">Mobile Money</option>
</select>	
     </div>
   </div>



  </div><!--End 2nd Row--> 
  



</div>

<button type="submit" class="btn btn-rounded btn-info mb-5"> Add Student Fees</button>

                                  </form>
                          </div>
                      </div>
                          </div>
                          </div>
                          </div>

</div>


      </div>

</section>


      
<script type="text/javascript">
         $(function(){
             $(document).on('change',['#class','#day_boarding','#fee_category_id'],function(){
                 var fee_category_id = $('#fee_category_id').val();
                 var classes = $('#class').val();
                 var day_boarding =$('#day_boarding').val();
                 $.ajax({
                     url:"{{ route('check-fee-category-amount') }}",
                     type: "GET",
                     data:{'class':classes,'day_boarding':day_boarding,'fee_category_id':fee_category_id},
                     success:function(data){                   
                         $('#fee_cate_amount').val(data);
                     }
                 });
             });
         });
     </script>

	  





	  

@endsection