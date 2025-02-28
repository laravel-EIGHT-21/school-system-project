@extends('admin.admin_master')
@section('admin')

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Students Management</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Students Details </li>
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

<form method="GET" action="{{ route('student.teacher.year.class.wise') }}">

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
<input type="submit" class="btn btn-rounded btn-info" name="search" value="Search  Student">

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
<h3 class="card-title">O-Level Students List </h3>

</div>

<div class="card-body">

<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th width="5%">SL</th>  
<th>Name</th>
<th>ID No</th>
<th>Year</th>
<th>Class</th>
<th>Shift</th>
<th>Image</th>

</tr>
</thead>
<tbody>
@foreach($allData as $key => $value )
<tr>
<td>{{ $key+1 }}</td>
<td> {{ $value['student']['name'] }}</td>
<td> {{ $value['student']['id_no'] }}</td>	
<td> {{ $value['student_year']['name'] }}</td>	
<td>  {{ $value['student_class']['name'] }}</td>
<td>  {{ $value['shift']['name'] }}</td>		
<td>
<img src="{{ (!empty($value['student']['image']))? url('upload/student_images/'.$value['student']['image']):url('upload/no_image.jpg') }}" style="width: 60px; width: 60px;"> 
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
