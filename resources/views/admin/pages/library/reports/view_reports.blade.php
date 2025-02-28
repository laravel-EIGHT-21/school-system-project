@extends('admin.admin_master')
@section('admin')

<section class="content-header">
    <div class="container-fluid">
   <div class="row mb-2">
   <div class="col-sm-6">
   <h1>Search For Issued Books Reports</h1>
   </div>
   <div class="col-sm-6">
   <ol class="breadcrumb float-sm-right">
   <li class="breadcrumb-item"><a href="#">Home</a></li>
   <li class="breadcrumb-item active">Issued Books Reports</li>
   </ol>
   </div>
   </div>
   </div>
   </section>
   
   <section class="content">
   <div class="container-fluid">
   
   <div class="row">
   <div class="col-md-4">
   <div class="card">
   <div class="card-header">
   <h3 class="card-title">
   <i class="fas fa-address-book"></i>
   Search By Date
   </h3>
   </div>
   
   <div class="card-body">
    <form method="post" action="{{ route('search-by-date') }}">
        @csrf

<div class="form-group">
<label>Select Date</label>
<input type="date" name="date" class="form-control"> 
@error('date') 
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
   
   <div class="col-md-4">
   <div class="card">
   <div class="card-header">
   <h3 class="card-title">
   <i class="fas fa-address-book"></i>
   Search By Month & Year
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
   
   <div class="col-md-4">
   <div class="card">
   <div class="card-header">
   <h3 class="card-title">
   <i class="fas fa-add"></i>
   Select Year
   </h3>
   </div>
   
   <div class="card-body">

   <form method="post" action="{{ route('search-by-year') }}" >
	 	@csrf

 
<div class="form-group">
    <label>Enter Year</label>
    <input type="year" name="year" class="form-control"> 
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
   </section>

   

@endsection
