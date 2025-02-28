@extends('admin.body.master')

@section('admin')

@section('title')
User Password Edit
@endsection


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Password Update</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">update Password</li>
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



    <form method="POST" action="{{route('admin.password.update') }}" enctype="multipart/form-data">
        @csrf
<div class="card-body">

<div class="form-group">
<label >Current Password</label>
<input type="password" name="oldpassword" class="form-control @error('oldpassword') is-invalid @enderror" id="current_password"   placeholder="Old Password" required="">
</div>


<div class="form-group">
<label >New Password</label>
<input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" required="">
</div>

<div class="form-group">
    <label >Confirm Password</label>
    <input type="password" name="new_password_confirmation" class="form-control" id="new_password_confirmation" required="">
    </div>



</div>

<div class="card-footer">
<button type="submit" class="btn btn-primary">Update Your Password</button>
</div>
</form>
</div>

</div>


<div class="col-md-6">
</div>

</div>

</div>
</section>



@endsection
