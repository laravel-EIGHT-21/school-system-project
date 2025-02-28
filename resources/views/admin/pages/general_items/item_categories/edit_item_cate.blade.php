@extends('admin.body.master')
@section('admin')



@section('title')
Purchase Item Categories
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
 


    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><b>Update Purchase Items Category Info</b></h1>
          </div><!-- /.col -->
          
          

                </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

 <!-- Main content -->
 <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title"><b> Items Category Info</b></h3>
        
            @can('other-cost-view')
<a href="{{ route('general.item.cate.view') }}" class="btn btn-success" style="float: right;">View All Categories</a>
@endcan


          </div>
          <!-- /.card-header -->

 
<div class="card-body">
<div class="row">
<div class="col-md-9 col-md-offset-1">

<form method="post" action="{{route('update.general.item.cate',$category->id)}}" >
@csrf
@method('POST')
<input type="hidden" name="id" value="{{$category->id}}">
        
    
<div class="form-group">
<label>Category Name<span style="color:red;">*</span></label>
<input type="text" name="name" class="form-control" value="{{$category->name}}" > 
@error('name')
<span class="text-danger">{{$message}}</span>
@enderror
</div>

@can('other-cost-edit')
<button type="submit"  class="btn btn-rounded btn-primary mb-5">Update Item Category info </button>
@endcan

                                    </form>
                            </div>
                        </div>
                            </div>

        </div>
   
<br/>


</div>
<!-- /.card -->
</section>
<!-- /.content -->
</div>
<!-- /.container-fluid -->


@endsection