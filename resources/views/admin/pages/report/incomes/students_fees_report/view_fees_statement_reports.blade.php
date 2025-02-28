
@extends('admin.body.master')
@section('admin')


@section('title')
Students Details
@endsection


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-8">
<h1><b>Student`s Fees Report Generate</b></h1>
</div>
<div class="col-sm-4">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Fees Report Generate</li>
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
          <h3 class="card-title"><b> Student`s Financial Report Generate </b></h3>

          @can('account-salary-view')
<a href="{{ route('schoolfees.statment.view') }}" class="btn btn-success" style="float: right;">Back </a>
@endcan
          
        </div>
        <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-12 col-md-offset-1">

<form method="GET" action="{{ route('search-fees-statment',$allData->id) }}" >
@csrf

	 	<input type="hidden" name="id" value="{{ $allData->id }}">

<div class="row">

<div class="col-3">
<div class="form-group">
<label>Name<span style="color:red;"></span></label>
<input type="text" name="name" class="form-control" readonly value="{{ $allData->name }}" > 
	 </div>
   </div>

   


   <div class="col-3">
    <div class="form-group">
    <label>ID No<span style="color:red;"></span></label>
    <input type="text" name="id_no" class="form-control" readonly value="{{ $allData->id_no}}" > 
         </div>
       </div>



           
<div class="col-md-2">
    <div class="form-group">
    <label>Year <span class="text-danger"></span></label>
    <input type="text" name="year" class="form-control" required > 
    </div>
    </div> <!-- end col md 4 -->
    


  
<div class="col-3">
<div class="form-group">
<label>Class </label>
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




  


   </div><!--End 1st Row-->





</div>

<button type="submit" class="btn btn-rounded btn-info "> Get Financial Statement </button>

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