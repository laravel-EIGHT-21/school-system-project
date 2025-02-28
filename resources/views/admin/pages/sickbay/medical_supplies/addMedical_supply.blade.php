@extends('admin.body.master')
@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Add Medicine To Clinic</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Medicine Details</li>
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
          <h3 class="card-title"><b> Add New Medicine Details</b></h3>

          
        </div>
        <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-12 col-md-offset-1">
<form method="post" action="{{ route('store.medicine') }}" enctype="multipart/form-data">
	 	@csrf

<div class="row">
<div class="col-4">
<div class="form-group">
<label>Medicine Name<span style="color:red;">*</span></label>
<input type="text" name="name" class="form-control" required="" > 
	 </div>
   </div>


   <div class="col-4">
<div class="form-group">
<label>Medicine Category<span style="color:red;">*</span></label>
<select name="medicine_category_id" required="" class="form-control">
<option value="" selected="" disabled="">Select Medicine Category</option>
@foreach($categories as $cate)
<option value="{{ $cate->id }}">{{ $cate->name }}</option>
@endforeach
</select> 
</div>
</div>


<div class="col-4">
<div class="form-group">
<label>Expire Date<span style="color:red;">*</span></label>
<input type="date" name="expire_date" class="form-control" required="" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" > 
	 </div>
   </div>

  
 

   </div><!--End 1st Row-->

 
 
<button type="submit" class="btn btn-rounded btn-primary mb-5">Add New Medicine Details </button>

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