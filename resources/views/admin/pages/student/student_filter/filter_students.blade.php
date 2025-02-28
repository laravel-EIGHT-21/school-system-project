
@extends('admin.body.master')
@section('admin')

 
@section('title')

Students Information

@endsection


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>All Students Information</h1>
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

<form method="GET" action="{{ route('filter.class.wise') }}">

             <div class="row"> <!-- start 2nd row  -->


<div class="col-md-6">
<div class="form-group">
<label>Class <span class="text-danger"></span></label>
<select id="class" name="class" class="form-control select2" data-allow-clear="true">
  <option value="">Select Class</option>
  <option value="Senior 1">Senior 1</option>
  <option value="Senior 2">Senior 2</option>
  <option value="Senior 3">Senior 3</option>
  <option value="Senior 4">Senior 4</option>
  <option value="Senior 5">Senior 5</option>
  <option value="Senior 6">Senior 6</option> 
  </select>

</select>
</div>
</div> <!-- end col md 4 -->



<div class="col-md-4" style="padding-top: 30px;">
<input type="submit" class="btn btn-rounded btn-info" name="search" value="Search  Student">

</div> <!-- end col md 4 -->



<div class="col-md-4" style="padding-top: 30px;">

  <a href="{{ route('student.information.filter') }}" class="btn btn-success" >Reset</a>

  
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
<h3 class="card-title">Students List &nbsp; ({{ count($allData) }} Students) </h3>

</div>






<div class="card-body">

<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
  <th>Students</th>
  <th>Parent1</th>
  <th>Parent2</th>
  <th>Tel1</th>
  <th>Tel2</th>
  <th>Class</th>
  <th>Section</th>
  <th>Term</th>
  <th>Level</th>

</tr>
</thead>
<tbody>
@foreach($allData as $key => $value )
<tr>


    <td>
        <div class="d-flex align-items-center">
        
        <div class="ms-3">
        <h6 class="fw-semibold mb-0 fs-6">{{ $value->name}}</h6> - 
        <p class="mb-0">{{ $value->id_no}}</p>
        </div>
        </div>
        </td>

<td> {{ $value->fname }}</td>
<td> {{ $value->mname }}</td>
<td> {{ $value->mobile }}</td>
<td> {{ $value->mobile2 }}</td>
<td> {{ $value->class }}</td>	
<td>  {{ $value->day_boarding }}</td>	
<td>  {{ $value->term }}</td>	


<td> 

  
  {{$value->student_level }}

  
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
