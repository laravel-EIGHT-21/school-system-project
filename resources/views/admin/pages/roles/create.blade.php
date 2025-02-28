
@extends('admin.body.master')
@section('admin')



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Add New Role</h1>
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
            <h3 class="card-title"><b>New Role Details</b></h3>


          </div>
          <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-12 col-md-offset-1">
    
	 <form method="post" action="{{ route('roles.store') }}">
	 	@csrf     
         <div class="row"> <!-- start 2nd row  -->
    
<div class="col-md-6">
<div class="form-group">
<label>Role Name <span style="color:red;">*</span></label>
<input class="form-control" type="text" name="name" autocomplete="off"  required />
@error('name') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
</div>
</div> <!-- end col md 4 -->

</div> <!-- end 2nd row  -->




<div class="row"> <!-- start 2nd row  -->
    
<div class="col-9">

<label for="permissions" class="form-label">Assign Permissions</label>

<table class="table table-striped">
    <thead>
        <th scope="col" width="1%"><input type="checkbox" name="all_permission"></th>
        <th scope="col" width="20%">Name</th>
        <th scope="col" width="1%">Guard</th> 
    </thead>

    @foreach($permissions as $permission)
        <tr>
            <td>
                <input type="checkbox" 
                name="permission[{{ $permission->name }}]"
                value="{{ $permission->name }}"
                class='permission'>
            </td>
            <td>{{ $permission->name }}</td>
            <td>{{ $permission->guard_name }}</td>
        </tr>
    @endforeach
</table>



</div>


    
    </div> <!-- end 2nd row  -->


    <hr>

<br>

<button type="submit"  class="btn btn-rounded btn-primary mb-5">Add New Role </button>

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