
@extends('admin.body.master')
@section('admin')



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>



<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
    <div class="col-sm-6">
    <h1>Update Permission</h1>
    </div>
    <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Permission Update</li>
    </ol>
    </div>
    </div>
    </div>
    </section>
    
    <section class="content">
    <div class="container-fluid">
    <div class="row">
    
    <div class="col-md-12">
    
    <div class="card card-primary">
    
    

    <form method="post" action="{{ route('permission.update',$permit->id) }}">
	 	@csrf
    <div class="card-body">
        <div class="row">
        <div class="col-md-6">
    <div class="form-group">
    <label for="name">Permission Name</label>
    <input type="text" name="name" class="form-control" required="" value="{{$permit->name}}">
    </div>
</div>


    </div>




</div>
    
    
    
    <div class="card-footer">
    <button type="submit" class="btn btn-primary">Update Permission</button>
    </div>
    </form>
    </div>
    
    </div>
    

    
    </div>
    
    </div>
    </section>
 
         

@endsection