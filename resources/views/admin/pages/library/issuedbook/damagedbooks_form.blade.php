@extends('admin.body.master')
@section('admin')

<section class="content">
<div class="container-fluid">
<div class="row">
  
<div class="col-12 ">

    <div class="card card-default">
        <div class="card-header"> 
          <h3 class="card-title"><b> Enter Number of Books Not Damaged</b></h3>

          
        </div>
        <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-12 col-md-offset-1">

<form method="post" action="{{ route('update.non.damagedbooks',$editData->id) }}">
	 	@csrf

<div class="row">
<div class="col-6">
<div class="form-group">
<label>Number of Books Not Damaged <span style="color:red;">*</span></label>
<input type="text" name="good_books_cond" maxlength="3" class="form-control" required="" > 
	 </div>
   </div>


   <div class="col-6">
<div class="form-group">
<label>Number of Books Issued <span style="color:red;"></span></label>
<input type="text" name="issued_quantity" class="form-control" readonly value="{{$editData->issued_quantity}}" > 
	 </div>
   </div>

   
   </div><!--End 1st Row-->



<button type="submit" class="btn btn-rounded btn-primary mb-5">Submit </button>

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