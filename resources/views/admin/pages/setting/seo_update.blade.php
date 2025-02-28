@extends('admin.admin_master')
@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Update Seo Settings</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Seo Settings</li>
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
          <h3 class="card-title"><b> Edit Seo Settings</b></h3>

          
        </div>
        <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-9 col-md-offset-1">

<form method="post" action="{{ route('update.seosetting') }}" >
@csrf

<input type="hidden" name="id" value="{{ $seo->id }}">    
 

<div class="col-6">
<div class="form-group">
<label>Meta Title</label>
<input type="text" name="meta_title" class="form-control" value="{{ $seo->meta_title }}" > 

</div>  
</div> 


<div class="col-6">
<div class="form-group">
<label>Meta Author</label>
<input type="text" name="meta_author" class="form-control" value="{{ $seo->meta_author }}" > 

</div>  
</div> 


<div class="col-6">
<div class="form-group">
<label>Meta Keyword</label>
<input type="text" name="meta_keyword" class="form-control" value="{{ $seo->meta_keyword }}"  > 

</div>  
</div> 

<div class="col-6">
<div class="form-group">
<label>Meta Description</label>
<textarea name="meta_description" id="textarea" class="form-control" required="" >
	{{ $seo->meta_description }}
</textarea>

</div>  
</div> 
	
	
<div class="col-6">
<div class="form-group">
<label>Google Analytics</label>
<textarea name="google_analytics" id="textarea" class="form-control" required="">
	{{ $seo->google_analytics }}
</textarea>

</div>  
</div> 
						







<button type="submit" class="btn btn-rounded btn-primary mb-5">Update Seo Settings</button>

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