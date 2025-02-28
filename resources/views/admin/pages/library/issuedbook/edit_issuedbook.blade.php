@extends('admin.body.master')
@section('admin')


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1> Update Issued Book Details </h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Update Issued Book</li>
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
          <h3 class="card-title"><b>Update Issued Book Information </b></h3>

          
        </div>
        <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-12 col-md-offset-1">
<form method="post" action="{{ route('update.issued.book.details',$editData->id) }}" enctype="multipart/form-data">
	 	@csrf
	 	<input type="hidden" name="id" value="{{ $editData->id }}">

	 	<input type="hidden" name="student_id" value="{{ $editData->student_id }}">

<div class="row">
<div class="col-4">
<div class="form-group">
<label>Student Name<span style="color:red;">*</span></label>
<input type="text" name="name" class="form-control" readonly value="{{ $editData['student']['name']}}" > 
	 </div>
   </div>

   <div class="col-4">
<div class="form-group">
<label>Student ID<span style="color:red;">*</span></label>
<input type="text" name="id_no" class="form-control" readonly  value="{{ $editData['student']['id_no'] }}" > 
	 </div>
   </div>


   <div class="col-4">
    <div class="form-group">
    <label>Class<span style="color:red;">*</span></label>
    <select name="class" id="class"  required="" class="form-control">
      <option value="Senior 1" {{ $editData->class == 'Senior 1' ? 'selected' : ''  }} >Senior 1</option>
      <option value="Senior 2" {{ $editData->class == 'Senior 2' ? 'selected' : ''  }}>Senior 2</option>
      <option value="Senior 3" {{ $editData->class == 'Senior 3' ? 'selected' : ''  }}>Senior 3</option>
      <option value="Senior 4" {{ $editData->class == 'Senior 4' ? 'selected' : ''  }}>Senior 4</option>
      <option value="Senior 5" {{ $editData->class == 'Senior 5' ? 'selected' : ''  }}>Senior 5</option>
      <option value="Senior 6" {{ $editData->class == 'Senior 6' ? 'selected' : ''  }}>Senior 6</option>
      
      </select>
    </div>
    </div>


   </div><!--End 1st Row-->



  <!-- 2nd Row -->
  <div class="row">

        
  <div class="col-md-4">
    <div class="form-group">
    <label>Term<span style="color:red;">*</span></label> 
    <select name="term"  required="" class="form-control">
    <option value="Term 1" {{ $editData->term == 'Term 1' ? 'selected' : ''  }} >Term 1</option>
    <option value="Term 2" {{ $editData->term == 'Term 2' ? 'selected' : ''  }}>Term 2</option>
    <option value="Term 3" {{ $editData->term == 'Term 3' ? 'selected' : ''  }}>Term 3</option>
    
        
        </select>
    </div>
    </div> <!-- end col md 4 -->
    


<div class="col-4">
<div class="form-group">
<label>Books<span style="color:red;">*</span></label>
<select name="book_id" required="" class="form-control select2">
<option value="" selected="" disabled="">Select Book</option>
@foreach($books as $book)
<option value="{{ $book->id }}" {{ ($editData->book_id == $book->id)? "selected":"" }}>{{ $book->name }}</option>
@endforeach
</select> 
</div>
</div>


      
<div class="col-4">
  <div class="form-group">
  <label>Book Quantity<span style="color:red;">*</span></label>
  <input type="text" name="issued_quantity" class="form-control" required="" value="{{$editData->issued_quantity}}"  > 
  @error('issued_quantity') 
  <span class="text-danger">{{ $message }}</span>
  @enderror 
     </div>
     </div>
  

    </div><!--End 2nd Row--> 
    
    <div class="row">

  

    <div class="col-4">
    <div class="form-group">
<label>Date For Returning</label>
<input type="date" name="return_day" class="form-control" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" required="" value="{{$editData->return_day}}">
@error('return_day') 
<span class="text-danger">{{ $message }}</span>
@enderror 
</div>
</div>

</div>

<button type="submit" class="btn btn-rounded btn-info mb-5"> Issue Book </button>

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