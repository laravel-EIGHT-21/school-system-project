
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
<h3 class="card-title">Fee Amount Details </h3>

<a href="{{ route('fee.amount.add') }}" style="float: right;" class="btn btn-rounded btn-success "> Add Fee Amount</a>	

</div>

<div class="card-body">
<h4><strong>Fee Category : </strong>{{ $detailsData['0']['fee_cateogry']['name'] }}</h4>
<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th width="5%">SL</th>  
<th>Class</th>
<th>Section(Day/Boarding)</th> 
<th width="25%">Amount</th>
</tr>
</thead>
<tbody>
@foreach($detailsData as $key => $details )
<tr> 
<td>{{ $key+1 }}</td>
<td> {{ $details->class }}</td>	
<td> {{ $details->day_boarding }}</td>			 
<td> {{ $details->amount }}</td>

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
