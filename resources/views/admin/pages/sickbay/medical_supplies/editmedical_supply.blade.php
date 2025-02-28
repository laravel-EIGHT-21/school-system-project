@extends('admin.body.master')
@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Update Medical Supply </h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Medical Supply Details</li>
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
          <h3 class="card-title"><b> Update Medical Supply Details</b></h3>

          
        </div>
        <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-12 col-md-offset-1">
<form method="post" action="{{ route('update.medical.supply',$editData->id) }}" enctype="multipart/form-data">
	 	@csrf
         @method('POST')
<input type="hidden" name="id" value="{{$editData->id}}">

<div class="row">
<div class="col-6">
<div class="form-group">
<label>Medical Supply Name<span style="color:red;">*</span></label>
<input type="text" name="name" class="form-control" required="" value="{{ $editData->name }}" > 
	 </div>
   </div>



   <div class="col-6">
    <div class="form-group">
    <label>Availability Status<span style="color:red;">*</span></label>
    <select name="status"  required="" class="form-control">
    <option value="Unavailable" {{ $editData->status == 'Unavailable' ? 'selected' : ''  }} >Unavailable</option>
    <option value="Available" {{ $editData->status == 'Available' ? 'selected' : ''  }}>Available</option>
    <option value="Low" {{ $editData->status == 'Low' ? 'selected' : ''  }}>Low</option>
    </select>
    </div>
    </div>

   
   </div><!--End 1st Row-->


   
 
 
<button type="submit" class="btn btn-rounded btn-primary mb-5">Update Medical Supply Details </button>

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