@extends('admin.body.master')
@section('admin')

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-8">
<h1><b>Medical Supply Management</b></h1>
</div>
<div class="col-sm-4">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li> 
<li class="breadcrumb-item active"> Medical Supply Details </li>
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
<h3 class="card-title">Medical Supply <span class="badge badge-pill badge-danger">  {{ count($allData) }} </span></h3>

</div>

<div class="card-body">

<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th>SL</th>  
<th>Name</th> 
<th>Status</th>

<th>Action</th>
</tr>
</thead>
<tbody>
@foreach($allData as $key => $value )
<tr>
<td>{{ $key+1 }}</td>	
<td> {{ $value->name }}</td>	

<td>
    @if($value->status == 'Unavailable')
    <span class="badge badge-pill badge-danger">Unavailable</span>
    @elseif($value->status == 'Available')
    <span class="badge badge-pill badge-success">Available</span>
    @elseif($value->status == 'Low')
    <span class="badge badge-pill badge-warning">Running Low</span>
    @endif
     
    </td>

<td width="5%">
<a href="{{route('edit.medical.supply',$value->id)}}" class="btn btn-info" title="Edit ">
<i class="fa fa-edit"></i></a>



</td>

</tr>
@endforeach    
</tbody>              

</table>


</div>



</div>

</div>





<div class="col-4 ">

    <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title"><b> Add New Medical Supply</b></h3>

          
        </div>
        <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-9 col-md-offset-1">
    <form method="post" action="{{route('store.medical.supply')}}" enctype="multipart/form-data">
        @csrf
        @method('POST')
        
<div class="form-group">
<label>Supply Name<span style="color:red;">*</span></label>
<input type="text" name="name" class="form-control" required="" > 
	 </div>

     

    <div class="form-group">
    <label>Availability Status<span style="color:red;">*</span></label>
    <select name="status"  required="" class="form-control">
    <option value="Unavailable" >Unavailable</option>
    <option value="Available">Available</option>
    <option value="Low">Low</option>
    </select>
    
    </div>



<button type="submit" class="btn btn-rounded btn-primary mb-5">Add Supply info </button>
</form>
                          </div>
                      </div>
                          </div>
                          </div>
                          </div>




</div>

</div>

</section>
<br><br>

@endsection
