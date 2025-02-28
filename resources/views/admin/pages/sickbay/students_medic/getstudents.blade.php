@extends('admin.body.master')
@section('admin')

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Students Information</h1>
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

<form method="GET" action="{{ route('clinic.student.class') }}">

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
<h3 class="card-title"> Students List </h3>
</div>

<div class="card-body">

<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
  <th>Students</th>
  <th>ID.No</th>
  <th>Class</th>
  <th>Section</th>
  <th>Term</th>
  <th>Level</th>

<th width="10%">Action</th>
</tr>
</thead>
<tbody>
@foreach($allData as $key => $value )
<tr>
  <td> {{ $value->name }}</td>
  <td> {{ $value->id_no }}</td>	
  <td> {{ $value->class }}</td>	
  <td>  {{ $value->day_boarding }}</td>	
  <td>  {{ $value->term }}</td>	
  
  
  <td> 
  
    
    @if($value->student_level === 'O-LEVEL')
    <span class="badge badge-pill badge-info">O-LEVEL</span>
    @elseif($value->student_level === 'A-LEVEL')
    <span class="badge badge-pill badge-warning">A-LEVEL</span>
    @endif
    
  </td>	
  

    
	 
<td>
<a title="Medication" href="{{ route('add.student.medic',$value->id) }}" class="btn btn-info"> <i class="fa fa-plus"></i> </a>

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
