@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-8">
<h1>Update Product Stocktaking</h1>
</div>
<div class="col-sm-4">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Product Stocktaking</li>
</ol>
</div>
</div> 
</div>
</section>
 


 <!-- Main content -->
 <section class="content">
      <div class="container-fluid">
      <div class="row">
  
  <div class="col-12 ">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title"><b>Update Product Stocktaking Details</b></h3>

            
<a href="{{ route('general.itemstock.take.view') }}" class="btn btn-info btn-rounded" style="float:right;"> Back</a>


          </div>
          <!-- /.card-header -->

          <div class="card-body">
          <form method="post" action="{{ route('update.general.itemstock.take',$editData->id) }}" enctype="multipart/form-data">
	 	@csrf

          <div class="row">



          <div class="col-4">
<div class="form-group">
<label>Date<span style="color:red;"></span></label>
<input type="date" name="stock_take_date"  class="form-control" required="" value="{{ $editData->stock_take_date }}"> 
  </div>
  </div>
 

  
<div class="col-4">
<div class="form-group">
<label>Term<span style="color:red;"></span></label>
<select name="term_id" required="" class="form-control">
<option value="" selected="" disabled="">Select Term</option>
@foreach($terms as $term)
<option value="{{ $term->id }}" {{ ($editData->term_id == $term->id)? "selected":"" }}  >{{ $term->name }}</option>
@endforeach

</select>
</div>
</div>

 
<div class="col-4">
<div class="form-group">
<label>Product Category</label>
<select id="category_id" name="category_id"  class="form-control select2">
<option value="" selected="" disabled="">Select Category</option>
@foreach($categories as $supp)
<option value="{{ $supp->id }}" {{ ($editData->category_id == $supp->id)? "selected":"" }} >{{ $supp->name }}</option>
@endforeach

</select>
</div>
</div>


</div> <!-- end 2nd row  -->

<div class="row">



<div class="col-4">
<div class="form-group">
<label>Product<span style="color:red;"></span></label>
<select name="product_id" required="" class="form-control">
<option value="" selected="" disabled="">Select Product</option>
@foreach($items as $medic)
<option value="{{ $medic->id }}" {{ ($editData->product_id == $medic->id)? "selected":"" }}>{{ $medic->name }}</option>
@endforeach
</select> 
</div>
</div>

<div class="col-4">
<div class="form-group">
<label>Number in Good Condition<span style="color:red;"></span></label>
<input type="number" name="good_cond"  class="form-control" required="" value="{{ $editData->good_cond }}"> 
	 </div>
   </div>


 <div class="col-4">
<div class="form-group">
<label> Number in Bad Condition<span style="color:red;"></span></label>
<input type="number" name="bad_cond"  class="form-control" required="" value="{{ $editData->bad_cond }}"  > 
	 </div>
   </div>






</div>  




<div class="row">





   <div class="col-md-4">
<div class="form-group">
<label> Description </label>
<textarea class="form-control" name="description" rows="2" >{{$editData->description}}</textarea>
</div>
</div>
   

</div>

 
<div class="form-group">
<button type="submit" class="btn btn-info" id="storeButton">Update Product Stock-Take Details </button>

</div>


          </form>
</div>



        </div>

        </div>
    </div>
   
             <!-- /.SELECT2 EXAMPLE-->

             </div>
     <!-- /.card -->
     </section>
    <!-- /.content -->


     



@endsection