@extends('admin.admin_master')
@section('admin')

@section('title')
Student Admissions Report
@endsection


<section class="content-header">
    <div class="container-fluid">
   <div class="row mb-2">
   <div class="col-sm-6">
   <h1>Search For Student Admissions Reports</h1>
   </div>

   </div>
   </div>
   </section>
   
   <section class="content">
   <div class="container-fluid">
   
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
    <form method="post" action="{{ route('search-by-month') }}">
        @csrf

<div class="form-group">
<label>Select Month</label>
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

   <form method="post" action="{{ route('search-by-year') }}" >
	 	@csrf

 
<div class="form-group">
    <label>Enter Year</label>
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
   
   </div>
   
   
   
   
   </div>
   </section>

   

@endsection
