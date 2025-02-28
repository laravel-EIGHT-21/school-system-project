@extends('admin.admin_master')
@section('admin')


@section('title')
Student General Fees
@endsection

<section class="content-header">
<div class="container-fluid">
<div class="row mb-4">
<div class="col-sm-12">
<h1><b><span style="color:green;">{{$details['0']['student']['name']}}`s</span> General Fees Details</b></h1>
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
<h5 class="card-title">  

<b> Student`s ID : {{ $details['0']['student']['id_no'] }}   &nbsp;<b> | </b> &nbsp;  Year : {{ $details['0']['student_year']['name'] }} &nbsp;<b> | </b> &nbsp; Class : {{ $details['0']['student_class']['name'] }} </b>

</h5>

</div>
<div class="card-body">
<table class="table table-bordered table-striped">
<thead>
<tr> 
<th>Fee Category</th> 
<th>Total Fee</th>
<th>Fee Paid</th>
<th>Balance</th> 
<th>Term</th>
<th>Status</th>
<th>Date</th> 
<th width="15%">Action</th> 
</tr>
</thead> 
<tbody>
@foreach($details as $key => $value )
<tr>	
<td> {{ $value['fee_category']['name'] }}</td>	 
<td> {{ $value->originalfee_amount }}</td>
<td> {{ $value->fee_amount }}</td>

@php 
$originalfees = $value->originalfee_amount;
$fees = $value->fee_amount;
$balancefees = (float)$originalfees-(float)$fees;
@endphp

<td> {{ $balancefees }}</td>

<td> {{ $value['term']['name'] }}</td>
<td>

@php 

$originalfees = $value->originalfee_amount;

$zero_per = (float)0.0 * (float)$originalfees;
$all_per = (float)1 *(float)$originalfees;

@endphp

@if($value->fee_amount == $zero_per )
<span class="badge badge-pill badge-danger">Not Paid</span>

@elseif($value->fee_amount > $zero_per &&  $value->fee_amount < $all_per)
<span class="badge badge-pill badge-warning">Partial</span>

@elseif($value->fee_amount == $all_per )
<span class="badge badge-pill badge-success">Paid Full</span>
@endif


</td>
<td> {{$value->date}}</td>


<td>


@can('students-fees-details')
<a title="Fees Payment Details" target="_blank" href="{{ route('student.fees.details',$value->id) }}" class="btn btn-danger"><i class="fa fa-eye"></i></a>
@endcan


@can('students-fees-details')
<a target="_blank" href="{{ route('student.fees.details.pdf',$value->id) }}" title="Fees Payment Invoice" class="btn btn-success"><i class="fa fa-download"></i></a>
@endcan

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
<br><br>

@endsection
