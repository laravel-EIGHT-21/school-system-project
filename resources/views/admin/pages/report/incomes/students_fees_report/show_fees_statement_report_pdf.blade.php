  

@extends('admin.body.master')
@section('admin')


@section('title')
Financial Statement
@endsection


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

 
<div class="row">
<div class="col-12">

<div class="invoice p-3 mb-3">

@php
    $setting = App\Models\SiteSetting::find(1);
    $setting_logo = $setting->logo;
@endphp


<div class="row"> 
<div class="col-12">
<h4 class="page-header">

<small class="float-right">Print Date : {{ date("d M Y") }}</small>
</h4>
</div>

</div>




<div class="row invoice-info">
<div class="col-sm-5 invoice-col">
<address>
<strong>{{ $setting->school_name}}</strong><br>
{{ $setting->company_address }}<br>

Phone: {{ $setting->phone_one}} , &nbsp; {{ $setting->phone_two}}<br>
Email: <a href="">{{ $setting->email}}</a>
</address>
</div>


        <div class="col-12">
            <div>
                <div class="p-2">
                    <h3 class="font-size-16"><strong>School Financial Statement For -  
    <span class="btn btn-info"><b> {{ $allFees['0']['student']['name'] }} </b></span> 

                    </strong></h3>
                </div>
                
            </div>

        </div>
    
 

</div>

<br>


<div class="row">
<div class="col-12 table-responsive">
	
<h3 class="text-left"><strong>Financial Year : </strong> {{ $allFees['0']['year'] }} &nbsp;&nbsp; <b> | </b> &nbsp;&nbsp; <strong>Class : </strong> {{ $allFees['0']['class'] }} &nbsp;&nbsp; </h3>

<table class="table table-striped">
<thead>
<tr>
 


<th class="text-center"><strong>Fee Category</strong></th>
<th class="text-center"><strong>Term</strong></th>
<th class="text-center"><strong>Total Fee</strong></th>
<th class="text-center"><strong>Balance</strong></th>
<th class="text-center"><strong>Paid Fees </strong></th>


</tr>
</thead>
<tbody>

            
		@php
        $total_sum = '0';

        $total_bal = '0';

        @endphp

		@foreach($allFees as $key => $value )
						<tr>
						<td class="text-center">{{ $value['fee_category']['name'] }}</td>
							<td class="text-center">{{ $value->term}}</td>
							<td class="text-center">{{ $value->totalfee_amount }} ugx</td>

								@php 
								$originalfees = $value->totalfee_amount;
								$fees = $value->fee_amount;
								$balancefees = (float)$originalfees-(float)$fees;
								@endphp
							<td class="text-center">{{ $balancefees  }} ugx</td>

							<td class="text-center">{{ $value->fee_amount  }} ugx</td>
                                    
                           
						</tr>
						@php
        $total_sum += $value->fee_amount;

        $total_bal += $balancefees;

        @endphp
						@endforeach
           
           
           
                            </tbody>
</table>
</div>

</div>

<div class="row">


<div class="col-6">

</div>


<div class="col-6">
<div class="table-responsive">
<table class="table">

<tr>
<td class="no-line"></td> 
<td class="no-line"></td> 
<td class="no-line"></td>
<td class="no-line text-center">
<strong>Total Paid Fees</strong></td>
<td class="no-line text-end"><h4 class="m-0">Ugx{{ $total_sum}}</h4></td>
</tr>
&nbsp;&nbsp;

<tr>
<td class="no-line"></td> 
<td class="no-line"></td> 
<td class="no-line"></td>
<td class="no-line text-center">
<strong>Total Balance Fees</strong></td>
<td class="no-line text-end"><h4 class="m-0">Ugx{{ $total_bal}}</h4></td>
</tr>
</table>
</div>
</div>

</div>



<div class="d-print-none">
<div class="float-end">
<a href="javascript:window.print()" class="btn btn-success"><i class="fa fa-print"> Print</i></a>
</div>
</div>


</div>



</div>

</div>
</div>

@endsection