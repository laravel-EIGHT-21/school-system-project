@extends('admin.admin_master')
@section('admin')



<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Book Quantity Increment</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Book Quantity Increment</li>
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
          <h3 class="card-title"><b> Book Quantity Increment</b></h3>

          
        </div>
        <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-12 col-md-offset-1">

<form method="post" action="{{ route('update.increment.bookstock',$editData->id) }}">
	 	@csrf

<div class="row">
<div class="col-4">
<div class="form-group">
<label>Quantity Increment<span style="color:red;">*</span></label>
<input type="text" name="increment_qty" maxlength="3" class="form-control" required="" > 
	 </div>
   </div>


   <div class="col-4">
<div class="form-group">
<label>Increment Date<span style="color:red;">*</span></label>
<input type="date" name="increment_date" class="form-control" required="" > 
	 </div>
   </div>
  
   
   </div><!--End 1st Row-->



<button type="submit" class="btn btn-rounded btn-primary mb-5">Add Quantity increment </button>

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