@extends('admin.body.master')
@section('admin')


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-9">
<h1><b>Update Purchase Information</b></h1>
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
            <h3 class="card-title"><b> Update Purchase Stock Details</b></h3>

            
<a href="{{ route('purchase.all') }}" class="btn btn-info btn-rounded" style="float:right;"> Back</a>


          </div>
          <!-- /.card-header -->



   
          <form method="post" action="{{ route('update.purchase.information',$editData->id ) }}" enctype="multipart/form-data">
            @csrf


          <div class="card-body">



          <div class="row">


          
<div class="col-md-4"> 
<div class="form-group">
<label>Date</label>
<input type="date" name="date" id="date" class="form-control" value="{{$editData->date}}" > 
	 </div>
</div> <!-- end col md 4 -->

 
<div class="col-md-4"> 
<div class="form-group">
<label>Invoice No.</label>
<input type="text" name="invoice_no" id="invoice_no" class="form-control" value="{{$editData->invoice_no}}"> 
	 </div>
</div> <!-- end col md 4 -->


<div class="col-4">
<div class="form-group">
<label>Supplier</label>
<input type="text" name="supplier" id="supplier" class="form-control" value="{{$editData->supplier}}" > 
</div>
</div>


</div> <!-- end 2nd row  -->

<div class="row">


<div class="col-4">
<div class="form-group">
<label>Product</label>
<select name="purchase_id" id="purchase_id" required="" class="form-control select2">
<option  selected="" >Product</option>
@foreach($items as $cate)
<option value="{{ $cate->id }}"  {{ ($editData->purchase_id == $cate->id)? "selected":"" }}>{{ $cate->name }}</option>
@endforeach
</select>
</div>
</div>




<div class="col-4">
    <div class="form-group">
    <label>Quantity</label>
    <input type="text" class="form-control" name="item_qty" value="{{$editData->item_qty}}"> 
    </div>
    </div>



        
    <div class="col-4">
        <div class="form-group">
        <label>Unit Price</label>
        <input type="text" class="form-control" name="unit_price" value="{{$editData->unit_price}}"> 
        </div>
        </div>    
                



</div>




<div class="row">



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

    
        <div class="col-6">
            <div class="form-group">
            <label>Notes</label>
            <input type="text" class="form-control" name="notes" value="{{$editData->notes}}"> 
            </div>
            </div>
    
    
    
    
    
    
    </div>

    <div class="row">

        <div class="col-4">

                    
<button type="submit" class="btn btn-rounded btn-info mb-5"> Update Puchase Stock</button>
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