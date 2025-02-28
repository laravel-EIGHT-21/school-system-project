@extends('admin.body.master')
@section('admin')
@section('title')
Employee Salary Update
@endsection


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Update Employee Monthly Salary </h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Employee Salary Details </li>
</ol>
</div>
</div>
</div>
</section>

<section class="content">
<div class="container-fluid">
<div class="row">
  
<div class="col-12 ">

    <div class="card card-default">
        <div class="card-header">
        <h4 class="card-title"><strong>Update Employee Monthly Salary</strong></h4>


        @can('account-salary-view')
<a href="{{ route('account.salary.view') }}" class="btn btn-success" style="float: right;">View All Details</a>
@endcan
          
        </div>
        <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-12 col-md-offset-1">
<form action="{{ route('account.salary.update',$allData->id) }}" method="post" >
	 	@csrf

<div class="row">
   

 <div class="col-6">
<div class="form-group">
<label>Employee Name<span style="color:red;">*</span></label>
<select name="user_id" required="" class="form-control">
<option value="" selected="" disabled="">Select Employee</option>
@foreach($users as $medic)
<option value="{{ $medic->id }}" {{ ($allData->user_id == $medic->id)?'selected':'' }}>{{ $medic->name }}</option>
@endforeach
</select> 
</div>
</div>

   <div class="col-6">
<div class="form-group">
<label> Update Monthly Salary<span style="color:red;">*</span></label>
<input type="text" name="amount" class="form-control" required="" value="{{ $allData->amount }}"> 
	 </div>
   </div>

  

 

   </div><!--End 1st Row-->




 

 
<button type="submit" class="btn btn-rounded btn-primary mb-5">Update Monthly Salary </button>

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