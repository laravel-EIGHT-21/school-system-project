@extends('admin.body.master')
@section('admin')


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Other Cost Category List</h1> 
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Other Cost Category</li>
</ol>
</div>
</div>
</div>
</section>

<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-8">

<div class="card">
<div class="card-header">
<h3 class="card-title">Other Cost Category List<span class="badge badge-pill badge-danger"> {{ count($category) }} </span></h3>
</div>

<div class="card-body">
<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
    <th>id</th>
    <th>Category Name</th>
    <th>Action</th>
</tr>
</thead>

<tbody>
    @foreach($category as $item)
      <tr>
           <th scope="row">{{ $item->id}}</th>	
           <td>{{$item->name}}</td>

           <td width="30%">
               <a href="{{route('edit.other.cost.cate',$item->id)}}" class="btn btn-info" title="Edit ">
                   <i class="fa fa-edit"></i></a>

           </td>
      </tr>
   @endforeach  
      
  </tbody>

</table>
</div>

</div>

</div>



<!--Add New Medicine Category-->

<div class="col-4 ">

    <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title"><b> Add New Other Cost Category</b></h3>

          
        </div>
        <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-9 col-md-offset-1">
    <form method="post" action="{{route('store.other.cost.cate')}}" enctype="multipart/form-data">
        @csrf
        @method('POST')
<div class="form-group">
<label>Category Name</label>
<input type="text" name="name" class="form-control" > 
@error('name')
<span class="text-danger">{{$message}}</span>
@enderror
</div>


<button type="submit" class="btn btn-rounded btn-primary mb-5">Add Cost Category </button>
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
