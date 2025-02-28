@extends('admin.admin_master')
@section('admin')

@section('title')
School Financial Statement
@endsection

<section class="content-header">
    <div class="container-fluid">
   <div class="row mb-2">
   <div class="col-sm-9">
   <h1>General School Financial Statement</h1>
   </div>

   </div>
   </div>
   </section>
   
   <section class="content">
   <div class="container-fluid">
   
   
<div class="card">
    <div class="card-header border-transparent">
    <h3 class="card-title"><b>School Financial Reports Search</b></h3>
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
        <h3 class="card-title"><b>
        <i class="fas fa-address-book"></i>
        Search By Month
        </b>
        </h3>
        </div>
        
        <div class="card-body">
         <form method="post" action="{{ route('search-school-incomes-by-months') }}" target="_blank">
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
         <b>
        <i class="fas fa-address-book"></i>
        Search By Year
         </b>
        </h3>
        </div>
        
        <div class="card-body">
     
        <form method="post" action="{{ route('search-school-incomes-by-years') }}" target="_blank">
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
</div>
   





   



   
   
   </div>
   </section>

   

@endsection
