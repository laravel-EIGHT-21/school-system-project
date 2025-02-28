

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
<b>Supplier Wise Stock Report</b>
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

</div>


<div class="row">
<div class="col-12 table-responsive">
<h3 class="text-center"><strong>Supplier Name : </strong> {{ $allData['0']['supplier']['name'] }} </h3>

<table class="table">
<thead>
<tr>
<th><strong>Sl </strong></th>
<th class="text-center"><strong>Supplier Name </strong></th>
<th class="text-center"><strong>Unit </strong></th>
<th class="text-center"><strong>Category</strong></th>
<th class="text-center"><strong>Product Name</strong></th>
<th class="text-center"><strong>Stock </strong></th>
</tr>

</thead>
<tbody>

@foreach($allData as $key => $item)
        <tr>
         <td class="text-center"> {{ $key+1}} </td> 
         <td class="text-center"> {{ $item['supplier']['name'] }} </td> 
         <td class="text-center"> {{ $item['unit']['name'] }} </td> 
         <td class="text-center"> {{ $item['category']['name'] }} </td> 
         <td class="text-center"> {{ $item->name }} </td> 
         <td class="text-center"> {{ $item->quantity }} </td> 
            
            
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