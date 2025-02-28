  

@extends('admin.body.master')
@section('admin')



@section('title')
 Parents Contacts Information
@endsection


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
 


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1><b>Parents Contact Information </b></h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Parents` Contacts </li>
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
            <h3 class="card-title"><b> Students` Search</b></h3>


          </div>
          <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-12 ">

<form method="GET" action="{{ route('students.class.wise2') }}">

             <div class="row"> <!-- start 2nd row  -->


<div class="col-md-6">
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
<h3 class="card-title">Parents Contact Information  List </h3>

</div>

<div class="card-body">
<form action="{{ route('send.sms.messages2') }}" method="POST" enctype="multipart/form-data">
                  @csrf

<div class="col-md-6"> 
         <div class="form-group">
    <label >Enter Message</label>
   
      <textarea name="message" id="message"   class="form-control" rows="4" placeholder="Enter Message" required></textarea>

    </div>
  </div><!-- end col md 4 -->

  <br>

<table class="table table-bordered table-striped">
<thead>
<tr>
<th></th>
<th>Student </th>
<th>Id No </th>
<th>Class </th>
<th>Section </th>
<th>Parent</th>
<th>Mobile</th> 

</tr>
</thead>
<tbody>
@foreach($allData as $key => $value )
<tr>
<td><input type="checkbox" name="mobile2[]" class="checkbox" value="{{$value->mobile2}}"></td>
<td> {{ $value->name }}</td>
<td> {{ $value->id_no }}</td>
<td> {{ $value->class }}</td>	
<td> {{ $value->day_boarding }}</td>	
<td> {{ $value->fname }}</td>	
<td> {{ $value->mobile2 }}</td>	

	
</tr>
@endforeach
    
</tbody>              

</table>
<br> 

<div class="form-group">
  <div class="col-md-6">

  <button type="submit"  class="btn btn-rounded btn-primary">Send SMS Message</button>

  </div>


</div>

</form>

</div>



</div>

</div>
</div>

</div>

</section>
<br><br>

@endsection
