

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
<b>Kitchen-Stock Report</b>
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

</div>

 
<div class="row"> 
<div class="col-12 table-responsive">  
<table class="table ">
<thead>
<tr>
<th class="text-center"><strong>Date</strong></th>
<th class="text-center"><strong>Category</strong></th>
<th class="text-center"><strong>Product Name</strong></th>
<th class="text-center"><strong>Current Stock </strong></th>
<th class="text-center"><strong> Quantity Used </strong></th>

</tr>
</thead>
<tbody>
@foreach($invoice['invoice_details'] as $key => $details)
        <tr>
           <td class="text-center">{{ $details->date }}</td>
            <td class="text-center">{{ $details['category']['name'] }}</td>
            <td class="text-center">{{ $details['product']['name'] }}</td>
            <td class="text-center">{{ $details['product']['quantity'] }} - ({{ $details['product']['unit']['name'] }})</td>
            <td class="text-center">{{ $details->out_qty }} - ({{ $details['product']['unit']['name'] }})</td>
            
           
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