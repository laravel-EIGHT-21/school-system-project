@extends('admin.admin_master')
@section('admin')



<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-9">
<h1><b><span style="color:green;">{{$editData['student']['name']}}`s</span> &nbsp; {{ $editData['fee_category']['name'] }} Payment Update</b></h1>

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
          <h3 class="card-title"><b> <strong> Year :</strong> <b>{{ $editData['student_year']['name'] }}</b> &nbsp;&nbsp;<b> | </b> &nbsp;&nbsp;</b> <b> <strong> Class :</strong> <b>{{ $editData['student_class']['name'] }}</b> &nbsp;&nbsp;<b> | </b> &nbsp;&nbsp;</b> <b> <strong> Term :</strong> <b>{{ $editData['term']['name'] }}</b> &nbsp;&nbsp;<b> | </b> &nbsp;&nbsp;</b> <b> <strong> Fee Type :</strong> <b>{{ $editData['fee_category']['name'] }}</b> </b> </h3>
          &nbsp;&nbsp;<b> | </b> &nbsp;&nbsp;

          @can('students-fees-details')
<a href="{{ route('student.fees.details',$editData->id) }}" class="btn btn-success" >Back To Fees Details</a>
@endcan
          
        </div>
        <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-12 col-md-offset-1">

<form method="post" action="{{ route('update.student.increment.store',$editData->id) }}">
	 	@csrf

     @php 
$originalfees = $editData->originalfee_amount;

$paidfees = $editData->fee_amount;


$balancefees = (float)$originalfees-(float)$paidfees;


@endphp
    
<div class="row">

<div class="col-4">
<div class="form-group">
<label>Total Fees Amount<span style="color:red;"></span></label>
<input type="text" name="originalfee_amount" class="form-control" readonly value="{{$editData->originalfee_amount}}" > 
	 </div>
   </div>

<div class="col-4">
<div class="form-group">
<label>Paid Fees<span style="color:red;"></span></label>
<input type="text" name="fee_amount" class="form-control" readonly value="{{$editData->fee_amount}}" > 
	 </div>
   </div>



   <div class="col-4">
<div class="form-group">
<label>Balance Fees<span style="color: red;"></span></label>
<input type="text" name="fee_amount" class="form-control" readonly value="{{$balancefees}}" > 
	 </div>
   </div>

   </div><!--End 1st Row-->

 
<div class="row">
<div class="col-4">
<div class="form-group">
<label>Student Fees  Amount Paid Update<span style="color:red;">*</span></label>
<input type="text" maxlength="7" name="increment_fees" class="form-control" required="" > 
	 </div>
   </div>


   <div class="col-4">
<div class="form-group">
<label>Payment Method<span style="color:red;">*</span></label>
<select name="payment_mode" id="payment_mode" required="" class="form-control">
<option value="" selected="" disabled="">Select Method</option>
<option value="Bank Slip">Bank Slip</option>
<option value="Cash">Cash</option>
<option value="Mobile Money">Mobile Money</option>
</select>	
     </div>
   </div>

   </div><!--End 1st Row-->



<button type="submit" class="btn btn-rounded btn-primary mb-5">Add Fees Increment Update </button>

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