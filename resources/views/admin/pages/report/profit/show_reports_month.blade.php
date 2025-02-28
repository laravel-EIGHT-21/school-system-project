  

@extends('admin.admin_master')
@section('admin')

 
<div class="row">
<div class="col-12">

<div class="invoice p-3 mb-3">

@php
    $setting = App\Models\SiteSetting::find(1);
    $setting_logo = $setting->logo;
@endphp


<div class="row">
<div class="col-12">

<h5 class="text-left">

<img src="{{ asset($setting->logo) }}" alt="Logo Image" width="80" height="90">

</h5>

<h4>

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
                    <h3 class="font-size-16"><strong>Monthly School Financial Statement Report Details For - 
    <span class="btn btn-info"><b> {{ $month }} </b></span> 

                    </strong></h3>
                </div>
                
            </div>

        </div>
    
 

</div>

<br>


<div class="row">
<div class="col-12 table-responsive">
<table class="table">
<tr>

<td class="no-line ">
<strong>Total Incomes </strong> </td>
<td class="no-line text-end"><h4 class="m-0"><b>ugx {{ $student_fee_total}} </b></h4></td>

</tr>

</table>
</div>

</div>



<div class="row">


<div class="col-12">
<div class="table-responsive">
<table class="table">
<tr>

<td class="no-line ">
<strong><u>Expenses </u></strong>   </td>
</tr>
</table>
</div>
</div>

</div>



<div class="row">


<div class="col-12">
<div class="table-responsive">
<table class="table">
<tr>

<td class="no-line ">
<strong>Total Salary  </strong>   </td>
<td class="no-line text-end"><h4 class="m-0"><b>ugx {{$other_costs_total}} </b></h4></td>
</tr>



<tr>


<td>
<strong>Other Costs  </strong> </td>
<td class="no-line text-end"><h4 class="m-0"><b>ugx {{$expense}} </b></h4></td>

</tr>

</table>
</div>
</div>

</div>







<div class="row">


<div class="col-12">
<div class="table-responsive">
<table class="table">
<tr>

@php


$total_expense = $other_costs_total + $expense;

@endphp

<td class="no-line ">
<strong>Total Expenses   </strong> </td>
<td class="no-line text-end"><h4 class="m-0"><b>ugx {{$total_expense}} </b></h4></td>

</tr>
</table>
</div>
</div>

</div>




<br>




<hr>

<div class="row">


<div class="col-12">
<div class="table-responsive">
<table class="table">
<tr>

@php


$gross_incomes = $student_fee_total - $total_expense;

@endphp

<td class="no-line ">
<strong>Gross Income  </strong> </td>
<td class="no-line text-end"><h4 class="m-0"><b>ugx {{$gross_incomes}} </b></h4></td>

</tr>
</table>
</div>
</div>

</div>




<br><br>


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