
@extends('admin.body.master')
@section('admin')



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Update Role</h1>
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
            <h3 class="card-title"><b>Update Role Details</b></h3>


          </div>
          <!-- /.card-header -->
          <div class="card">
            <div class="card-body p-4">
            
            <form id="myForm" action="{{ route('role.update',$role->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                

                <input class="form-control" type="hidden" name="name" value="{{ $role->name }}"  />

            <div class="row">
                <div class="col-lg-12">
                    <div>
                        
                        <div class="form-group mb-3">
                            <label for="example-text-input" class="form-label">Roles Name </label>
                            <h4>{{ $role->name }}</h4>
                        </div>
            
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="formCheck1">
                            <label class="form-check-label" for="formCheck1">
                               Permission All 
                            </label>
                        </div>  
                   <hr>
            
                   <div class="row"> 
            
                    <div class="col-9">
              
            
                    @foreach ($permissions as $permission)
                    <div class="form-check mb-3">
                        <input class="form-check-input" name="permission[{{ $permission->name }}]"  type="checkbox" value="{{ $permission->name }}" class='permission'{{ in_array($permission->name, $rolePermissions) ? 'checked' : '' }} id="flexCheckDefault{{ $permission->id }}" {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }} >
                        <label class="form-check-label" for="flexCheckDefault{{ $permission->id }}">
                          {{ $permission->name }}
                        </label>
                    </div>   
                    @endforeach   
                    <br>
                    </div> 
            
                   </div> 
                   {{-- //end row --}}
                       
            
            
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                        </div>
             
                    </div>
                </div>
            
                 
            </div>
            </form>
            </div>
            </div>
            

        </div>

        </div>
    </div>
   
             <!-- /.SELECT2 EXAMPLE-->

             </div>
     <!-- /.card -->
     </section>
    <!-- /.content -->



  
    <script>
        $('#formCheck1').click(function(){
            if ($(this).is(':checked')) {
                $('input[ type=checkbox]').prop('checked',true)
            }else{
                $('input[ type=checkbox]').prop('checked',false)
            }
        })
     </script>
    



@endsection