@extends('admin.body.master')
@section('admin')


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-9">
  <h1><b>Update Medical Supply Purchases</b></h1>
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
            <h3 class="card-title"><b>Update Medical Supply Details</b></h3>

            
<a href="{{ route('medical.supplies.stock.view') }}" class="btn btn-info btn-rounded" style="float:right;"> Back</a>


          </div>
          <!-- /.card-header -->




          <form method="post" action="{{ route('update.medical.supplies.stock',$editData->id) }}">
	 	@csrf    


          <div class="card-body">



          <div class="row">


          
<div class="col-md-4"> 
<div class="form-group">
<label>Date</label>
<input type="date" name="purchase_date"  class="form-control"   value="{{ $editData->purchase_date }}" required> 
	 </div>
</div> <!-- end col md 4 -->



<div class="col-md-4"> 
    <div class="form-group">
    <label>Invoice No.</label>
    <input type="text" name="invoice_no" id="invoice_no" class="form-control" value="{{ $editData->invoice_no }}" required> 
         </div>
    </div> <!-- end col md 4 -->
    
    
    <div class="col-4">
    <div class="form-group">
    <label>Supplier</label>
    <input type="text" name="supplier" id="supplier" class="form-control" value="{{ $editData->supplier }}" required> 
    </div>
    </div>

 


</div> <!-- end 2nd row  -->

<div class="row">



<div class="col-4">
<div class="form-group">
<label>Medical Equipment<span style="color:red;">*</span></label>
<select name="medic_equipement_id" id="medic_equipement_id" class="form-control select2" required>
<option value="" selected="" disabled="">Select Medical Equipment</option>
@foreach($medic_supply as $medic)
<option value="{{ $medic->id }}" {{ ($editData->medic_equipement_id == $medic->id)? "selected":"" }}>{{ $medic->name }}</option>
@endforeach
</select> 
</div>
</div>
                


<div class="col-4">
    <div class="form-group">
    <label>Equipment Quantity</label>
    <input type="text" class="form-control" name="equipment_qty" value="{{ $editData->equipment_qty }}" required> 
    </div>
    </div>




<div class="col-4">
    <div class="form-group">
    <label>Quantity Type</label>
    <input type="text" class="form-control" name="equipment_qty_type"  value="{{ $editData->equipment_qty_type }}" required> 
    </div>
    </div>


</div>




<div class="row">





        
<div class="col-4">
        <div class="form-group">
        <label>Unit Price</label>
        <input type="text" class="form-control" name="unit_price" value="{{ $editData->unit_price }}" required> 
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

    
        <div class="col-4">
            <div class="form-group">
            <label>Notes</label>
            <textarea type="text" class="form-control" name="notes">{{$editData->notes}} </textarea>
            </div>
            </div>

    
    </div>


    <div class="row">

        <div class="col-4">

                    
<button type="submit" class="btn btn-rounded btn-info mb-5"> Update Medical Supply Stock</button>
        </div>

    </div>
    
    

        </div>



</form>



        </div>
    </div>

             <!-- /.SELECT2 EXAMPLE-->

             </div>
     <!-- /.card -->



     <br/><br/>
     <br/><br/>
    

     </section>
    <!-- /.content -->




     

      
 



@endsection