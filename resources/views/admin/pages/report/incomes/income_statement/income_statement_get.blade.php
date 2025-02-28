@extends('admin.body.master')
@section('admin')

@section('title')
Financial Statement Reports
@endsection


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>



<section class="content-header">
    <div class="container-fluid">
   <div class="row mb-2">
   <div class="col-sm-6">
   <h1><b>Financial Statement Reports  </b></h1>
   </div>

   </div>
   </div>
   </section>
   
   <section class="content">
   <div class="container-fluid">
   
   
<div class="card">
    <div class="card-header border-transparent">
    <h3 class="card-title"><b>School Financial Statements Report Search</b></h3>
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
   Search By Term & Year
   </h3>
   </div>
   
   <div class="card-body">
    <form method="post" action="{{ route('search-income-statement-report-by-term-year') }}" target="_blank">
        @csrf

<div class="form-group">
<label>Select Term</label>
<select id="term" name="term" required class="form-control select2" data-allow-clear="true">
    <option value="">Select Term</option>
    <option value="Term 1">Term 1 </option>
    <option value="Term 2">Term 2 </option>
    <option value="Term 3">Term 3 </option>
</select> 
</div> 

<div class="form-group">
<label>Enter Year</label>
<input type="text" name="year" class="form-control" >
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

   <form method="post" action="{{ route('search-income-statement-report-by-year') }}" target="_blank">
	 	@csrf

 

       <div class="form-group">
<label>Enter Year</label>
<input type="text" name="year" class="form-control" > 
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


   
   
   </div>
   </section>

   

@endsection
