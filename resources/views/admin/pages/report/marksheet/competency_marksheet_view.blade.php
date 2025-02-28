@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-9">
<h1>O-Level Students Information Competency Based </h1>
</div>
<div class="col-sm-3">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">MarkSheet Generate </li>
</ol>
</div>
</div>
</div>
</section>
  

<section class="content">
<div class="container-fluid">
<div class="row">

<div class="col-12 ">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title"><b>Students` Search</b></h3>


          </div>
          <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-12 ">

<form method="GET" action="{{ route('competency.report.marksheet.get') }}">

             <div class="row"> <!-- start 2nd row  -->
    
<div class="col-md-4">
<div class="form-group">
<label>Year <span class="text-danger"></span></label>
<select name="year_id" required="" class="form-control">
<option value="" selected="" disabled="">Select Year</option>
@foreach($years as $year)
<option value="{{ $year->id }}" {{ (@$year_id == $year->id)? "selected":"" }} >{{ $year->name }}</option>
@endforeach
</select>
</div>
</div> <!-- end col md 4 -->


<div class="col-md-4">
<div class="form-group">
<label>Class <span class="text-danger"></span></label>
<select name="class_id"  required="" class="form-control">
<option value="" selected="" disabled="">Select Class</option>
@foreach($classes as $class)
<option value="{{ $class->id }}" {{ (@$class_id == $class->id)? "selected":"" }}>{{ $class->name }}</option>
@endforeach
</select>
</div>
</div> <!-- end col md 4 -->


<div class="col-md-4" style="padding-top: 30px;">
<input type="submit" class="btn btn-rounded btn-info" name="search" value="Search For Pupils">

</div> <!-- end col md 4 -->


</div> <!-- end 2nd row  -->

 


                                    </form>
                            </div>
                        </div><!--End of row-->


                            </div>

							</div>

							</div>

                            </div><!--End of  main row-->

        <br>

<div class="row"> 
<div class="col-12">
<div class="card">
<div class="card-header">
<h3 class="card-title"><b> O-Level Students List </b></h3>
</div>

<div class="card-body">

<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th>SL</th>  
<th>Name</th>
<th>Class</th>
<th>Year</th>

<th width="5%">Action</th> 
</tr>
</thead>
<tbody>
@foreach($allData as $key => $value )
<tr>
<td>{{ $key+1 }}</td>
<td> {{ $value['student']['name'] }}</td> 	
<td> {{ $value['student_class']['name'] }}</td>	
<td> {{ $value['student_year']['name'] }}</td> 



	 
<td>

<a target="_blank" title="Get Student Results" href="{{ route('competency.marksheet.generate',$value->id) }}" class="btn btn-sm btn-info"> <i class="fa fa-plus-square"></i> </a>

</td>

</tr>
@endforeach
    
</tbody>              

</table>


</div>



</div>

</div>
</div>

</div>

</section>
<br><br>




@endsection
