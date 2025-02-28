
@extends('admin.body.master')
@section('admin')



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>All Students Admissions</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Admissions </li>
</ol>
</div>
</div>
</div> 
</section>


<section class="content">
<div class="container-fluid">

<div class="row"> 
<div class="col-12">
<div class="card">
<div class="card-header">
<h3 class="card-title">New Students Admission &nbsp; ({{ count($allData) }} Students) </h3>

<a href="javascript:void(0);" style="float: right;" data-toggle="modal" data-target="#Addstudent" class="btn btn-rounded btn-success "> New Student Admission</a>	

</div>



<div class="modal fade" id="Addstudent">
  <div class="modal-dialog">
  <div class="modal-content">
  <div class="modal-header">
  <h4 class="modal-title">Add New Student Information</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  </div>
  <form method="post" action="{{ route('store.student.admission') }}">
      @csrf
  <div class="modal-body">
  <div class="row">


      <div class="col-6">
          <div class="form-group">
          <label>Student Name<span style="color:red;">*</span></label>
          <input class="form-control" type="text" name="name" autocomplete="off"  required />
          @error('name') 
               <span class="text-danger">{{ $message }}</span>
               @enderror
          </div>
          </div> <!-- end col md 4 -->



          <div class="col-6">
          <div class="form-group">
          <label>Guardian Tel 1<span style="color:red;">*</span></label>
          <input class="form-control" type="text"  name="mobile" maxlength="13" required placeholder="Example +256700000000" />
          @error('mobile') 
               <span class="text-danger">{{ $message }}</span>
               @enderror
          </div>
          </div> <!-- end col md 4 -->


  </div>




  <div class="row">


    <div class="col-6">
      <div class="form-group">
      <label>Guardian Tel 2<span style="color:red;">*</span></label>
      <input class="form-control" type="text"  name="mobile2" maxlength="13" required placeholder="Example +256700000000" />
      @error('mobile2') 
           <span class="text-danger">{{ $message }}</span>
           @enderror
      </div>
      </div> <!-- end col md 4 -->



    <div class="col-6">
        <div class="form-group">
        <label>Guardian Name 1<span style="color:red;">*</span></label>
        <input class="form-control" type="text" name="fname" autocomplete="off"  required />
        @error('fname') 
             <span class="text-danger">{{ $message }}</span>
             @enderror
        </div>
        </div> <!-- end col md 4 -->



</div>






<div class="row">

  <div class="col-6">
    <div class="form-group">
    <label>Guardian Name 2<span style="color:red;">*</span></label>
    <input class="form-control" type="text" name="mname" autocomplete="off"  required />
    @error('mname') 
         <span class="text-danger">{{ $message }}</span>
         @enderror
    </div>
    </div> <!-- end col md 4 -->


    <div class="col-6">
      <div class="form-group">
      <label>Gender<span style="color:red;">*</span></label>

      <select name="gender" id="gender" required="" class="form-control">

        <option value="" selected="" disabled="">Select Gender</option>
        
        <option value="Male">Male</option>
        
        <option value="Female">Female</option>
        
        </select>	
      </div>
      </div> <!-- end col md 4 -->

</div>
    

<div class="row">


  
  <div class="col-6">
    <div class="form-group">
    <label>Day or Boarding<span style="color:red;">*</span></label>

    <select id="day_boarding" name="day_boarding" class="form-control select2" data-allow-clear="true">
      <option value="">Select Section</option>
      <option value="Day">Day </option>
      <option value="Boarding">Boarding </option>
      </select>
    </div>
    </div> <!-- end col md 4 -->



    
  <div class="col-6">
    <div class="form-group">
    <label>Class<span style="color:red;">*</span></label>
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


</div>



<div class="row">

  
    
  <div class="col-6">
    <div class="form-group">
    <label>Term<span style="color:red;">*</span></label>
    <select id="term" name="term" class="form-control select2" data-allow-clear="true">
      <option value="">Select Term</option>
      <option value="Term 1">Term 1 </option>
      <option value="Term 2">Term 2 </option>
      <option value="Term 3">Term 3 </option>
      </select>
    </div>
    </div> <!-- end col md 4 -->





      
    
  <div class="col-6">
    <div class="form-group">
    <label>Student Level<span style="color:red;">*</span></label>
    <select id="student_level" name="student_level" class="form-control select2" data-allow-clear="true">
      <option value="">Select Level</option>
      <option value="O-LEVEL">O-LEVEL </option>
      <option value="A-LEVEL">A-LEVEL</option>

      </select>
    </div>
    </div> <!-- end col md 4 -->


</div>





<div class="row">

  
    
    <div class="col-6">
      <div class="form-group">
      <label>Admission Fees<span style="color:red;">*</span></label>
      <input class="form-control" type="text" name="admission_fees" autocomplete="off"  required />
      </div>
      </div> <!-- end col md 4 -->
  

  
  </div>
  
  





  </div>
  <div class="modal-footer justify-content-between">
  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  <button type="submit" class="btn btn-primary">Save changes</button>
  </div>
</form>   
  </div>
  
  </div>
  
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
  <th>Admission Fees</th>
<th width="15%">Action</th>
</tr>
</thead>
<tbody>
@foreach($allData as $key => $value )
<tr>
<td> {{ $value->student_name }}</td>
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

<td>  {{ $value->admission_fees }}</td>	

	 
<td>

  
<a href="{{ route('student.admission.edit',$value->id) }}" class="btn btn-sm btn-info" title="Edit Details"><i class="fa fa-edit"></i></a>


  
<a href="javascript:void(0);" class="btn btn-sm btn-warning" title="View Details" data-toggle="modal" data-target="#viewStudent" id="{{ $value->id }}"  onclick="studentView(this.id)"><i class="fa fa-address-book"></i></a>



</td>

</tr>
@endforeach
    
</tbody>              

</table>


</div>




<div class="modal fade" id="viewStudent">
  <div class="modal-dialog">
  <div class="modal-content">
  <div class="modal-header">
  <h4 class="modal-title"> Student Information</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  </div>

  <div class="modal-body">
  <div class="row">


      <div class="col-6">
          <div class="form-group">
          <label>Student Name</label>
          <input class="form-control" type="text" name="student_name" id="name" readonly />

          </div>
          </div> <!-- end col md 4 -->


          
    <div class="col-6">
        <div class="form-group">
        <label>Gender</label>
        <input class="form-control" type="text" name="gender" id="genda" readonly />
        </div>
        </div> <!-- end col md 4 -->



  </div>






<div class="row">


  
  <div class="col-6">
    <div class="form-group">
    <label>Day or Boarding</label>
    <input class="form-control" type="text" name="day_boarding" id="day_boardings" readonly />

    </div>
    </div> <!-- end col md 4 -->



    
  <div class="col-6">
    <div class="form-group">
    <label>Class</label>
    <input class="form-control" type="text" name="class" id="classes" readonly />

    </div>
    </div> <!-- end col md 4 -->


</div>



<div class="row">

  
    
  <div class="col-6">
    <div class="form-group">
    <label>Term</label>
    <input class="form-control" type="text" name="term" id="terms" readonly />

    </div>
    </div> <!-- end col md 4 -->





      
    
  <div class="col-6">
    <div class="form-group">
    <label>Student Level</label>
    <input class="form-control" type="text" name="student_level" id="student_levels" readonly />

    </div>
    </div> <!-- end col md 4 -->


</div>





<div class="row">

    
        
      
    <div class="col-6">
      <div class="form-group">
      <label>Admission Fees</label>
      <input class="form-control" type="text" name="admission_fees" id="ad_fees" readonly />
  
      </div>
      </div> <!-- end col md 4 -->
  
  
  </div>






  </div>
  
  </div>
  
  </div>
  
  </div>





</div>

</div>
</div>

</div>

</section>
<br><br>




                  
<script type="text/javascript">


  $.ajaxSetup({
  headers:{
  'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
  }
  })
  
  
  function studentView(id){
  
  $.ajax({
  type: 'GET',
  url: '/student/admission/details/'+id,
  dataType: 'json',
  success:function(data){
   $('#name').val(data.student.student_name);
   $('#genda').val(data.student.gender);
   $('#classes').val(data.student.class);
   $('#terms').val(data.student.term);
   $('#day_boardings').val(data.student.day_boarding);
   $('#student_levels').val(data.student.student_level);ad_fees
   $('#ad_fees').val(data.student.admission_fees);
  $('#id').val(id);
  


  
  }
  })
  
  }
  
  </script>




@endsection
