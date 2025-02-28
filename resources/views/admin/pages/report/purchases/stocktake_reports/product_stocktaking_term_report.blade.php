  

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
                    <h3 class="font-size-16"><strong>Termly Product`s StockTaking Report Details

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

<td class="text-center"><strong>Term </strong></td>
<td class="text-center"><strong>Date </strong></td>
<td class="text-center"><strong>Product</strong></td>
<td class="text-center"><strong>Current Stock </strong></td>
<th class="text-center"><strong>Good Cond.</strong></th>
<th class="text-center"><strong>Bad Cond.</strong></th>
<th class="text-center"><strong>Description</strong></th>

</tr>
</thead>
<tbody>

@php
        $total_sum = '0';
        @endphp
        @foreach($allData as  $item)
        <tr>
           
        <td class="text-center">{{ $item['term']['name'] }}</td>
           <td class="text-center">{{ date('d-m-Y',strtotime($item->stock_take_date)) }}</td>
		   <td class="text-center">{{ $item['item']['name'] }}</td>
            <td class="text-center">{{ $item['item']['quantity'] }}</td>
            <td class="text-center">{{ $item->good_cond }}</td>
            <td class="text-center">{{ $item->bad_cond }}</td>
            <td class="text-center">{{ $item->description }}</td>

                        
        </tr>

        @endforeach
            
           
           
           
                            </tbody>
</table>
</div>

</div>

<div class="row">


<div class="col-6">

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