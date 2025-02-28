@extends('admin.body.master')
@section('admin')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-9">
<h1><b>Add New Book-Stock Purchase Information</b></h1>
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
            <h3 class="card-title"><b> Add New Book Details</b></h3>

            
<a href="{{ route('library.bookstock.view') }}" class="btn btn-info btn-rounded" style="float:right;"> Back</a>


          </div>
          <!-- /.card-header -->

          
<form method="post" action="{{ route('store.bookstock') }}">
    @csrf    

          <div class="card-body">


          <div class="row">


          
<div class="col-md-4"> 
<div class="form-group">
<label>Purchased Date</label>
<input type="date" name="purchase_date" class="form-control"  > 
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
<label>Books</label>
<select name="book_id" id="book_id"  class="form-control select2">
<option value="" selected="" disabled="">Select Book</option>
@foreach($books as $book)
<option value="{{ $book->id }}">{{ $book->name }}</option>
@endforeach
</select>
</div>
</div>


<div class="col-4">
    <div class="form-group">
    <label> Book Quantity<span style="color:red;">*</span></label>
    <input type="text" name="book_qty" class="form-control" required="" > 
         </div>
       </div>

       
<div class="col-4">
    <div class="form-group">
    <label> Unit Price<span style="color:red;">*</span></label>
    <input type="text" name="unit_price" class="form-control" required="" > 
         </div>
       </div>



    
</div> <!-- end 2nd row  -->


<div class="col-md-4" style="padding-top: 30px;">
 
<div class="form-group">
    <button type="submit" class="btn btn-info" >Add New Book Purchase </button>
    
    </div>   		
     	</div><!-- End col-md-5 -->

</div>  



</form>

         <br>


        </div>

        </div>
    </div>
   
             <!-- /.SELECT2 EXAMPLE-->

             </div>
     <!-- /.card -->
     </section>
    <!-- /.content -->





@endsection