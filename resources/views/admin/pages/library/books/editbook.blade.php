@extends('admin.body.master')
@section('admin')


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Update Book</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Book Details</li>
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
          <h3 class="card-title"><b> Update Book Details</b></h3>

          
        </div>
        <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-12 col-md-offset-1">
<form method="post" action="{{ route('update.book',$editData->id) }}" enctype="multipart/form-data">
	 	@csrf
         @method('POST')
<input type="hidden" name="id" value="{{$editData->id}}">

<div class="row">
<div class="col-4">
<div class="form-group">
<label>Book Name<span style="color:red;">*</span></label>
<input type="text" name="name" class="form-control" required="" value="{{ $editData->name }}" > 
	 </div>
   </div>


   <div class="col-4">
<div class="form-group">
<label>Category<span style="color:red;">*</span></label>
<select name="category_id" required="" class="form-control">
<option value="" selected="" disabled="">Select Category</option>
@foreach($categories as $cate)
<option value="{{ $cate->id }}" {{ ($editData->category_id == $cate->id)? "selected":"" }}  >{{ $cate->name }}
@endforeach
</select> 
</div>
</div>


<div class="col-4">
<div class="form-group">
<label>Author<span style="color:red;">*</span></label>
<select name="author_id" required="" class="form-control">
<option value="" selected="" disabled="">Select Author</option>
@foreach($authors as $auth)
<option value="{{ $auth->id }}" {{ ($editData->author_id == $auth->id)? "selected":"" }}  >{{ $auth->name }}
@endforeach
</select> 
</div>
</div>

  
 

   </div><!--End 1st Row-->



<!-- 3rd Row -->
<div class="row">



   <div class="col-4">
<div class="form-group">
<label> Date Added<span style="color:red;">*</span></label>
<input type="date" name="add_date" class="form-control" required="" value="{{ $editData->add_date }}" > 
	 </div>
   </div>

   <div class="col-4">
<div class="form-group">
<label>Book Photo</label>
<input type="file" name="image" class="form-control" id="images" > 
    </div>  
    </div> 

<div class="col-4">
<div class="form-group">
<img id="showImages" src="{{ (!empty($editData->image))? url('upload/book_images/'.$editData->image):url('upload/no_image.jpg') }}" style="width: 100px; width: 100px; border: 1px solid #000000;">
</div>
</div> 

    </div><!--End 3nd Row--> 

 
 
<button type="submit" class="btn btn-rounded btn-primary mb-5">Update Book Details </button>

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