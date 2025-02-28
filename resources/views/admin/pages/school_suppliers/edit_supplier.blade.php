@extends('admin.admin_master')
@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1><b>Update Supplier Details</b> </h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Supplier Details</li>
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
          <h3 class="card-title"><b> Update Supplier Information</b></h3>

          
        </div>
        <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-12 col-md-offset-1">
<form method="post" action="{{ route('update.school.supplier',$editData->id) }}" enctype="multipart/form-data">
	 	@csrf
         @method('POST')
<input type="hidden" name="id" value="{{$editData->id}}">

<div class="row">
<div class="col-4">
<div class="form-group">
<label> Name<span style="color:red;">*</span></label>
<input type="text" name="name" class="form-control" required="" value="{{ $editData->name }}" > 
	 </div>
   </div>



   <div class="col-4">
<div class="form-group">
<label> Phone<span style="color:red;">*</span></label>
<input type="text" name="phone" maxlength="10" class="form-control" required=""  value="{{ $editData->phone }}"> 
	 </div>
   </div>


   <div class="col-4">
<div class="form-group">
<label>Email <span style="color:red;">*</span></label>
<input type="email" name="email" class="form-control" required="" value="{{ $editData->email }}"> 
	 </div>
   </div>


   </div><!--End 1st Row-->


   
   <div class="row">

<div class="col-6">
<div class="form-group">
<label>Address<span style="color:red;">*</span></label>
<input type="text" name="address" class="form-control" required="" value="{{ $editData->address }}"> 
	 </div>
   </div>


<div class="col-6">
<div class="form-group">
<label> Product Supplied<span style="color:red;">*</span></label>
<input type="text" name="products"  class="form-control" required="" value="{{ $editData->products }}"> 
	 </div>
   </div>

 

   </div><!--End 1st Row-->

 
<button type="submit" class="btn btn-rounded btn-primary mb-5">Update Supplier Information </button>

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