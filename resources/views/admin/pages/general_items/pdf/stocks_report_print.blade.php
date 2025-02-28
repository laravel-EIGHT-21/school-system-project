<!DOCTYPE html>
<html lang="en">


<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
@php
$setting = App\Models\SiteSetting::find(1);
@endphp
<title>{{ ($setting->school_name) }} | @yield('title')</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
@php
$setting = App\Models\SiteSetting::find(1);
@endphp
<link rel="shortcut icon" href="{{ asset($setting->logo) }}" type="image/x-icon">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
<!--Font-Awesome-->


<script src="https://kit.fontawesome.com/02761bcd61.js" crossorigin="anonymous"></script>
  

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/fontawesome.min.css" integrity="sha512-TPigxKHbPcJHJ7ZGgdi2mjdW9XHsQsnptwE+nOUWkoviYBn0rAAt0A5y3B1WGqIHrKFItdhZRteONANT07IipA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css" integrity="sha512-xX2rYBFJSj86W54Fyv1de80DWBq7zYLn2z0I9bIhQG+rxIF6XVJUpdGnsNHWRa6AvP89vtFupEPDP8eZAtu9qA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="{{asset('Backend/dist/css/adminlte.min2167.css?v=3.2.0')}}">
<script nonce="eae2ac36-19e8-466f-8ab6-f4f5bc90c381">(function(w,d){!function(a,e,t,r,z){a.zarazData=a.zarazData||{},a.zarazData.executed=[],a.zarazData.tracks=[],a.zaraz={deferred:[]};var s=e.getElementsByTagName("title")[0];s&&(a.zarazData.t=e.getElementsByTagName("title")[0].text),a.zarazData.w=a.screen.width,a.zarazData.h=a.screen.height,a.zarazData.j=a.innerHeight,a.zarazData.e=a.innerWidth,a.zarazData.l=a.location.href,a.zarazData.r=e.referrer,a.zarazData.k=a.screen.colorDepth,a.zarazData.n=e.characterSet,a.zarazData.o=(new Date).getTimezoneOffset(),a.dataLayer=a.dataLayer||[],a.zaraz.track=(e,t)=>{for(key in a.zarazData.tracks.push(e),t)a.zarazData["z_"+key]=t[key]},a.zaraz._preSet=[],a.zaraz.set=(e,t,r)=>{a.zarazData["z_"+e]=t,a.zaraz._preSet.push([e,t,r])},a.dataLayer.push({"zaraz.start":(new Date).getTime()}),a.addEventListener("DOMContentLoaded",(()=>{var t=e.getElementsByTagName(r)[0],z=e.createElement(r);z.defer=!0,z.src="../../../../cdn-cgi/zaraz/sd0d9.js?z="+btoa(encodeURIComponent(JSON.stringify(a.zarazData))),t.parentNode.insertBefore(z,t)}))}(w,d,0,"script");})(window,document);</script></head>
<body>
<div class="wrapper">



<section class="invoice">

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

</div>


<div class="row">
<div class="col-12 table-responsive">
<table class="table table-striped">
<thead>
<tr>
<th class="text-center"><strong>Sl</strong></th> 
<th class="text-center"><strong>Supplier Name </strong></th>
<th class="text-center"><strong>Unit </strong></th>
<th class="text-center"><strong>Category</strong></th>
<th class="text-center"><strong>Product Name</strong></th>
<th class="text-center"><strong>In Qty  </strong></th>
<th class="text-center"><strong>Out Qty </strong></th>
<th class="text-center"><strong>Stock </strong></th>
</tr>
</thead>
<tbody>

@foreach($allData as $key => $item)

@php
$buying_total = App\Models\Purchase::where('category_id',$item->category_id)->where('product_id',$item->id)->where('status','1')->sum('buying_qty');
$selling_total = App\Models\InvoiceDetails::where('category_id',$item->category_id)->where('product_id',$item->id)->where('status','1')->sum('out_qty');
@endphp


       <tr>
        <td class="text-center"> {{ $key+1}} </td> 
        <td class="text-center"> {{ $item['supplier']['name'] }} </td> 
        <td class="text-center"> {{ $item['unit']['name'] }} </td> 
        <td class="text-center"> {{ $item['category']['name'] }} </td> 
        <td class="text-center"> {{ $item->name }} </td> 
         <td class="text-center"> {{ $buying_total }} </td> 
          <td class="text-center"> {{ $selling_total }} </td> 
        <td class="text-center"> {{ $item->quantity }} </td> 
           
           
       </tr>
        
       @endforeach 
          

</tbody>
</table>
</div>

</div>


</section>

</div>


<script data-cfasync="false" src="../../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>
  window.addEventListener("load", window.print());
</script>
</body>


</html>
