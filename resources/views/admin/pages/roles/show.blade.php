
@extends('admin.body.master')
@section('admin')



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1> Role Details</h1>
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
            <h3 class="card-title"><b>Role : {{ ucfirst($role->name) }}</b></h3>


          </div>
          <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-12 col-md-offset-1">
    
<div class="row"> <!-- start 2nd row  -->
    
<div class="col-9">

<label for="permissions" class="form-label">Assign Permissions</label>

<table class="table table-striped">
    <thead>
       
        <th scope="col" width="20%">Name</th>
        <th scope="col" width="1%">Guard</th> 
    </thead>

        @foreach($rolePermissions as $permission)
        <tr>
        <td>{{ $permission->name }}</td>
        <td>{{ $permission->guard_name }}</td>
        </tr>
        @endforeach
</table>



</div>


    
    </div> <!-- end 2nd row  -->


  



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