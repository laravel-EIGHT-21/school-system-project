@extends('admin.admin_master')
@section('admin')


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Update User Details</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Update User </li>
</ol>
</div>
</div>
</div>
</section>


 <!-- Main content -->
 <section class="content">
      <div class="container-fluid">
      <div class="row">
  
  <div class="col-12 ">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title"><b> User Info</b></h3>


          </div>
          <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-12 col-md-offset-1">

<form method="post" action="{{ route('users.store') }}">
	 	@csrf

             <div class="row"> <!-- start 2nd row  -->
     <div class="col-md-6">
<div class="form-group">
<label>Select User Role<span style="color:red;">*</span></label>
<select name="role"  required="" class="form-control">
<option value="" selected="" disabled="">Select Role</option>
<option value="admin" {{ ($editData->role == "admin" ? "selected": "") }}  >Admin</option>
<option value="Operator" {{ ($editData->role == "Operator" ? "selected": "") }} >Operator</option>

</select>
</div>
</div> <!-- end col md 4 -->

<div class="col-md-6">
<div class="form-group">
<label>User Name<span style="color:red;">*</span></label>
<input type="text" name="name" class="form-control" value="{{ $editData->name }}" required="">
@error('name') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
</div>
</div> <!-- end col md 4 -->

</div> <!-- end 2nd row  -->


<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>User Email<span style="color:red;">*</span></label>
<input type="email" name="email" class="form-control" value="{{ $editData->email }}" required="">
@error('email') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
</div>
</div> <!-- end col md 4 -->

</div> <!-- end 2nd row  -->


<button type="submit"  class="btn btn-rounded btn-primary mb-5">Update User Info</button>

                                    </form>
                            </div>
                        </div><!--End of row-->


                            </div>

        </div>

        </div>
    </div>
   
             <!-- /.SELECT2 EXAMPLE-->

             </div>
     <!-- /.card -->
     </section>
    <!-- /.content -->





@endsection