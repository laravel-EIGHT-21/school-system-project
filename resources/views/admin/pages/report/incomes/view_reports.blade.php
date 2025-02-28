
@extends('admin.body.master')
@section('admin')

@section('title')
School Fees Report
@endsection



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>




<section class="content-header">
    <div class="container-fluid">
   <div class="row mb-2">
   <div class="col-sm-6">
   <h1>School Fees Report</h1>
   </div>

   </div>
   </div>
   </section> 
   
   <section class="content">
   <div class="container-fluid">
   
   
<div class="card">
    <div class="card-header border-transparent">
    <h3 class="card-title"><b>School Fees General Reports Search</b></h3>
    <div class="card-tools">
    <button type="button" class="btn btn-tool" data-card-widget="collapse">
    <i class="fas fa-minus"></i>
    </button>

    </div>
    </div>
    
 
    <div class="card-body p-0">
    <div class="row">
        <div class="col-md-4">
        <div class="card">
        <div class="card-header">
        <h3 class="card-title"><b>
        <i class="fas fa-address-book"></i>
        Search By Term
        </b>
        </h3>
        </div>
        
        <div class="card-body">
         <form method="post" action="{{ route('search-student-fees-by-term') }}" target="_blank">
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
     <input type="text" name="year" required class="form-control"> 
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
        <h3 class="card-title"><b>
        <i class="fas fa-address-book"></i>
        Search By Month
        </b>
        </h3>
        </div>
        
        <div class="card-body">
         <form method="post" action="{{ route('search-student-fees-by-months') }}" target="_blank">
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
     <label>Select Month</label>
     <input type="month" name="month" required class="form-control">  
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
         <b>
        <i class="fas fa-address-book"></i>
        Search By Year
         </b>
        </h3>
        </div>
        
        <div class="card-body">
     
        <form method="post" action="{{ route('search-student-fees-by-years') }}" target="_blank">
              @csrf
     
      

              <div class="form-group">
     <label>Enter Year</label>
     <input type="text" name="year" required class="form-control"> 
 
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
    <h3 class="card-title"><b>School Fees Reports per Class Search</b></h3>
    <div class="card-tools">
    <button type="button" class="btn btn-tool" data-card-widget="collapse">
    <i class="fas fa-minus"></i>
    </button>

    </div>
    </div>
    

    <div class="card-body p-0">


    <div class="row">
   <div class="col-md-4">
   <div class="card">
   <div class="card-header">
   <h3 class="card-title">
   <i class="fas fa-address-book"></i>
   Search By Term
   </h3>
   </div>
   
   <div class="card-body">
    <form method="post" action="{{ route('search-school-class-fees-by-term') }}" target="_blank">
        @csrf

<div class="form-group">
<label>Select Term</label>
<select id="term" name="term" class="form-control select2" data-allow-clear="true">
    <option value="">Select Term</option>
    <option value="Term 1">Term 1 </option>
    <option value="Term 2">Term 2 </option>
    <option value="Term 3">Term 3 </option>
    </select>
</div> 



<div class="form-group">
<label>Select Class</label>
<select id="class" name="class" class="form-control select2" >
    <option value="">Select Class</option>
    <option value="Senior 1">Senior 1</option>
    <option value="Senior 2">Senior 2</option>
    <option value="Senior 3">Senior 3</option>
    <option value="Senior 4">Senior 4</option>
    <option value="Senior 5">Senior 5</option>
    <option value="Senior 6">Senior 6</option> 
</select> 
</div> 


<div class="form-group">
     <label>Enter Year</label>
     <input type="text" name="year" class="form-control"> 

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
   Search By Month
   </h3>
   </div>
   
   <div class="card-body">
    <form method="post" action="{{ route('search-school-class-fees-by-months') }}" target="_blank">
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
<label>Select Class</label>
<select id="class" name="class" required class="form-control select2" >
    <option value="">Select Class</option>
    <option value="Senior 1">Senior 1</option>
    <option value="Senior 2">Senior 2</option>
    <option value="Senior 3">Senior 3</option>
    <option value="Senior 4">Senior 4</option>
    <option value="Senior 5">Senior 5</option>
    <option value="Senior 6">Senior 6</option> 
</select> 
</div> 

<div class="form-group">
<label>Select Month</label>
<input type="month" name="month" required class="form-control"> 
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

   <form method="post" action="{{ route('search-school-class-fees-by-years') }}" target="_blank">
	 	@csrf

 
<div class="form-group">
<label>Select Class</label>
<select id="class" name="class" required class="form-control select2" >
    <option value="">Select Class</option>
    <option value="Senior 1">Senior 1</option>
    <option value="Senior 2">Senior 2</option>
    <option value="Senior 3">Senior 3</option>
    <option value="Senior 4">Senior 4</option>
    <option value="Senior 5">Senior 5</option>
    <option value="Senior 6">Senior 6</option> 
</select> 
</div> 

<div class="form-group">
     <label>Enter Year</label>
     <input type="text" name="year" class="form-control"> 
 
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
    <h3 class="card-title"><b>School Fees Categories Reports Search</b></h3>
    <div class="card-tools">
    <button type="button" class="btn btn-tool" data-card-widget="collapse">
    <i class="fas fa-minus"></i>
    </button>

    </div>
    </div>
    

    <div class="card-body p-0">


    <div class="row">
   <div class="col-md-4">
   <div class="card">
   <div class="card-header">
   <h3 class="card-title">
   <i class="fas fa-address-book"></i>
   Search By Term
   </h3>
   </div>
   
   <div class="card-body">
    <form method="post" action="{{ route('search-fees-category-fees-by-term') }}" target="_blank">
        @csrf

<div class="form-group">
<label>Select Term</label>
<select id="term" name="term" class="form-control select2" required data-allow-clear="true">
    <option value="">Select Term</option>
    <option value="Term 1">Term 1 </option>
    <option value="Term 2">Term 2 </option>
    <option value="Term 3">Term 3 </option>
    </select>
</div> 


<div class="form-group">
<label>Fee Category<span style="color:red;">*</span></label>
<select name="fee_category_id" id="fee_category_id"  required="" class="form-control">
<option value="" selected="" disabled="">Select Fee Category</option>
@foreach($fee_categories as $fee)
<option value="{{ $fee->id }}">{{ $fee->name }}</option>
@endforeach
</select>
</div>

<div class="form-group">
     <label>Enter Year</label>
     <input type="text" name="year" class="form-control"> 
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
   Search By Month
   </h3>
   </div>
   
   <div class="card-body">
    <form method="post" action="{{ route('search-fees-category-fees-by-months') }}" target="_blank">
        @csrf

        <div class="form-group">
<label>Select Term</label>
<select id="term" name="term" class="form-control select2" required ="true">
    <option value="">Select Term</option>
    <option value="Term 1">Term 1 </option>
    <option value="Term 2">Term 2 </option>
    <option value="Term 3">Term 3 </option>
    </select>
</div> 


<div class="form-group">
<label>Fee Category<span style="color:red;">*</span></label>
<select name="fee_category_id" id="fee_category_id"  required="" class="form-control">
<option value="" selected="" disabled="">Select Fee Category</option>
@foreach($fee_categories as $fee)
<option value="{{ $fee->id }}">{{ $fee->name }}</option>
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

   <form method="post" action="{{ route('search-fees-category-fees-by-years') }}" target="_blank">
	 	@csrf

 <div class="form-group">
<label>Fee Category<span style="color:red;">*</span></label>
<select name="fee_category_id" id="fee_category_id" required="" class="form-control">
<option value="" selected="" disabled="">Select Fee Category</option>
@foreach($fee_categories as $fee)
<option value="{{ $fee->id }}">{{ $fee->name }}</option>
@endforeach
</select>
</div>


<div class="form-group">
     <label>Enter Year</label>
     <input type="text" name="year" class="form-control"> 
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
    <h3 class="card-title"><b>School Fees Categories Reports per Class Search</b></h3>
    <div class="card-tools">
    <button type="button" class="btn btn-tool" data-card-widget="collapse">
    <i class="fas fa-minus"></i>
    </button>

    </div>
    </div>
    

    <div class="card-body p-0">


    <div class="row">
   <div class="col-md-4">
   <div class="card">
   <div class="card-header">
   <h3 class="card-title">
   <i class="fas fa-address-book"></i>
   Search By Term
   </h3>
   </div>
   
   <div class="card-body">
    <form method="post" action="{{ route('search-class-fees-category-fees-by-term') }}" target="_blank">
        @csrf

<div class="form-group">
<label>Select Term</label>
<select id="term" name="term" class="form-control select2" required data-allow-clear="true">
    <option value="">Select Term</option>
    <option value="Term 1">Term 1 </option>
    <option value="Term 2">Term 2 </option>
    <option value="Term 3">Term 3 </option>
    </select>
</div> 



<div class="form-group">
<label>Select Class</label>
<select id="class" name="class" class="form-control select2" >
    <option value="">Select Class</option>
    <option value="Senior 1">Senior 1</option>
    <option value="Senior 2">Senior 2</option>
    <option value="Senior 3">Senior 3</option>
    <option value="Senior 4">Senior 4</option>
    <option value="Senior 5">Senior 5</option>
    <option value="Senior 6">Senior 6</option> 
</select>
</div> 



<div class="form-group">
<label>Fee Category<span style="color:red;">*</span></label>
<select name="fee_category_id" id="fee_category_id" required="" class="form-control">
<option value="" selected="" disabled="">Select Fee Category</option>
@foreach($fee_categories as $fee)
<option value="{{ $fee->id }}">{{ $fee->name }}</option>
@endforeach
</select>
</div>


<div class="form-group">
     <label>Enter Year</label>
     <input type="text" name="year" class="form-control"> 
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
   Search By Month
   </h3>
   </div>
   
   <div class="card-body">
    <form method="post" action="{{ route('search-class-fees-category-fees-by-months') }}" target="_blank">
        @csrf

        <div class="form-group">
<label>Select Term</label>
<select id="term" name="term" class="form-control select2" data-allow-clear="true">
    <option value="">Select Term</option>
    <option value="Term 1">Term 1 </option>
    <option value="Term 2">Term 2 </option>
    <option value="Term 3">Term 3 </option>
    </select>
</div> 



<div class="form-group">
<label>Select Class</label>
<select id="class" name="class" class="form-control select2" >
    <option value="">Select Class</option>
    <option value="Senior 1">Senior 1</option>
    <option value="Senior 2">Senior 2</option>
    <option value="Senior 3">Senior 3</option>
    <option value="Senior 4">Senior 4</option>
    <option value="Senior 5">Senior 5</option>
    <option value="Senior 6">Senior 6</option> 
</select> 
</div> 



<div class="form-group">
<label>Fee Category<span style="color:red;">*</span></label>
<select name="fee_category_id" id="fee_category_id" required="" class="form-control">
<option value="" selected="" disabled="">Select Fee Category</option>
@foreach($fee_categories as $fee)
<option value="{{ $fee->id }}">{{ $fee->name }}</option>
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

   <form method="post" action="{{ route('search-class-fees-category-fees-by-years') }}" target="_blank">
	 	@csrf

 
<div class="form-group">
<label>Select Class</label>
<select id="class" name="class" class="form-control select2" >
    <option value="">Select Class</option>
    <option value="Senior 1">Senior 1</option>
    <option value="Senior 2">Senior 2</option>
    <option value="Senior 3">Senior 3</option>
    <option value="Senior 4">Senior 4</option>
    <option value="Senior 5">Senior 5</option>
    <option value="Senior 6">Senior 6</option> 
</select> 
</div> 



<div class="form-group">
<label>Fee Category<span style="color:red;">*</span></label>
<select name="fee_category_id" id="fee_category_id" required="" class="form-control">
<option value="" selected="" disabled="">Select Fee Category</option>
@foreach($fee_categories as $fee)
<option value="{{ $fee->id }}">{{ $fee->name }}</option>
@endforeach
</select>
</div>

<div class="form-group">
     <label>Enter Year</label>
     <input type="text" name="year" class="form-control"> 
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
