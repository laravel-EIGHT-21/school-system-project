  

@extends('admin.body.master')
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
                    <h3 class="font-size-16"><strong>Class Fees Category Annual Report Details For - 
    <span class="btn btn-info"><b> {{ $year }}  </b></span> 

                    </strong></h3>
                </div>
                
            </div>

        </div>
    


</div>

<br>


<div class="row">
<div class="col-12 table-responsive">
<table class="table table-striped">
<thead>
<tr>

<th class="text-center"><strong>Class</strong></th>
<th class="text-center"><strong>Fees Type </strong></th>
<th class="text-center"><strong>Month </strong></th>
<th class="text-center"><strong>Term</strong></th>

<th class="text-center"><strong>Fees Amount </strong></th>

</tr> 
</thead>
<tbody>
 
@php
        $total_sum = '0';
        @endphp
        @foreach($allData as $key => $item)
        <tr>
           
		@php
      $terms= App\Models\student_fees::where('term',$item->term)->get();
	  $months= App\Models\student_fees::where('month',$item->month)->get();
	  $terms1 = App\Models\student_fees::where('term',$item->term)->where('class',$item->class)->where('fee_category_id',$item->fee_category_id)->where('month',$item->month)->sum('fee_amount');
      @endphp

	  <td class="text-center">{{ $item->class}}</td>
            <td class="text-center">{{ $item['fee_category']['name'] }}</td>
            <td class="text-center">{{ $item->month }}</td>

			<td class="text-center">{{ $terms['0']['term'] }}</td>
            <td class="text-center">{{ ($terms1) }}</td>

                        
        </tr>
        @php
        $total_sum += $terms1;
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
<strong>Total Fees Expected</strong></td>
<td class="no-line text-end"><h4 class="m-0">ugx {{ $student_fee_total}}</h4></td>
</tr>
&nbsp;&nbsp;

<tr>
<td class="no-line"></td> 
<td class="no-line"></td> 
<td class="no-line"></td>
<td class="no-line text-center">
<strong>Total Fees Collected</strong></td>
<td class="no-line text-end"><h4 class="m-0">ugx {{ $total_sum}}</h4></td>
</tr>
&nbsp;&nbsp;


@php

$balancefees = (float)$student_fee_total-(float)$total_sum;
@endphp


<tr>
<td class="no-line"></td> 
<td class="no-line"></td> 
<td class="no-line"></td>
<td class="no-line text-center">
<strong>Total Fees Balances</strong></td>
<td class="no-line text-end"><h4 class="m-0">ugx {{ $balancefees}}</h4></td>
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