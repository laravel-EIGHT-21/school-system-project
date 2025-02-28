@extends('admin.admin_master')
@section('admin')



<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-9">
<h1><b><span style="color:green;">{{ $editData['category']['name'] }}`s</span>  Payment Amount Update</b></h1>
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
          <h3 class="card-title"><b> <strong> Year :</strong> <b>{{ $editData->year }}</b> &nbsp;&nbsp;<b> | </b> &nbsp;&nbsp;</b>  <b> <strong> Term :</strong> <b>{{ $editData['term']['name'] }}</b> </h3>

          
        </div>
        <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-12 col-md-offset-1">

<form method="post" action="{{ route('update.other.cost.increment.store',$editData->id) }}">
	 	@csrf

       @php 
    $originalfees = $editData->invoice_amount;
    $fees = $editData->amount_paid;
    $balancefees = (float)$originalfees-(float)$fees;
    @endphp
    
<div class="row">

<div class="col-4">
<div class="form-group">
<label>Inovice Amount<span style="color:red;"></span></label>
<input type="text" name="invoice_amount" class="form-control" readonly value="{{$editData->invoice_amount}}" > 
	 </div>
   </div>

<div class="col-4">
<div class="form-group">
<label>Paid Amount<span style="color:red;"></span></label>
<input type="text" name="amount_paid" class="form-control" readonly value="{{$editData->amount_paid}}" > 
	 </div>
   </div>



   <div class="col-4">
<div class="form-group">
<label>Balance Amount<span style="color:red;"></span></label>
<input type="text" name="amount_paid" class="form-control" readonly value="{{$balancefees}}" > 
	 </div>
   </div>

   </div><!--End 1st Row-->

 
<div class="row">
<div class="col-4">
<div class="form-group">
<label> Amount Paid Update<span style="color:red;">*</span></label>
<input type="text" maxlength="7" name="increment_amount" class="form-control" required="" > 
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



<button type="submit" class="btn btn-rounded btn-primary mb-5">Add Amount Increment Update </button>

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