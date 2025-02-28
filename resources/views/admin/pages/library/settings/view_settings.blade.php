@extends('admin.admin_master')
@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Update Return Settings</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Return Settings</li>
</ol>
</div>
</div>
</div>
</section>

<section class="content">
<div class="container-fluid">
<div class="row">
  
<div class="col-12 ">

    <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title"><b> Edit Settings</b></h3>

          
        </div>
        <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-9 col-md-offset-1">

	<form method="POST" action="{{route('update.settings.view') }}" enctype="multipart/form-data">
		@csrf
<input type="hidden"  name="id" value="{{$setting->id}}" >      
 

<div class="col-6">
<div class="form-group">
<label>Return Days</label>
<input type="number" name="return_days" maxlength="2" class="form-control" value="{{ $setting->return_days }}" > 

</div>  
</div> 


<div class="col-6">
<div class="form-group">
<label>Fine</label>
<input type="number" name="fine" maxlength="5" class="form-control" value="{{ $setting->fine }}" > 

</div>  
</div> 
						







<button type="submit" class="btn btn-rounded btn-primary mb-5">Update Return Settings</button>

                                  </form>
                          </div>
                      </div>
                          </div>
                          </div>
                          </div>

</div>


      </div>

</section>

	  
@endsection