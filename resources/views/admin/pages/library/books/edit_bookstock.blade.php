@extends('admin.body.master')
@section('admin')


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Update Book Stock</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Book Stock Details</li>
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
          <h3 class="card-title"><b> Update Book Stock Details</b></h3>

          
        </div>
        <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-12 col-md-offset-1">
<form method="post" action="{{ route('update.bookstock',$editData->id) }}" enctype="multipart/form-data">
	 	@csrf
        

<div class="row">
    
<div class="col-4">
<div class="form-group">
<label>Book<span style="color:red;">*</span></label>
<select name="book_id" required="" class="form-control">
<option value="" selected="" disabled="">Select Book</option>
@foreach($books as $cate)
<option value="{{ $cate->id }}" {{ ($editData->book_id == $cate->id)? "selected":"" }}>{{ $cate->name }}</option>
@endforeach
</select> 
</div>
</div>


<div class="col-4">
<div class="form-group">
<label>Book Quantity<span style="color:red;">*</span></label>
<input type="text" name="book_qty" maxlength="3" class="form-control" required="" value="{{ $editData->book_qty}}"> 
	 </div>
   </div>


   <div class="col-4">
<div class="form-group">
<label>Unit Price<span style="color:red;">*</span></label>
<input type="text" name="unit_price" maxlength="7" class="form-control" required="" value="{{ $editData->unit_price }}" > 
	 </div>
   </div>

   </div><!--End 1st Row-->



<!-- 3rd Row -->
<div class="row">




<div class="col-4">
<div class="form-group">
<label>Supplier<span style="color:red;">*</span></label>
<select name="supplier_id" required="" class="form-control">
<option value="" selected="" disabled="">Select Supplier</option>
@foreach($suppliers as $supply)
<option value="{{ $supply->id }}" {{ ($editData->supplier_id == $supply->id)? "selected":"" }}>{{ $supply->name }}</option>
@endforeach
</select> 
</div>
</div>

<div class="col-4">
<div class="form-group">
<label> Date Purchased<span style="color:red;">*</span></label>
<input type="date" name="purchase_date" class="form-control" required="" value="{{ $editData->purchase_date }}"> 
	 </div>
   </div>

   
   <div class="col-4">
<div class="form-group">
<label>Invoice Number<span style="color:red;">*</span></label>
<input type="text" name="invoice_no"  class="form-control" required="" value="{{ $editData->invoice_no }}"> 
	 </div>
   </div>

    </div><!--End 3nd Row--> 

  
 
 
<button type="submit" class="btn btn-rounded btn-primary mb-5">Update Book Stock </button>

                                  </form>
                          </div>
                      </div>
                          </div>
                          </div>
                          </div>

</div>


      </div>

</section>


<script type="text/javascript">
	$(document).ready(function(){
		$('#images').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#showImages').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>

	  

@endsection