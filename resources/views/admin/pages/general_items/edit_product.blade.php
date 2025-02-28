@extends('admin.body.master')
@section('admin')


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>



<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Update Product Information</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Product Details</li>
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
          <h3 class="card-title"><b> Edit Product Details</b></h3>

                      
    <a href="{{ route('view.products') }}" class="btn btn-info btn-rounded waves-effect waves-light" style="float:right;"><i class="fas fa-plus-circle"> Back </i></a> <br>  <br>               

          
        </div>
        <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-12 col-md-offset-1">
<form method="post" action="{{ route('update.product',$editData->id) }}" id="myForm" >
	 	@csrf

<div class="row">
<div class="col-6">
<div class="form-group">
<label>Product Name</label>
<input type="text" name="name" class="form-control" value="{{ $editData->name }}"> 
	 </div>
   </div>

   

 <div class="col-6">
    <div class="form-group">
    <label>Category</label>
    <select name="category_id" class="form-control select2" >
    <option value="" selected="" disabled="">Select Category</option>
    @foreach($category as $cat)
    <option value="{{ $cat->id }}" {{ ($editData->category_id == $cat->id) ? 'selected' : '' }}>{{ $cat->name }}</option>
    @endforeach
    </select>
    </div>
    </div>


   </div><!--End 1st Row-->



  
    
<button type="submit" class="btn btn-rounded btn-primary mb-5">Update Product Details </button>

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
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                name: {
                    required : true,
                }, 
                 supplier_id: {
                    required : true,
                },
                 unit_id: {
                    required : true,
                },
                 category_id: {
                    required : true,
                },
            },
            messages :{
                name: {
                    required : 'Please Enter Your Product Name',
                },
                supplier_id: {
                    required : 'Please Select One Supplier',
                },
                unit_id: {
                    required : 'Please Select One Unit',
                },
                category_id: {
                    required : 'Please Select One Category',
                },
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>
	  

@endsection