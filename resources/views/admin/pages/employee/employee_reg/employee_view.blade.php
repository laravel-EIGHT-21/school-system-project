
@extends('admin.body.master')
@section('admin')



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>All Employees Information</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Employees` Details </li>
</ol>
</div>
</div>
</div> 
</section>


<br /><br />

<div class="row">

  <div class="col-3">
    <div class="card">

  
  <a href="javascript:void(0);" data-toggle="modal" data-target="#AddNonTeacher" class="btn btn-sm btn-rounded btn-success "> Add Non-Teacher</a>	
    </div>
  </div>
  
  <div class="col-3">
    <div class="card">
  
  <a href="{{ route('teacher.employee.registration.add') }}" class="btn btn-sm btn-rounded btn-info "> Add Teacher</a>	
</div>
</div>

</div>

<br /><br />

<section class="content">
<div class="container-fluid">


<div class="row"> 
<div class="col-12">
<div class="card">
<div class="card-header">
<h3 class="card-title">Employee List &nbsp; ({{ count($allData) }} Total Employees) || &nbsp; ({{ count($teachers) }} Total Teachers) || &nbsp; ({{ count($non_teachers) }} Total Non-Teachers)</h3>

</div>



<div class="modal fade" id="AddNonTeacher">
  <div class="modal-dialog">
  <div class="modal-content">
  <div class="modal-header">
  <h4 class="modal-title">Add Non-Teacher Information</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  </div>
  <form method="post" action="{{ route('store.non.teacher.employee.registration') }}">
      @csrf
  <div class="modal-body">
  <div class="row">


      <div class="col-6">
          <div class="form-group">
          <label> Name<span style="color:red;">*</span></label>
          <input class="form-control" type="text" name="name" autocomplete="off"  required />
          @error('name') 
               <span class="text-danger">{{ $message }}</span>
               @enderror
          </div>
          </div> <!-- end col md 4 -->


          
      <div class="col-6">
        <div class="form-group">
        <label> Email<span style="color:red;">*</span></label>
        <input class="form-control" type="email" name="email" autocomplete="off"  required />
        @error('email') 
             <span class="text-danger">{{ $message }}</span>
             @enderror
        </div>
        </div> <!-- end col md 4 -->





  </div>




  <div class="row">

    <div class="col-6">
      <div class="form-group">
      <label>Mobile Tel<span style="color:red;">*</span></label>
      <input class="form-control" type="text"  name="phone" maxlength="13" required placeholder="Example +256700000000" />
      @error('phone') 
           <span class="text-danger">{{ $message }}</span>
           @enderror
      </div>
      </div> <!-- end col md 4 -->


    <div class="col-6">
        <div class="form-group">
        <label>Joined Date<span style="color:red;">*</span></label>
        <input class="form-control" type="date" name="join_date" autocomplete="off"  required />
        @error('join_date') 
             <span class="text-danger">{{ $message }}</span>
             @enderror
        </div>
        </div> <!-- end col md 4 -->



</div>






<div class="row">


  <div class="col-6">
    <div class="form-group">
    <label>Designation<span style="color:red;">*</span></label>
    <select name="designation_id" required="" class="form-control">
    <option value="" selected="" disabled="">Select Designation</option>
    @foreach($designation as $desi)
    <option value="{{ $desi->id }}">{{ $desi->name }}</option>
    @endforeach
    
    </select>
    </div>
    </div>


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
      <label>Salary<span style="color:red;">*</span></label>
      <input type="text" name="salary" maxlength="7"  class="form-control" required="" > 
      
    </div>
    </div> <!-- end col md 4 -->





      
    
  <div class="col-6">
    <div class="form-group">
    <label> Password<span style="color:red;">*</span></label>
<input type="password" name="password" class="form-control" required=""> 
@error('password')
<span class="text-danger">{{$message}}</span>
@enderror
    </div>
    </div> <!-- end col md 4 -->


</div>



    
<hr>

<label><u><b>Assign User Group</b></u></label>
<br>

 <div class="row">

	
<div class="col-6">
<div class="form-group">
<select name="roles[]" required="" class="form-control">
<option value="" selected="" disabled="">Select User Group</option>
@foreach ($roles as $role)
<option value="{{ $role->id }}">{{ $role->name }}</option>
@endforeach

</select>
</div>
</div> 

</div><!--End 9th Row-->


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
  <th>Name</th>
  <th>Email</th>
  <th>Joined Date</th>
  <th>Teacher/Non-Teacher</th>
  <th>Tel.</th>
  <th>Desination</th>
  <th>Status</th>
<th width="15%">Action</th>
</tr>
</thead>
<tbody>
@foreach($allData as $key => $value )
<tr>
<td> {{ $value->name }}</td>
<td> {{ $value->email }}</td>	
<td> {{ $value->join_date }}</td>	



<td> 

  
  @if($value->user_type === 1)
  <span class="badge badge-pill badge-info">TEACHING STAFF</span>
  @elseif($value->user_type === 2)
  <span class="badge badge-pill badge-warning">NON-TEACHING STAFF</span>
  @endif
  
</td>	


<td>  {{ $value->phone }}</td>	
<td>  {{ $value['designation']['name'] }}</td>	




<td>
			   @if($value->status == 'active')
			   <span class="badge badge-pill badge-success">Active</span>
			   @elseif($value->status == 'inactive')
			   <span class="badge badge-pill badge-danger">InActive</span>
			   @endif

		   </td>
	 
<td>

  
  @if($value->user_type === 1)

<a href="{{ route('teacher.employee.registration.edit',$value->id) }}" class="btn btn-sm btn-info" title="Edit Details"><i class="fa fa-edit"></i></a>

@elseif($value->user_type === 2 )
  
<a href="{{ route('non.teacher.employee.registration.edit',$value->id) }}" class="btn btn-sm btn-info" title="Edit Details"><i class="fa fa-edit"></i></a>

@endif

<a href="javascript:void(0);" class="btn btn-sm btn-warning" title="View Details" data-toggle="modal" data-target="#viewEmployee" id="{{ $value->id }}"  onclick="employeeView(this.id)"><i class="fa fa-address-book"></i></a>



@if($value->status == 'active')

<a href="{{route('employee.inactive',$value->id)}}" class="btn btn-sm btn-danger" id="deactivate" title="Deactivate ">
  <i class="fa fa-arrow-down"></i></a>

@elseif($value->status == 'inactive')

<a href="{{route('employee.active',$value->id)}}" class="btn btn-sm btn-success" id="activate" title="Activate ">
  <i class="fa fa-arrow-up"></i></a>

@endif


</td>

</tr>
@endforeach
    
</tbody>              

</table>


</div>




<div class="modal fade" id="viewEmployee">
  <div class="modal-dialog">
  <div class="modal-content">
  <div class="modal-header">
  <h4 class="modal-title"> Employee`s Information</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  </div>

  <div class="modal-body">
  <div class="row">


    <div class="col-6">
      <div class="form-group">
      <label> Name</label>
      <input class="form-control" type="text" name="name" autocomplete="off" id="name"  readonly />
      </div>
      </div> <!-- end col md 4 -->


      
  <div class="col-6">
    <div class="form-group">
    <label> Email</label>
    <input class="form-control" type="email" name="email" autocomplete="off" id="email"  readonly />

    </div>
    </div> <!-- end col md 4 -->





</div>




<div class="row">

<div class="col-6">
  <div class="form-group">
  <label>Mobile Tel</label>
  <input class="form-control" type="text"  name="phone" id="tel" readonly />

  </div>
  </div> <!-- end col md 4 -->


<div class="col-6">
    <div class="form-group">
    <label>Joined Date</label>
    <input class="form-control" type="date" name="join_date" id="date" autocomplete="off"  readonly/>
   
    </div>
    </div> <!-- end col md 4 -->



</div>






<div class="row">


<div class="col-6">
<div class="form-group">
<label>Designation</label>
<select id="edit_title" name="designation_id" required class="form-control" @readonly(true)>
  <option value="">Select Designation</option>


  </select>
</div>
</div>


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
  <label>Salary</label>
  <input type="text" name="salary" id="sala"  class="form-control" readonly> 
  
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
  
  
  function employeeView(id){
  
  $.ajax({
  type: 'GET',
  url: '/employee/details/'+id,
  dataType: 'json',
  success:function(data){
   $('#name').val(data.employee.name);
   $('#email').val(data.employee.email);
   $('#tel').val(data.employee.phone);
   $('#genda').val(data.employee.gender);
   $('#date').val(data.employee.join_date);
   $('#sala').val(data.employee.salary);
  $('#id').val(id);

var employee = data.employee;
var design = data.designation;
var htmlDesign = "<option value=''>Select Designation</option>";


for(let x = 0;x < design.length;x++){
if(employee['designation_id'] == design[x]['id']){
htmlDesign += `<option value="`+design[x]['id']+`" selected>`+design[x]['name']+`</option>`;
}
else{
htmlDesign += `<option value="`+design[x]['id']+`">`+design[x]['name']+`</option>`;
}
}

$("#edit_title").html(htmlDesign);

  


  
  }
  })
  
  }
  
  </script>




@endsection
