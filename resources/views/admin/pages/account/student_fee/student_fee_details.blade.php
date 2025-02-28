@extends('admin.body.master')
@section('admin')

@section('title')
Students Fees Tracking
@endsection



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
 

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-9">
<h1><b><span style="color:green;">{{$details['student']['name']}}`s</span> Fees Tracking Management</b></h1>
</div>

</div>
</div> 
</section>


<section class="content">
<div class="container-fluid">

<div class="row">


<div class="col-md-3">


<div class="info-box mb-3 bg-white">
    <div class="info-box-content">
    <span class="info-box-text">
        <b> 
<a href="{{ route('get.student.fee') }}" title="New Fees Collection"  class="btn btn-warning"><i class="fa fa-plus-square"></i></a>
</b>

&nbsp;
<b> 
<a href="{{ route('student.fee.view') }}" title="All Fees Details"   class="btn btn-info"><i class="fas fa-money-bill"></i></a>
</b>
&nbsp; 

<b> 
<a target="_blank" href="{{ route('student.add.fees',$details->id) }}" title="Add New Pupil`s Fees"  class="btn btn-success"><i class="fa fa-plus-square"></i></a>
</b>


</span>

    </div>
    
    </div>

<div class="info-box mb-3 bg-info">
    <span class="info-box-icon"><i class="fa fa-calendar"></i></span>
    <div class="info-box-content">
    <span class="info-box-text"><b> Year</b></span>
    <span class="info-box-number">{{ $details->year}}</span>
    </div>
    
    </div>

    <div class="info-box mb-3 bg-secondary">
    <span class="info-box-icon"><i class="fas fa-home"></i></span>
    <div class="info-box-content">
    <span class="info-box-text"><b>Class</b></span>
    <span class="info-box-number">{{ $details->class }}</span>
    </div>
    
    </div>

    <div class="info-box mb-3 bg-white">
    <span class="info-box-icon"><i class="fas fa-home"></i></span>
    <div class="info-box-content">
    <span class="info-box-text"><b> Term</b></span>

    <span class="info-box-number">{{ $details->term }}</span>

    </div>
    
    </div>



<div class="info-box mb-3 bg-warning">
    <span class="info-box-icon"><i class="fas fa-money-bill"></i></span>
    <div class="info-box-content">
    <span class="info-box-text"><b>Total Fees</b></span>
    <span class="info-box-number">{{ $details->totalfee_amount }} UGX</span>
    </div>
    
    </div>
    
    <div class="info-box mb-3 bg-success">
    <span class="info-box-icon"><i class="fas fa-money-bill"></i></span>
    <div class="info-box-content">
    <span class="info-box-text"><b>Fees Paid </b></span>
    <span class="info-box-number">{{ $details->fee_amount }} UGX</span>
    </div>
    
    </div>
    
    <div class="info-box mb-3 bg-danger">
    <span class="info-box-icon"><i class="fas fa-money-bill"></i></span>
    <div class="info-box-content">
    <span class="info-box-text"><b>Fees Due</b></span>
    @php 
    $originalfees = $details->totalfee_amount;
    $fees = $details->fee_amount;
    $balancefees = (float)$originalfees-(float)$fees;
    @endphp
    <span class="info-box-number">{{ $balancefees }} UGX</span>
    </div>
    
    </div>
    
    
   

</div>




<div class="col-md-9">
    <div class="card">
    <div class="card-header p-2">
    <ul class="nav nav-pills">
    <li class="nav-item"><strong> Fee Category :</strong> <b>{{ $details['fee_category']['name'] }}</b> &nbsp;&nbsp; <b> | </b> &nbsp;&nbsp;

@can('students-fees-details')
<a target="_blank" href="{{ route('student.fees.track.pdf',$details->id) }}" class="btn btn-success" title="Fees Topup Invoice" > <i class="fa fa-print"></i></a>
@endcan</li>
   
    </ul>
    </div>
    <div class="card-body">
    <div class="tab-content">

        
    
    
    <div class="active tab-pane" id="fees_info">
    <div class="card">
    <div class="card-header p-2">
    <ul class="nav nav-pills">
    <li class="nav-item"><a class="nav-link active" href="#fee_payemnts" data-toggle="tab"> Payments</a></li>
    <li class="nav-item"><a class="nav-link" href="#payment_amount" data-toggle="tab">Enter Payment </a></li>
    <li class="nav-item"><a class="nav-link" href="#other_fees_info" data-toggle="tab">Other Fees Details </a></li>
    </ul>
    </div>


    <div class="card-body">
    <div class="tab-content">

    <div class="active tab-pane" id="fee_payemnts">

    <div class="card-body p-0">
    <div class="table-responsive">
    <table class="table m-0" id="example2">
    <thead>
    <tr>
    <th>Prev.Fees</th> 
    <th> Topup</th>
    <th>Fees Paid</th>
    <th> Date</th>
    <th>Action</th>
    </tr>
    </thead>
    <tbody>
   
    @foreach($student_fees_log as $key => $log )
<tr>
<td> {{ $log->previous_fees }}</td>	
<td> {{ $log->increment_fees }}</td>	
<td> {{ $log->present_fees }}</td>	
<td> {{ $log->effected_date }}</td>	

<td>


<a target="_blank" href="{{ route('payment.fee.track.pdf',$log->id) }}" title="Fees Payment Invoice" class="btn-sm btn-success"><i class="fa fa-download"></i></a>


<a href="{{ route('student.fees.increment.delete',$log->id) }}" title="Delete"  id="delete" class="btn-sm btn-danger"><i class="fa fa-trash"></i></a>



</td>
	 
</tr>
@endforeach





    </tbody>
    </table>
    </div>
    
    </div>
    </div>




  
    
    <div class="tab-pane" id="payment_amount">

    <form class="form-horizontal" method="post" action="{{ route('update.student.increment.store',$details->id) }}">
    @csrf


    <div class="form-group row">
    <label for="inputName" class="col-sm-2 col-form-label">Total Fees</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" name="totalfee_amount" readonly value="{{$details->totalfee_amount}}">
    </div>
    </div>

    <div class="form-group row">
    <label for="inputName" class="col-sm-2 col-form-label">Paid Fees</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" name="fee_amount" readonly value="{{$details->fee_amount}}">
    </div>
    </div>

    @php 
$originalfees = $details->totalfee_amount;

$paidfees = $details->fee_amount;


$balancefees = (float)$originalfees-(float)$paidfees;


@endphp

<div class="form-group row">
    <label for="inputName" class="col-sm-2 col-form-label">Fees Balance</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" name="fee_amount" readonly value="{{$balancefees}}">
    </div>
    </div>



    @if($paidfees < $originalfees)
    
    <div class="form-group row">
    <label for="inputName" class="col-sm-2 col-form-label">Payment Topup</label>
    <div class="col-sm-10">
    <input type="text" class="form-control"  maxlength="7" name="increment_fees" required="">
    
    </div>
    </div>


        
    <div class="form-group row">

    <label for="inputName" class="col-sm-2 col-form-label">Payment Mode</label>
    <div class="col-sm-10">
<select name="payment_mode" id="payment_mode" required="" class="form-control">
<option value="" selected="" disabled="">Select Method</option>
<option value="Bank Slip">Bank Slip</option>
<option value="Cash">Cash</option>
<option value="Mobile Money">Mobile Money</option>
</select>	
</div>
    </div>




    <div class="form-group row">
    <div class="offset-sm-2 col-sm-10">
    <button type="submit" class="btn btn-danger">Add Fees Payment Topup </button>
    </div>
    </div>

    @else

    @endif

    </form>
    </div>






    
    <div class="tab-pane" id="other_fees_info">

    <div class="card-body p-0">
    <div class="table-responsive">
    <table class="table m-0" id="example3">
    <thead>
    <tr>
    <th>Category</th> 
<th>Total</th>
<th>Paid</th>
<th>Balance</th> 
<th>Term</th>
<th>Section</th> 
<th width="15%">Action</th> 
    </tr>
    </thead>
    <tbody>
   
    @foreach($allData as $key => $value )
<tr>
<td> {{ $value['fee_category']['name'] }}</td>	 
<td> {{ $value->totalfee_amount }}</td>
<td> {{ $value->fee_amount }}</td>

@php 
$originalfees = $value->totalfee_amount;
$fees = $value->fee_amount;
$balancefees = (float)$originalfees-(float)$fees;
@endphp

<td> {{ $balancefees }}</td>

<td> {{ $value->term }}</td>

<td> {{$value->day_boarding}}</td>


<td>


@can('students-fees-details')
<a title="Fees Payment Details" target="_blank" href="{{ route('student.fees.details',$value->id) }}" class="btn-sm btn-info"><i class="fa fa-eye"></i></a>
@endcan


@can('students-fees-details')
<a target="_blank" href="{{ route('student.fees.details.pdf',$value->id) }}" title="Fees Payment Invoice" class="btn-sm btn-success"><i class="fa fa-download"></i></a>
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


    </div>
    
    </div>







</div>
    
    </div>
    </div>
    
    </div>
<!-- ENd of row-9- -->





</div>




</section>
<br><br>

@endsection
