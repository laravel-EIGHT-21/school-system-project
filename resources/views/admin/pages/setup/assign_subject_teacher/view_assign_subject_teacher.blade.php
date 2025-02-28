@extends('admin.admin_master')
@section('admin')

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1> Assign Subject Teachers Management</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Subject Teachers </li>
</ol>
</div>
</div>
</div>
</section>

<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-header">
<h3 class="card-title">Teachers` Subject List </h3>
			  

</div>

<div class="card-body">
<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th>SL</th>
<th>Subject Name</th> 
<th width="20%">Action</th>
</tr>
</thead>
<tbody>
@foreach($allData as $key => $assign )
<tr>
<td>{{ $key+1 }}</td>
<td> {{ $assign['user']['name'] }}</td>				 
<td>
 					
<a href="{{ route('assign.subject.teacher.details',$assign->user_id ) }}" class="btn btn-primary" title="Detailes" >  <i class="fa fa-eye"></i></a>

</td>

</tr>
@endforeach
    
</tbody>                  
                    </table>


</div>

</div>

</div>





</div>


</div>

</section>


@endsection
