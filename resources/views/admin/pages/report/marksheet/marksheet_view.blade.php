@extends('admin.body.master')
@section('admin')



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-8">
<h1>Students Information </h1>
</div>
<div class="col-sm-4">
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

<form method="GET" action="{{ route('report.marksheet.get') }}">

             <div class="row"> <!-- start 2nd row  -->


<div class="col-md-4">
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
</div>
</div> <!-- end col md 4 -->


<div class="col-md-4" style="padding-top: 30px;">
<input type="submit" class="btn btn-rounded btn-info" name="search" value="Search">

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
<h3 class="card-title"><b> Students List </b></h3>
</div>

<div class="card-body">

<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th>SL</th>  
<th>Name</th>
<th>ID No.</th>
<th>Class</th>
<th>Section</th>
<th>Level</th>

<th width="10%">Action</th>
</tr>
</thead>
<tbody>
@foreach($allData as $key => $value )
<tr>
<td>{{ $key+1 }}</td>
<td> {{ $value->name }}</td> 	
<td> {{ $value->id_no }}</td> 	
<td> {{ $value->class }}</td>	
<td> {{ $value->day_boarding }}</td> 
<td> {{ $value->student_level }}</td> 


	 
<td>

    
  @if($value->class === 'Senior 1' || $value->class === 'Senior 2')

<a target="_blank" title="Get Results (Primary Setting)" href="{{ route('students.marksheet.generate',$value->id) }}" class="btn btn-sm btn-info"> <i class="fa fa-plus-square"></i> </a>

<a target="_blank" title="Get Results (Competency Setting)" href="{{ route('competency.marksheet.generate',$value->id) }}" class="btn btn-sm btn-warning"> <i class="fa fa-address-book"></i> </a>


@elseif($value->class === 'Senior 3' || $value->class === 'Senior 4')


<a target="_blank" title="Get Results (Primary Setting)" href="{{ route('olevel.marksheet.generate',$value->id) }}" class="btn btn-sm btn-info"> <i class="fa fa-plus-square"></i> </a>


@elseif($value->class === 'Senior 5' || $value->class === 'Senior 6')


<a target="_blank" title="Get Results (Primary Setting)" href="{{ route('alevel.student.marksheet.generate',$value->id) }}" class="btn btn-sm btn-info"> <i class="fa fa-plus-square"></i> </a>


@endif

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
