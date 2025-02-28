
@extends('admin.body.master')
@section('admin')


@section('title')
Students Class Promotion
@endsection


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>



<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1><b>Students Promotion </b></h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right"> 
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active"> Class Promotion </li>
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

          <h4 class="card-title"><b> <strong>Students` Class Promotion</strong></b></h4>


          </div>
          <!-- /.card-header -->

          <div class="card-body">
<div class="row">
<div class="col-md-12 ">

<form method="GET" action="{{ route('students.class.wise') }}">
  @csrf
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
                
                </div>
                </div> <!-- end col md 4 -->
                
                
                
                <div class="col-md-4" style="padding-top: 30px;">
                <input type="submit" class="btn btn-rounded btn-info" name="search" value="Search  Students">
                
                </div> <!-- end col md 4 -->
                
                
                
                <div class="col-md-4" style="padding-top: 30px;">
                
                  <a href="{{ route('students.class.promote') }}" class="btn btn-success" >Reset</a>
                
                  
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
<h3 class="card-title">Students` Class Promotions</h3>

</div>
    
<form method="post" action="{{ route('students.class.promote.store') }}">
  @csrf

<div class="card-body">

<div class="row"> <!-- start 2nd row  -->
    
    <div class="col-md-4">
    <div class="form-group">
    <label>Current Class <span class="text-danger"></span></label>
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



    <div class="col-md-4">
      <div class="form-group">
      <label>Promotion Class <span class="text-danger"></span></label>
      <select id="promote_class" name="promote_class" class="form-control select2" data-allow-clear="true">
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
    
    

    <div class="col-md-4">
      <div class="form-group">
        <label>New School Term<span style="color:red;">*</span></label>
        <select id="new_term" name="new_term" class="form-control select2" data-allow-clear="true">
          <option value="">Select Term</option>
          <option value="Term 1">Term 1 </option>
          <option value="Term 2">Term 2 </option>
          <option value="Term 3">Term 3 </option>
          </select>
      </div>
      </div> <!-- end col md 4 -->
    
    
</div> 

<table class="table table-bordered table-striped">
<thead>
<tr>
<th>SL</th>  
<th>ID No</th>
<th>Name</th>
<th>Section</th>
<th>Class</th>
<th>Term</th>
<th>Select</th>

</tr>
</thead>
<tbody>
@foreach($students as $key => $value )

<tr>
<input type="hidden" name="id[]" value="{{ $value->id }}">

<td>{{ $key+1 }}</td>
<td> {{ $value->id_no }}</td>
<td> {{ $value->name}}</td>	
<td> {{ $value->day_boarding }}</td>	
<td> {{ $value->class }}</td>	
<td> {{ $value->term }}</td>


<td>  <input type="checkbox" name="checkmanage[]" id="{{$key}}" value="{{$key}}" checked="checked">
<label for="{{$key}}"></label>  </td>


</tr>
@endforeach
    
</tbody>              

</table>
<br>

<input type="submit" class="btn btn-rounded btn-info" value="Submit">


                                    </form>

</div>



</div>

</div>
</div>

</div>

</section>
<br><br>

@endsection
