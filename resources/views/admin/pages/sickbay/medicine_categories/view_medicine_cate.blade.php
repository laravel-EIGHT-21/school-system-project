@extends('admin.body.master')
@section('admin')

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Medicine Category List</h1> 
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Medicine Categories</li>
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
<h3 class="card-title">Medicine Category List<span class="badge badge-pill badge-danger"> {{ count($category) }} </span></h3>
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
               <a href="{{route('edit.medicine.category',$item->id)}}" class="btn btn-info" title="Edit ">
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
          <h3 class="card-title"><b> Add New Medicine Category</b></h3>

          
        </div>
        <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-9 col-md-offset-1">
    <form method="post" action="{{route('store.medicine.category')}}" enctype="multipart/form-data">
        @csrf
        @method('POST')
<div class="form-group">
<label>Category Name</label>
<input type="text" name="name" class="form-control" > 
@error('name')
<span class="text-danger">{{$message}}</span>
@enderror
</div>


<button type="submit" class="btn btn-rounded btn-primary mb-5">Add Category info </button>
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
