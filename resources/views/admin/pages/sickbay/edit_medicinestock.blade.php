@extends('admin.body.master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-9">
<h1><b>Update Medicine Stock Information</b></h1>
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
            <h3 class="card-title"><b>Update Medicine Details</b></h3>

            
<a href="{{ route('medics.purchase.view') }}" class="btn btn-info btn-rounded" style="float:right;"> Back</a>


          </div>
          <!-- /.card-header -->

          
          <form method="post" action="{{ route('update.medicine.stock',$editData->id) }}" enctype="multipart/form-data">
            @csrf

          <div class="card-body">



            <div class="row">
  
  
            
  <div class="col-md-4"> 
  <div class="form-group">
  <label>Date</label>
  <input type="date" name="purchase_date"  class="form-control" value="{{ $editData->purchase_date }}"  required> 
      </div>
  </div> <!-- end col md 4 -->
  
  
  
  <div class="col-4">
  <div class="form-group">
  <label>Manufacturing Date<span style="color:red;">*</span></label>
  <input type="date" name="mfg_date" id="mfg_date"  class="form-control" required="" value="{{ $editData->mfg_date }}"> 
      </div>
     </div>
    
  
  <div class="col-4">
  <div class="form-group">
  <label>Expire Date<span style="color:red;">*</span></label>
  <input type="date" name="expire_date" id="expire_date" class="form-control" required="" value="{{ $editData->expire_date }}"> 
      </div>
     </div>
  
   
  
  
  </div> <!-- end 2nd row  -->
  
  <div class="row">
  
  
  <div class="col-md-4"> 
  <div class="form-group">
  <label>Invoice No.</label>
  <input type="text" name="invoice_no" id="invoice_no" class="form-control" required   value="{{ $editData->invoice_no }}"> 
      </div>
  </div> <!-- end col md 4 -->
  
  
  <div class="col-4">
  <div class="form-group">
  <label>Supplier</label>
  <input type="text" name="supplier" id="supplier" class="form-control" required value="{{ $editData->supplier }}"> 
  </div>
  </div>
  
  <div class="col-4">
  <div class="form-group">
  <label>Medicine<span style="color:red;">*</span></label>
  <select name="medicine_id" id="medicine_id" class="form-control select2" required>
  <option value="" selected="" disabled="">Select Medicine</option>
  @foreach($medicines as $medic)
  <option value="{{ $medic->id }}" {{ ($editData->medicine_id == $medic->id)? "selected":"" }}>{{ $medic->name }}</option>
  @endforeach
  </select> 
  </div>
  </div>
                  
  
  
  
  </div>
  
  
  
  
  <div class="row">
  
  
  
  
  <div class="col-4">
      <div class="form-group">
      <label>Medicine Quantity</label>
      <input type="text" class="form-control" name="medicine_qty" required  value="{{ $editData->medicine_qty }}"> 
      </div>
      </div>
  
  
  
  
  <div class="col-4">
      <div class="form-group">
      <label>Quantity Type</label>
      <input type="text" class="form-control" name="quantity_type" required value="{{ $editData->quantity_type }}"> 
      </div>
      </div>
  
  
          
  <div class="col-4">
          <div class="form-group">
          <label>Unit Price</label>
          <input type="text" class="form-control" name="unit_price" required value="{{ $editData->unit_price }}"> 
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
  
      
          <div class="col-4">
              <div class="form-group">
              <label>Notes</label>
              <textarea type="text" class="form-control" name="notes"> {{$editData->notes}}</textarea>
              </div>
              </div>
      
      
      
  
      </div>
  
      <div class="row">
  
          <div class="col-4">
  
                      
  <button type="submit" class="btn btn-rounded btn-info mb-5"> Update Medicine Stock</button>
          </div>
  
      </div>
      
      
  
          </div>
  

          </form>
</div>



        </div>

        </div>
    </div>
   
             <!-- /.SELECT2 EXAMPLE-->

             </div>
     <!-- /.card -->
     </section>
    <!-- /.content -->


     



@endsection