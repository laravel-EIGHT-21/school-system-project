@extends('admin.admin_master')
@section('admin')



<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1><b><span style="color:green;">{{$editData->name}}`s</span> Salary Increment</b></h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Salary Increment</li>
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
          <h3 class="card-title"><b> Employee Salary Increment</b></h3>

          
        </div>
        <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-12 col-md-offset-1">

<form method="post" action="{{ route('update.increment.store',$editData->id) }}">
	 	@csrf

<div class="row">

<div class="col-6">
<div class="form-group">
<label>Current Salary</label>
<input type="text" name="salary" class="form-control" readonly value="{{$editData->salary}}" > 
	 </div>
   </div>

<div class="col-6">
<div class="form-group">
<label>Enter Salary Increment Amount<span style="color:red;">*</span></label>
<input type="text" name="increment_salary" class="form-control" required="" > 
	 </div>
   </div>



  
   
   </div><!--End 1st Row-->



<button type="submit" class="btn btn-rounded btn-primary mb-5">Add Salary increment </button>

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