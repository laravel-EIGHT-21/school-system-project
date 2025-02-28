@extends('admin.body.master')
@section('admin')


@section('title')
Expense Tracking
@endsection


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-9">
<h1><b><span style="color:green;">{{$details['category']['name'] }}</span>&nbsp; Payment Tracking Management</b></h1>
</div>

</div>
</div>
</section>


<section class="content">
<div class="container-fluid">

<div class="row">

<div class="col-md-3">




<div class="info-box mb-3 bg-light">
    <div class="info-box-content">
    <span class="info-box-text">
        <b> 
<a href="{{ route('other.cost.view') }}"   class="btn btn-warning"><b>View All Expenses </b></a>
</b>


</span>

    </div>
    
    </div>


<div class="info-box mb-3 bg-info">
    <span class="info-box-icon"><i class="fa fa-calendar"></i></span>
    <div class="info-box-content">
    <span class="info-box-text"><b>Year</b></span>
    <span class="info-box-number">{{ $details->year }}</span>
    </div>
    
    </div>

    

    <div class="info-box mb-3 bg-light">
    <span class="info-box-icon"><i class="fas fa-home"></i></span>
    <div class="info-box-content">
    <span class="info-box-text"><b> Term</b></span>
    <span class="info-box-number">{{ $details->term}}</span>
    </div>
    
    </div>



<div class="info-box mb-3 bg-warning">
    <span class="info-box-icon"><i class="fas fa-money-bill"></i></span>
    <div class="info-box-content">
    <span class="info-box-text"><b>Total </b></span>
    <span class="info-box-number">{{ $details->invoice_amount }} UGX</span>
    </div>
    
    </div>
    
    <div class="info-box mb-3 bg-success">
    <span class="info-box-icon"><i class="fas fa-money-bill"></i></span>
    <div class="info-box-content">
    <span class="info-box-text"><b> Paid </b></span>
    <span class="info-box-number">{{ $details->amount_paid }} UGX</span>
    </div>
    
    </div>
    
    <div class="info-box mb-3 bg-danger">
    <span class="info-box-icon"><i class="fas fa-money-bill"></i></span>
    <div class="info-box-content">
    <span class="info-box-text"><b> Balance</b></span>
    @php 
    $originalfees = $details->invoice_amount;
    $fees = $details->amount_paid;
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
    <li class="nav-item"><strong>  Expense :</strong> <b>{{ $details['category']['name'] }} </b>&nbsp;&nbsp; <b> | </b> &nbsp;&nbsp;

    @can('other-cost-view')
<a target="_blank" href="{{ route('other.cost.track.pdf',$details->id) }}" class="btn btn-success" title="Expense Payment Invoice" > <i class="fa fa-print"></i></a>
@endcan</li>
   
    </ul>
    </div>
    <div class="card-body">
    <div class="tab-content">

        
    
    
    <div class="active tab-pane" id="fees_info">
    <div class="card">
    <div class="card-header p-2">
    <ul class="nav nav-pills">
    <li class="nav-item"><a class="nav-link active" href="#expense_payments" data-toggle="tab"> Payments</a></li>
    <li class="nav-item"><a class="nav-link" href="#expense_payment_amount" data-toggle="tab">Enter Payment </a></li>
    <li class="nav-item"><a class="nav-link" href="#expense_payment_info" data-toggle="tab">Expense Payment Details </a></li>
    </ul>
    </div>


    <div class="card-body">
    <div class="tab-content">

    <div class="active tab-pane" id="expense_payments">

    <div class="card-body p-0">
    <div class="table-responsive">
    <table class="table m-0" id="example2">
    <thead>
    <tr>
    <th>Prev. Amount</th>                               
    <th>Topup Pay</th>
    <th>Paid</th>
    <th>Date</th>
    <th>Action</th>
    </tr>
    </thead>
    <tbody>
@foreach($other_cost_log as $key => $log )
<tr>
<td> {{ $log->previous_amount }}</td>	
<td> {{ $log->increment_amount }}</td>	
<td> {{ $log->present_amount }}</td>	
<td> {{ $log->effected_date }}</td>	

<td>


<a target="_blank" href="{{ route('payment.amount.track.pdf',$log->id) }}" title="Amount Payment Invoice" class="btn-sm btn-success"><i class="fa fa-download"></i></a>


<a href="{{ route('other.cost.increment.delete',$log->id) }}" title="Delete"  id="delete" class="btn-sm btn-danger"><i class="fa fa-trash"></i></a>



</td>


	 
</tr>
@endforeach

</tbody>

    </table>
    </div>
    
    </div>
    </div>




  
    
    <div class="tab-pane" id="expense_payment_amount">

    <form method="post" action="{{ route('update.other.cost.increment.store',$details->id) }}">
	 	@csrf

       @php 
    $originalfees = $details->invoice_amount;
    $fees = $details->amount_paid;
    $balancefees = (float)$originalfees-(float)$fees;
    @endphp

    <div class="form-group row">
    <label for="inputName" class="col-sm-2 col-form-label">Invoice Amount</label>
    <div class="col-sm-10">
    <input type="text" name="invoice_amount" class="form-control" readonly value="{{$details->invoice_amount}}">
    </div>
    </div>

    <div class="form-group row">
    <label for="inputName" class="col-sm-2 col-form-label">Paid Amount</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" name="amount_paid" readonly value="{{$details->amount_paid}}">
    </div>
    </div>



<div class="form-group row">
    <label for="inputName" class="col-sm-2 col-form-label">Balance Amount</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" name="amount_paid" readonly value="{{$balancefees}}">
    </div>
    </div>



    @if($fees < $originalfees)


    
    <div class="form-group row">
    <label for="inputName" class="col-sm-2 col-form-label">Payment Topup</label>
    <div class="col-sm-10">
    <input type="text" class="form-control"  maxlength="7" name="increment_amount" required="">
    
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
    <button type="submit" class="btn btn-danger">Add Amount Payment Topup </button>
    </div>
    </div>

    @else

    @endif

    </form>
    </div>






    
    <div class="tab-pane" id="expense_payment_info">

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
<th>Status</th>
<th>Date</th> 
<th>Action</th> 
    </tr>
    </thead>
    <tbody>
   
    @foreach($allData as $key => $value )
<tr>
<td> {{ $value['category']['name'] }}</td>	 
<td> {{ $value->invoice_amount }}</td>
<td> {{ $value->amount_paid }}</td>

@php 
$originalfees = $value->invoice_amount;
$fees = $value->amount_paid;
$balancefees = (float)$originalfees-(float)$fees;
@endphp

<td> {{ $balancefees }}</td>

<td> {{ $value->term }}</td>
<td>

@php 

$originalfees = $value->invoice_amount;

$zero_per = (float)0.0 * (float)$originalfees;
$all_per = (float)1 *(float)$originalfees;

@endphp

@if($value->amount_paid == $zero_per )
<span class="badge badge-pill badge-danger">No Payment</span>

@elseif($value->amount_paid > $zero_per &&  $value->amount_paid < $all_per)
<span class="badge badge-pill badge-warning">Partial</span>

@elseif($value->amount_paid == $all_per )
<span class="badge badge-pill badge-success">Paid</span>
@endif


</td>	

<td> {{date('d-m-Y', strtotime($value->date))}}</td>


<td> 



@can('other-cost-view')
<a title="Amount Payment Details" target="_blank" href="{{ route('other.cost.details',$value->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></a>
@endcan

@can('other-cost-view')
<a target="_blank" href="{{ route('other.cost.details.pdf',$value->id) }}" title="Amount Payment Invoice" class="btn btn-sm btn-success"><i class="fa fa-download"></i></a>
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


</div>

</section>
<br><br>

@endsection
