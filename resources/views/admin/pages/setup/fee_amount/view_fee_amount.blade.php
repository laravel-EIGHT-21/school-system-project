
@extends('admin.body.master')
@section('admin')



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1> Fee Amount Management</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Fee Amount </li>
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
<h3 class="card-title">Fee Amount List </h3>


<a href="{{ route('fee.amount.add') }}" style="float: right;" class="btn btn-rounded btn-success "> Add Fee Amount</a>	


</div>

<div class="card-body">
<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th width="5%">SL</th>
<th>Fee Category Amount</th> 
<th width="25%">Action</th>
</tr>
</thead>
<tbody>
@foreach($allData as $key => $amount )
<tr>
<td>{{ $key+1 }}</td>
<td> {{ $amount['fee_cateogry']['name'] }}</td>				 
<td>


<a href="{{ route('fee.amount.edit',$amount->fee_category_id) }}" class="btn btn-info" Title="Edit">
<i class="fa fa-edit"></i></a>



<a href="{{ route('fee.amount.details',$amount->fee_category_id) }}" class="btn btn-primary" Title="Details">
<i class="fa fa-eye"></i></a>


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
