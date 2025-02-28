@extends('admin.body.master')
@section('admin')



@section('title')
Employee Salary Tracking
@endsection


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-9">
<h1><b><span style="color:green;">{{$details['user']['name'] }}`s</span> Salary Management</b></h1>
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
<a href="{{ route('account.salary.view') }}"   class="btn btn-warning"><b>View All Details</b></a>
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

    

    <div class="info-box mb-3 bg-white">
    <span class="info-box-icon"><i class="fa fa-calendar"></i></span>
    <div class="info-box-content">
    <span class="info-box-text"><b> Month</b></span>
    <span class="info-box-number">{{ $details->month }}</span>
    </div>
    
    </div>



<div class="info-box mb-3 bg-warning">
    <span class="info-box-icon"><i class="fas fa-money-bill"></i></span>
    <div class="info-box-content">
    <span class="info-box-text"><b>Total Salary</b></span>
    <span class="info-box-number">{{ $details->amount }} UGX</span>
    </div>
    
    </div>


    <div class="info-box mb-3 bg-success">
    <span class="info-box-icon"><i class="fas fa-money-bill"></i></span>
    <div class="info-box-content">
    <span class="info-box-text"><b>Salary Picked</b></span>
    <span class="info-box-number"> {{ $details->salary_amount_picked }} UGX</span>
    </div>
    
    </div>
    
    <div class="info-box mb-3 bg-danger">
    <span class="info-box-icon"><i class="fas fa-money-bill"></i></span>
    <div class="info-box-content">
    <span class="info-box-text"><b>Salary Left</b></span>

    <span class="info-box-number">{{ $details->salary_amount_left }} UGX</span>
    </div>
    
    </div>


</div>



<div class="col-md-9">

<div class="card">
    <div class="card-header p-2">
    <ul class="nav nav-pills">
    <li class="nav-item">

    @can('account-salary-view')
<a target="_blank" href="{{ route('account.salary.pdf',$details->id) }}" class="btn btn-success" title="Salary Tracking Invoice" style="float:right;"> <i class="fa fa-print"></i></a>
@endcan</li>
   
    </ul>
    </div>
    <div class="card-body">
    <div class="tab-content">

        
    
    
    <div class="active tab-pane" >
    <div class="card">
    <div class="card-header p-2">
    <ul class="nav nav-pills">
    <li class="nav-item"><a class="nav-link active" href="#salary_track_list" data-toggle="tab"> Salary Tracking</a></li>
    <li class="nav-item"><a class="nav-link" href="#salary_picked" data-toggle="tab">Enter Salary Picked </a></li>
    <li class="nav-item"><a class="nav-link" href="#salary_year_info" data-toggle="tab">Annual Salary Details </a></li>
    </ul>
    </div>


    <div class="card-body">
    <div class="tab-content">

    <div class="active tab-pane" id="salary_track_list">

    <div class="card-body p-0">
    <div class="table-responsive">
    <table class="table m-0" id="example2">
    <thead>
    <tr>
    <th>Total Salary </th>                               
<th> Received</th>
<th>Left</th>
<th>Date</th>
<th>Action</th>
</tr>
</thead>
<tbody>
@foreach($salary_log as $key => $log )
<tr>
<td> {{ $log->previous_salary}}</td>	
<td> {{ $log->salary_picked }}</td>	
<td> {{ $log->salary_left }}</td>	
<td> {{ $log->effected_date }}</td>	
<td>


<a target="_blank" href="{{ route('account.salary.picked.pdf',$log->id) }}" title="Salary Picked Invoice" class="btn-sm btn-success"><i class="fa fa-download"></i></a>

@can('account-salary-view')
<a href="{{ route('account.salary.picked.delete',$log->id) }}" title="Delete Amount Picked" id="delete" class="btn-sm btn-danger"><i class="fa fa-trash"></i></a>
@endcan


</td>


</tr>
@endforeach

</tbody>


    </table>
    </div>
    
    </div>
    </div>




  
    
    <div class="tab-pane" id="salary_picked">

    <form method="post" action="{{ route('update.account.salary.picked.store',$details->id) }}">
	 	@csrf

       @php 
    $originalfees = $details->amount;
    $fees = $details->salary_amount_picked;
    
    @endphp

    <div class="form-group row">
    <label for="inputName" class="col-sm-2 col-form-label">Total Salary</label>
    <div class="col-sm-10">
    <input type="text" name="amount" class="form-control" readonly value="{{$details->amount}}">
    </div>
    </div>

    
    <div class="form-group row">
    <label for="inputName" class="col-sm-2 col-form-label">Amount Received</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" name="salary_amount_picked" readonly value="{{$details->salary_amount_picked}}">
    </div>
    </div>


    <div class="form-group row">
    <label for="inputName" class="col-sm-2 col-form-label">Amount Left</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" name="salary_amount_left" readonly value="{{$details->salary_amount_left}}">
    </div>
    </div>



    @if($fees < $originalfees)

    
    <div class="form-group row">
    <label for="inputName" class="col-sm-2 col-form-label">Enter Amount Picked</label>
    <div class="col-sm-10">
    <input type="text" class="form-control"  maxlength="7" name="salary_picked" required="">
    
    </div>
    </div>


    <div class="form-group row">
    <div class="offset-sm-2 col-sm-10">
    <button type="submit" class="btn btn-danger">Submit Salary Amount Received </button>
    </div>
    </div>

    @else

    @endif

    </form>
    </div>






    
    <div class="tab-pane" id="salary_year_info">

    <div class="card-body p-0">
    <div class="table-responsive">
    <table class="table m-0" id="example3">
    <thead>
    <tr>
<th>Salary</th>
<th>Picked</th>
<th>Left</th>
<th>Month</th> 
<th>Action</th> 
    </tr>
    </thead>
    <tbody>
   
    @foreach($allData as $key => $value )
<tr>

@php 

$subtotal=$value->amount;
@endphp

<td> {{round($subtotal,0)}}</td>
<td> {{ $value->salary_amount_picked }}</td>
<td> {{ $value->salary_amount_left }}</td>	 
<td> {{ $value->month }}</td>

<td>

 


@can('account-salary-view')
<a title="Salary Details" target="_blank" href="{{ route('account.salary.details',$value->id) }}" class="btn-sm btn-warning"><i class="fas fa-money-bill"></i></a>
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
