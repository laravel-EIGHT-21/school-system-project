@extends('admin.admin_master')
@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Update Site Settings</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Site Settings</li>
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
          <h3 class="card-title"><b> Edit Site Settings</b></h3>

          
        </div>
        <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-9 col-md-offset-1">

	<form method="POST" action="{{route('update.sitesetting') }}" enctype="multipart/form-data">
		@csrf
<input type="hidden"  name="id" value="{{$setting->id}}" >   
<input type="hidden" name="old_image" value="{{$setting->logo}}">   
 
<div class="col-6">
<div class="form-group">
<label>Site Logo</label>
<input type="file" name="logo" class="form-control" > 

</div>  
</div> 

<div class="col-6">
<div class="form-group">
<label>School Name</label>
<input type="text" name="school_name" class="form-control" value="{{ $setting->school_name }}" > 

</div>  
</div> 

<div class="col-6">
<div class="form-group">
<label>Phone One</label>
<input type="text" name="phone_one" class="form-control" value="{{ $setting->phone_one }}" > 

</div>  
</div> 


<div class="col-6">
<div class="form-group">
<label>Phone Two</label>
<input type="text" name="phone_two" class="form-control" value="{{ $setting->phone_two }}" > 

</div>  
</div> 


<div class="col-6">
<div class="form-group">
<label>Email</label>
<input type="text" name="email" class="form-control" value="{{ $setting->email }}" > 

</div>  
</div> 

<div class="col-6">
<div class="form-group">
<label>Company Name</label>
<input type="text" name="company_name" class="form-control" value="{{ $setting->company_name}}" > 

</div>  
</div> 
	
	
<div class="col-6">
<div class="form-group">
<label>Company Address</label>
<input type="text" name="company_address" class="form-control" value="{{ $setting->company_address }}" > 

</div>  
</div> 

<div class="col-6">
<div class="form-group">
<label>Facebook</label>
<input type="text" name="facebook" class="form-control" value="{{ $setting->facebook }}" > 

</div>  
</div> 


<div class="col-6">
<div class="form-group">
<label>Twitter</label>
<input type="text" name="twitter" class="form-control" value="{{ $setting->twitter}}" > 

</div>  
</div> 

<div class="col-6">
<div class="form-group">
<label>Linkedin</label>
<input type="text" name="linkiedin" class="form-control" value="{{ $setting->linkiedin }}" > 

</div>  
</div> 


<div class="col-6">
<div class="form-group">
<label>Youtube</label>
<input type="text" name="youtube" class="form-control" value="{{ $setting->youtube }}" > 

</div>  
</div> 
						






@can('site-setting-edit')
<button type="submit" class="btn btn-rounded btn-primary mb-5">Update Site Settings</button>
@endcan




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