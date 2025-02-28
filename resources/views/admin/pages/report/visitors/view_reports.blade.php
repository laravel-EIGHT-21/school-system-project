@extends('admin.admin_master')
@section('admin')

@section('title')
Visitors Log Report
@endsection

<section class="content-header">
    <div class="container-fluid">
   <div class="row mb-2">
   <div class="col-sm-6">
   <h1>Visitors Log Report</h1>
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
   Search By Term and Year
   </h3>
   </div>
   
   <div class="card-body">
    <form method="post" action="{{ route('search-by-term') }}" target="_blank">
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
    <label>Enter Year</label>
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
   
   <div class="col-md-4">
   <div class="card">
   <div class="card-header">
   <h3 class="card-title">
   <i class="fas fa-address-book"></i>
   Search By Term and Month
   </h3>
   </div>
   
   <div class="card-body">
    <form method="post" action="{{ route('search-by-months') }}" target="_blank">
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
   <i class="fas fa-address-book"></i>
   Search By Year
   </h3>
   </div>
   
   <div class="card-body">

   <form method="post" action="{{ route('search-by-years') }}" target="_blank">
	 	@csrf

 
<div class="form-group">
    <label>Enter Year</label>
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
   </section>

   

@endsection
