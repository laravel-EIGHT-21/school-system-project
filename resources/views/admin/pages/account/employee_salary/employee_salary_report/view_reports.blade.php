@extends('admin.body.master')
@section('admin')

@section('title')
Employee`s Salary Report
@endsection


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<section class="content-header">
    <div class="container-fluid">
   <div class="row mb-2">
   <div class="col-sm-6">
   <h1>Employee`s Salary Report</h1>
   </div>

   </div>
   </div>
   </section>
   
   <section class="content">
   <div class="container-fluid">
   
   
<div class="card">
    <div class="card-header border-transparent">
    <h3 class="card-title"><b>Employees` Salary Reports Search</b></h3>
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
   Search By Month
   </h3>
   </div>
   
   <div class="card-body">
    <form method="post" action="{{ route('search-employees-salary-report-by-month') }}" target="_blank">
        @csrf


<div class="form-group">
    <label>Enter Month</label>
    <input type="month" name="month" class="form-control"> 
 @error('month') 
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
   
   
   
   <div class="col-md-6">
   <div class="card">
   <div class="card-header">
   <h3 class="card-title">
   <i class="fas fa-address-book"></i>
   Search By Year
   </h3>
   </div>
   
   <div class="card-body">

   <form method="post" action="{{ route('search-employees-salary-report-by-year') }}" target="_blank">
	 	@csrf


<div class="form-group">
    <label>Year</label>
    <input type="month" name="year" class="form-control"> 
 @error('year') 
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
    <h3 class="card-title"><b>Individual Employee`s Salary Report Search</b></h3>
    <div class="card-tools">
    <button type="button" class="btn btn-tool" data-card-widget="collapse">
    <i class="fas fa-minus"></i>
    </button>

    </div>
    </div>
    

    <div class="card-body p-0">


    <div class="row">  
   
   <div class="col-md-12">
   <div class="card">
   <div class="card-header">
   <h3 class="card-title">
   <i class="fas fa-address-book"></i>
   Search By Year
   </h3>
   </div>
   
   <div class="card-body">

   <form method="post" action="{{ route('search-salary-report-by-year') }}" target="_blank">
	 	@csrf

         <div class="form-group">
<label>Employee Name<span style="color:red;">*</span></label>
<select name="user_id" required="" class="form-control">
<option value="" selected="" disabled="">Select Employee</option>
@foreach($users as $medic)
<option value="{{ $medic->id }}">{{ $medic->name }}</option>
@endforeach
</select> 
</div>

<div class="form-group">
    <label>Year</label>
    <input type="month" name="year" class="form-control"> 
 @error('year') 
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
