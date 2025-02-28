

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
<div class="col-sm-4 invoice-col">
<address>
<strong>{{ $setting->school_name}}</strong><br>
{{ $setting->school_address }}<br>

Phone: {{ $setting->phone_one}} , &nbsp; {{ $setting->phone_two}}<br>
Email: <a href="">{{ $setting->email}}</a>
</address>
</div>



        <div class="col-12">
            <div>
                <div class="p-2">
                    <h3 class="font-size-16"><strong>Daily BookStock Purchases Report 
    <span class="btn btn-info"> {{ date('d-m-Y',strtotime($start_date)) }} </span> -
     <span class="btn btn-success"> {{ date('d-m-Y',strtotime($end_date)) }} </span>
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
<td class="text-center"><strong>Sl </strong></td>
<th class="text-center"><strong>Invoice No </strong></th>
<th class="text-center"><strong>Date </strong></th>
<th class="text-center"><strong>Book Name</strong></th>
<th class="text-center"><strong>Quantity</strong></th>
<th class="text-center"><strong>Unit Price</strong></th>
<th class="text-center"><strong>Total Price</strong></th>
</tr>
</thead>
<tbody>

@php
        $total_sum = '0';
        @endphp
        @foreach($allData as $key => $item)
        <tr>
           <td class="text-center">{{ $key+1 }}</td>
            <td class="text-center">{{ $item->invoice_no }}</td>
            <td class="text-center">{{ date('d-m-Y',strtotime($item->purchase_date)) }}</td>
            <td class="text-center">{{ $item['book']['name'] }}</td>
            <td class="text-center">{{ $item->book_qty }}  </td>
            <td class="text-center">{{ $item->unit_price }}</td>
            <td class="text-center">{{ $item->buying_price }}</td>
                        
        </tr>
        @php
        $total_sum += $item->buying_price;
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
<strong>Grand Amount</strong></td>
<td class="no-line text-end"><h4 class="m-0">${{ $total_sum}}</h4></td>
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