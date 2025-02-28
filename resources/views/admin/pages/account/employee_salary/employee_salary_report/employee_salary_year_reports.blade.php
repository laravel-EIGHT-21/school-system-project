 
 

@extends('admin.body.master')
@section('admin')


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
<h4>

<small class="float-right">Print Date : {{ date("d M Y") }}</small>
</h4>
</div>

</div>




<div class="row invoice-info">
<div class="col-sm-4 invoice-col">
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
                    <h3 class="font-size-16"><strong>Employees` Annual Salary Report  For - 
    <span class="btn btn-info"> {{ $year }} </span> 

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
<td class="text-center"><strong>Month</strong></td>
<th class="text-center"><strong>Amount Remaining</strong></th>
<th class="text-center"><strong>Amount Received</strong></th>
</tr>
</thead>
<tbody>

@php
        $total_sum = '0';

        $total_sum2 = '0';

        @endphp

        @foreach($other_costs as $key => $item)
        <tr>

		@php
     
	 $terms1 = App\Models\employee_salary::where('month',$item->month)->where('year',$item->year)->sum('salary_amount_picked');
	 $terms2 = App\Models\employee_salary::where('month',$item->month)->where('year',$item->year)->sum('salary_amount_left');
	 @endphp

           <td class="text-center">{{ $item->month}}</td>
            <td class="text-center">{{ ($terms2)}}</td>
            <td class="text-center">{{ ($terms1) }}</td>
                        
        </tr>
        @php
        $total_sum += $terms1;

        $total_sum2 += $terms2;

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
<strong>Total Remaining</strong></td>
<td class="no-line text-end"><h4 class="m-0">ugx {{ $total_sum2}}</h4></td>
</tr>

<tr>
<td class="no-line"></td> 
<td class="no-line"></td> 
<td class="no-line"></td>
<td class="no-line text-center">
<strong>Total Received</strong></td>
<td class="no-line text-end"><h4 class="m-0">ugx {{ $total_sum}}</h4></td>
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