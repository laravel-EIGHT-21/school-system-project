

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
                    <h3 class="font-size-16"><strong>Monthly Termly Visitors Report Details For - 
    <span class="btn btn-info"><b> {{ $month }} </b></span> 

                    </strong></h3>
                </div>
                
            </div>

        </div>



</div>

 
<div class="row"> 
<div class="col-12 table-responsive">  
<table class="table ">
<thead> 
<tr>

<th class="text-center"><strong>Term </strong></th>
<th class="text-center"><strong>Date</strong></th>
<th class="text-center"><strong>Name</strong></th>
<th class="text-center"><strong>Contact</strong></th>
<th class="text-center"><strong>Purpose of Visit</strong></th>
<th class="text-center"><strong> Time (In - Out)</strong></th>

</tr>
</thead>
<tbody>
@foreach($visitor_log as $key => $details)
        <tr>
		<td class="text-center">{{ $details['term']['name'] }}</td>
           <td class="text-center">{{ $details->date }}</td>
            <td class="text-center">{{ $details->name }}</td>
            <td class="text-center">{{ $details->phone }}</td>
            <td class="text-center">{{ $details->purpose }}</td>
			<td class="text-center">{{ $details->time_in}} - {{ $details->time_out}}</td>
           
       </tr>
        
       @endforeach 
          

</tbody>
</table>
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