@extends('admin.body.master')
@section('admin')


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-9">
<h1><b>Add New Purchase Information</b></h1>
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
            <h3 class="card-title"><b> New Purchase Details</b></h3>

            
<a href="{{ route('purchase.all') }}" class="btn btn-info btn-rounded" style="float:right;"> Back</a>


          </div>
          <!-- /.card-header -->



          <form method="post" action="{{ route('purchase.store') }}">
            @csrf    
          <div class="card-body">



          <div class="row">


          
<div class="col-md-4"> 
<div class="form-group">
<label>Date</label>
<input type="date" name="date" id="date" class="form-control"  > 
	 </div>
</div> <!-- end col md 4 -->

 
<div class="col-md-4"> 
<div class="form-group">
<label>Invoice No.</label>
<input type="text" name="invoice_no" id="invoice_no" class="form-control" > 
	 </div>
</div> <!-- end col md 4 -->


<div class="col-4">
<div class="form-group">
<label>Supplier</label>
<input type="text" name="supplier" id="supplier" class="form-control" > 
</div>
</div>


</div> <!-- end 2nd row  -->

<div class="row">


<div class="col-4">
<div class="form-group">
<label>Product</label>
<select name="purchase_id" id="purchase_id" required="" class="form-control select2">
<option  selected="" >Product</option>
@foreach($items as $cat)
<option value="{{ $cat->id }}">{{ $cat->name }}</option>
@endforeach
</select>
</div>
</div>




<div class="col-4">
    <div class="form-group">
    <label>Quantity</label>
    <input type="text" class="form-control" name="item_qty" > 
    </div>
    </div>



        
    <div class="col-4">
        <div class="form-group">
        <label>Unit Price</label>
        <input type="text" class="form-control" name="unit_price" > 
        </div>
        </div>    
                



</div>




<div class="row">



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

    
        <div class="col-6">
            <div class="form-group">
            <label>Notes</label>
            <input type="text" class="form-control" name="notes"> 
            </div>
            </div>
    
    
    
    
    
    
    </div>

    <div class="row">

        <div class="col-4">

                    
<button type="submit" class="btn btn-rounded btn-info mb-5"> Add New Puchases</button>
        </div>

    </div>
    
    

        </div>



</form>



        </div>
    </div>
   
             <!-- /.SELECT2 EXAMPLE-->

             </div>
     <!-- /.card -->
     </section>
    <!-- /.content -->




     

      
 



@endsection