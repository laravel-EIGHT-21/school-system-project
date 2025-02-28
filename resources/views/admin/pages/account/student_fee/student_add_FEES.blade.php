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
<h1> Add Student`s Fees </h1>
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

                    
          @can('students-fees-details')
<a href="{{ route('student.fees.details',$allData->id) }}" class="btn btn-success" style="float: right;">View Fees Details</a>
@endcan

          
        </div>
        <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-12 col-md-offset-1">
<form method="post" action="{{ route('account.fee.store',$allData->student_id) }}" >
	 	@csrf


<div class="row">
<div class="col-4">
<div class="form-group">
<label>Pupil Name<span style="color:red;"></span></label>
<input type="text" name="name" class="form-control" readonly  value="{{ $allData['student']['name'] }}" > 
	 </div>
   </div>

   <div class="col-4">
<div class="form-group">
<label>Pupil ID<span style="color:red;"></span></label>
<input type="text" name="id_no" class="form-control" readonly value="{{ $allData['student']['id_no'] }}" > 
	 </div>
   </div>



   <div class="col-4">
<div class="form-group">
<label>Year <span style="color:red;">*</span></label>
<select name="year_id" id="year_id"  readonly class="form-control">
@foreach($years as $year)
<option readonly value="{{ $year->id }}" {{ ($allData->year_id == $year->id)? "selected":"" }}>{{ $year->name }}</option>
@endforeach

</select>
</div>
</div>
  


   </div><!--End 1st Row-->



  <!-- 2nd Row -->
  <div class="row">


  <div class="col-4">
<div class="form-group">
<label>Class <span style="color:red;">*</span></label>
<select name="class_id" id="class_id" class="form-control select2">
@foreach($classes as $class)
<option readonly value="{{ $class->id }}" {{ ($allData->class_id == $class->id)? "selected":"" }}>{{ $class->name }}</option>
@endforeach

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
<input type="text" name="originalfee_amount" id="fee_cate_amount" style="background-color:#ddd"  class="form-control" required="" > 
	 </div>
   </div>





    </div><!--End 2nd Row--> 




    
  <!-- 2nd Row -->
  <div class="row">

  

  <div class="col-md-4">
<div class="form-group">
<label>Term<span style="color:red;">*</span></label> 
<select name="term_id" required="" class="form-control">
<option value="" selected="" disabled="">Select Term</option>
@foreach($fee_terms as $term)
<option value="{{ $term->id }}">{{ $term->name }}</option>
@endforeach
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

<button type="submit" class="btn btn-rounded btn-info mb-5"> Add Pupil Fees</button>

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
             $(document).on('change',['#class_id','#fee_category_id'],function(){
                 var fee_category_id = $('#fee_category_id').val();
                 var class_id = $('#class_id').val();
                 $.ajax({
                     url:"{{ route('check-fee-category-amount') }}",
                     type: "GET",
                     data:{'class_id':class_id,'fee_category_id':fee_category_id},
                     success:function(data){                   
                         $('#fee_cate_amount').val(data);
                     }
                 });
             });
         });
     </script>




	  

@endsection