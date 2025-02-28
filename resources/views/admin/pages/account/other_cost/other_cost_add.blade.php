@extends('admin.body.master')
@section('admin')

@section('title')
Add Expense
@endsection


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Add Expense</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Expense</li>
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
          <h3 class="card-title"><b> Add Expense Details</b></h3>

          
        </div>
        <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-12 col-md-offset-1">
<form method="post" action="{{ route('store.other.cost') }}" enctype="multipart/form-data">
	 	@csrf

<div class="row">



   <div class="col-4">
<div class="form-group">
<label>Date<span style="color:red;">*</span></label>
<input type="date" name="date" class="form-control" required="" > 
	 </div>
   </div>


   



<div class="col-md-4">
<div class="form-group">
<label>Term<span style="color:red;">*</span></label> 
<select name="term"  required="" class="form-control">
  <option value="Term 1">Term 1</option>
  <option value="Term 2">Term 2</option>
  <option value="Term 3">Term 3</option>
</select>
</div> 
</div> <!-- end col md 4 -->


  
<div class="col-md-4">
  <div class="form-group">
  <label>Category<span style="color:red;">*</span></label> 
  <select name="category_id" required="" class="form-control">
  <option value="" selected="" disabled="">Select Category</option>
  @foreach($categories as $cate)
  <option value="{{ $cate->id }}">{{ $cate->name }}</option>
  @endforeach
  </select>
  </div>
  </div> <!-- end col md 4 -->
  
  


</div> 

  
   




  <!-- 2nd Row -->
  <div class="row">


  <div class="col-4">
<div class="form-group">
<label>Inovice Amount<span style="color:red;">*</span></label>
<input type="text" name="invoice_amount" class="form-control" required="" > 
	 </div>
   </div>


   <div class="col-4">
<div class="form-group">
<label>Amount Paid<span style="color:red;">*</span></label>
<input type="text" name="amount_paid" class="form-control" required="" > 
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






    </div><!--End 2nd Row--> 
    

    <div class="row">


    <div class="col-4">
<div class="form-group">
<label>Invoice No<span style="color:red;">*</span></label>
<input type="text" name="invoice_no" class="form-control" required="" > 
	 </div>
   </div>



    </div>
 


<button type="submit" class="btn btn-rounded btn-primary mb-5">Submit </button>

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