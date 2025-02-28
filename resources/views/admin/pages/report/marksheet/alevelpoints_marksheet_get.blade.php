@extends('admin.body.master')
@section('admin')

@section('title')
A-level Students Points Results
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-8">
<h1>A-level Student Exam Result Management</h1>
</div>
<div class="col-sm-4">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Student  Details</li>
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
          <h3 class="card-title"><b> Student Results Report Generate </b></h3>

                
<a href="{{ route('marksheet.generate.view') }}" class="btn btn-success" style="float: right;">Back </a>
          
        </div>
        <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-12 col-md-offset-1">

<form method="GET" action="{{ route('alevel.student.results.details.pdf',$allData->id) }}" target="_blank">
			@csrf

	 	<input type="hidden" name="student_id" value="{{ $allData->id }}">

<div class="row">


<div class="col-4">
<div class="form-group">
<label>Name<span style="color:red;"></span></label>
<input type="text" name="name" class="form-control" readonly value="{{ $allData->name }}" > 
	 </div>
   </div>

     
   <div class="col-4">
    <div class="form-group">
    <label>Class <span style="color:red;">*</span></label>
    <select name="class" id="class"  required="" class="form-control">
        <option value="Senior 1" {{ $allData->class == 'Senior 1' ? 'selected' : ''  }} >Senior 1</option>
        <option value="Senior 2" {{ $allData->class == 'Senior 2' ? 'selected' : ''  }}>Senior 2</option>
        <option value="Senior 3" {{ $allData->class == 'Senior 3' ? 'selected' : ''  }}>Senior 3</option>
        <option value="Senior 4" {{ $allData->class == 'Senior 4' ? 'selected' : ''  }}>Senior 4</option>
        <option value="Senior 5" {{ $allData->class == 'Senior 5' ? 'selected' : ''  }}>Senior 5</option>
        <option value="Senior 6" {{ $allData->class == 'Senior 6' ? 'selected' : ''  }}>Senior 6</option>
        
        </select>
    </div>
    </div>
    
    
    

   <div class="col-4">
    <div class="form-group">
    <label>Year</label>
    <input type="text" name="year" class="form-control" required > 
    </div>
    </div>






   </div><!--End 1st Row-->



  <!-- 2nd Row -->
  <div class="row">



    <div class="col-md-4">
        <div class="form-group">
        <label>Term<span style="color:red;">*</span></label> 
        <select name="term"  required="" class="form-control">
        <option value="Term 1"  >Term 1</option>
        <option value="Term 2" >Term 2</option>
        <option value="Term 3" >Term 3</option>
        </select>
        </div>
        </div> <!-- end col md 4 -->
        
        
        
        
        <div class="col-md-4">
        <div class="form-group">
        <label>Exam Type <span class="text-danger"></span></label>
        <select id="exam_type" name="exam_type" class="form-control select2" data-allow-clear="true">
            <option value="Beginning Of Term" >Beginning Of Term </option>
            <option value="Mid Term" >Mid Term </option>
            <option value="End Of Term">End Of Term</option>
            </select>
        </div>
        </div> <!-- end col md 4 -->
        



    </div><!--End 2nd Row--> 




    
  <!-- 2nd Row -->



</div>

<button type="submit" class="btn btn-rounded btn-info "> Submit </button>

                                  </form>
                          </div>
                      </div>
                          </div>
                          </div>
                          </div>

</div>


      </div>

</section>




<!--
<script type="text/javascript">
          $(document).ready(function(){
              $('select[name="fee_category_id"]').on('change',function(){
                  var fee_category_id = $(this).val();
                  if(fee_category_id) {
                      $.ajax({
                          url:"{{ url('/fee_category/class/ajax')}}/" + fee_category_id,
                          type:"GET",
                          dataType:"json",
                          success:function(data) {
							$('input[name="originalfee_amount"]').html(''); 
                            var d =$('select[name="class_id"]').empty();
                                $.each(data,function(key,value){
                                    $('select[name="class_id"]').append('<option value="' + value.id + '">' + value.name + '</option>');

                                });  
                          },
                      });
                  }else{
                      alert('danger');
                  }
              });


			  $('select[name="class_id"]').on('change',function(){
                  var class_id = $(this).val();
                  if(class_id) {
                      $.ajax({
                          url:"{{ url('/fee_category/feeamount/ajax')}}/" + class_id,
                          type:"GET",
                          dataType:"json",
                          success:function(data) {
                            var d =$('input[name="originalfee_amount"]').empty();
                                $.each(data,function(key,value){
                                    $('input[name="originalfee_amount"]').append('<option value="' + value.id + '">' + value.amount + '</option>');

                                });  
                          },
                      });
                  }else{
                      alert('danger');
                  }
              });


          });
      </script>

        -->

	  

@endsection