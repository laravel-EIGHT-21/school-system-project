
@extends('admin.body.master')
@section('admin')


@section('title')
Students Fees Details
@endsection



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
 

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Students Fees Information</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active"> Fees Details </li>
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

            @can('students-fees-get')
<a href="{{ route('get.student.fee') }}" class="btn btn-success" style="float: right;">Add New Fees </a>
@endcan


          </div>
          <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-12 ">

<form method="GET" action="{{ route('student.class.fees') }}">

             <div class="row"> <!-- start 2nd row  -->
    
<div class="col-md-3">
<div class="form-group">
<label>Year <span class="text-danger"></span></label>
<input type="text" name="year" class="form-control" required > 
</div>
</div> <!-- end col md 4 -->


<div class="col-md-3">
<div class="form-group">
<label>Class <span class="text-danger"></span></label>
<select id="class" name="class" class="form-control select2" >
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


<div class="col-md-3">
<div class="form-group">
<label> Term <span class="text-danger"></span></label>
<select id="term" name="term" class="form-control select2" data-allow-clear="true">
  <option value="">Select Term</option>
  <option value="Term 1">Term 1 </option>
  <option value="Term 2">Term 2 </option>
  <option value="Term 3">Term 3 </option>
  </select>
</div>
</div> 

<div class="col-3">
<div class="form-group">
<label>Fee Category<span style="color:red;">*</span></label>
<select name="fee_category_id"  required="" class="form-control select2">
<option value="" selected="" disabled="">Select Fee Category</option>
@foreach($fee_categories as $fee)
<option value="{{ $fee->id }}" {{ (@$fee_category_id == $fee->id)? "selected":"" }} >{{ $fee->name }}</option>
@endforeach
</select> 
</div>
</div>



<div class="col-md-2" style="padding-top: 30px;">
<input type="submit" class="btn btn-rounded btn-info" name="search" value="Search Students Fees ">

</div> <!-- end col md 4 -->


<div class="col-md-2" style="padding-top: 30px;">

  <a href="{{ route('student.fee.view') }}" class="btn btn-success" >Reset</a>

  
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
<h3 class="card-title"> Student Fees List </h3>

</div>

<div class="card-body">

<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th>Name </th>
<th>Total</th>
<th>Balance</th> 
<th>Class </th>
<th>Fees Cate </th>
<th>Term </th>
<th>Section</th> 
<th width="20%">Action</th> 
</tr>
</tr>
</thead>
<tbody>
@foreach($allData as $key => $value )
<tr>	
<td> {{ $value['student']['name'] }}</td>	
<td> {{ $value->totalfee_amount }}</td>


@php 
$originalfees = $value->totalfee_amount;
$fees = $value->fee_amount;
$balancefees = (float)$originalfees-(float)$fees;
@endphp

<td> {{ $balancefees }}</td>
<td> {{ $value->class }}</td>
<td> {{ $value['fee_category']['name'] }}</td>	

<td> {{ $value->term }}</td>

<td> {{$value->day_boarding}}</td>

<td>


@can('students-fees-details')
<a title="Fees Payment Details" target="_blank" href="{{ route('student.fees.details',$value->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></a>
@endcan

@can('students-fees-details')
<a target="_blank" href="{{ route('student.fees.details.pdf',$value->id) }}" title="Fees Payment Invoice" class="btn btn-sm btn-success"><i class="fa fa-download"></i></a>
@endcan

@can('students-fees-edit')
<a href="{{ route('student.fees.edit',$value->id) }}" title="Edit" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
@endcan


@can('students-fees-edit')
<a href="{{ route('student.fees.delete',$value->id) }}" title="Delete" id="delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
@endcan

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
