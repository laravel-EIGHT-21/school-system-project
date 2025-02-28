@extends('admin.admin_master')
@section('admin')

@section('title')
Products StockTaking Reports
@endsection

<section class="content-header">
    <div class="container-fluid">
   <div class="row mb-2">
   <div class="col-sm-6">
   <h1>StockTaking Reports</h1>
   </div>

   </div>
   </div>
   </section>
   
   <section class="content">
   <div class="container-fluid">
   
   
<div class="card">
    <div class="card-header border-transparent">
    <h3 class="card-title"><b>StockTaking Reports Search</b></h3>
    <div class="card-tools">
    <button type="button" class="btn btn-tool" data-card-widget="collapse">
    <i class="fas fa-minus"></i>
    </button>

    </div>
    </div>
    

    <div class="card-body p-0">


    <div class="row">
   <div class="col-md-6">
   <div class="card">
   <div class="card-header">
   <h3 class="card-title">
   <i class="fas fa-address-book"></i>
   Search By Term
   </h3>
   </div>
   
   <div class="card-body">
    <form method="post" action="{{ route('search-stocktaking-by-term') }}" target="_blank">
        @csrf
        
<div class="form-group">
<label>Select Term</label>
<select name="term_id" id="term_id"  required="" class="form-control">
<option value="" selected="" disabled="">Select Term</option>
@foreach($terms as $term)
<option value="{{ $term->id }}">{{ $term->name }}</option>
@endforeach
</select> 
</div> 

            
<div class="text-xs-right">
<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Search">					 
</div>
</form>

  
   </div>
   
   </div>
   
   </div>
   
   
   
   <div class="col-md-6">
   <div class="card">
   <div class="card-header">
   <h3 class="card-title">
   <i class="fas fa-address-book"></i>
   Search By Year
   </h3>
   </div>
   
   <div class="card-body">

   <form method="post" action="{{ route('search-stocktaking-by-year') }}" target="_blank">
	 	@csrf


<div class="form-group">
    <label>Enter Year</label>
    <input type="month" name="stock_take_year" class="form-control"> 
 @error('stock_take_year') 
 <span class="text-danger">{{ $message }}</span>
 @enderror 
    </div> 

            
<div class="text-xs-right">
<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Search">					 
</div>
</form>        

  
   </div>
   
   </div>
   
   </div>
   
   </div>
   
        
    

    </div>
</div>




<br>
   



<div class="card">
    <div class="card-header border-transparent">
    <h3 class="card-title"><b>Product StockTaking Report Search</b></h3>
    <div class="card-tools">
    <button type="button" class="btn btn-tool" data-card-widget="collapse">
    <i class="fas fa-minus"></i>
    </button>

    </div>
    </div>
    

    <div class="card-body p-0">


    <div class="row">  




    <div class="col-md-6">
   <div class="card">
   <div class="card-header">
   <h3 class="card-title">
   <i class="fas fa-address-book"></i>
   Search By Term 
   </h3>
   </div>
   
   <div class="card-body">

   <form method="post" action="{{ route('search-product-stocktaking-by-term') }}" target="_blank">
	 	@csrf

                
<div class="form-group">
<label>Select Term</label>
<select name="term_id" id="term_id"  required="" class="form-control">
<option value="" selected="" disabled="">Select Term</option>
@foreach($terms as $term)
<option value="{{ $term->id }}">{{ $term->name }}</option>
@endforeach
</select> 
</div> 


         
<div class="form-group">
<label>Product<span style="color:red;"></span></label>
<select name="product_id" required="" class="form-control select2">
<option value="" selected="" disabled="">Select Product</option>
@foreach($items as $medic)
<option value="{{ $medic->id }}">{{ $medic->name }}</option>
@endforeach
</select> 
</div>



            
<div class="text-xs-right">
<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Search">					 
</div>
</form>        

  
   </div>
   
   </div>
   
   </div>







   
   <div class="col-md-6">
   <div class="card">
   <div class="card-header">
   <h3 class="card-title">
   <i class="fas fa-address-book"></i>
   Search By Year
   </h3>
   </div>
   
   <div class="card-body">

   <form method="post" action="{{ route('search-product-stocktaking-by-year') }}" target="_blank">
	 	@csrf

         <div class="form-group">
<label>Product<span style="color:red;"></span></label>
<select name="product_id" required="" class="form-control select2">
<option value="" selected="" disabled="">Select Product</option>
@foreach($items as $medic)
<option value="{{ $medic->id }}">{{ $medic->name }}</option>
@endforeach
</select> 
</div>


<div class="form-group">
    <label>Enter Year</label>
    <input type="month" name="stock_take_year" class="form-control"> 
 @error('stock_take_year') 
 <span class="text-danger">{{ $message }}</span>
 @enderror 
    </div> 

            
<div class="text-xs-right">
<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Search">					 
</div>
</form>        

  
   </div>
   
   </div>
   
   </div>
    
   </div>
   
        
    

    </div>
</div>


<br>


   
   
   </div>
   </section>

   

@endsection
