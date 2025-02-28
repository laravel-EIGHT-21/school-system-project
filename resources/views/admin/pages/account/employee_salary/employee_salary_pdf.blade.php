<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{$details['user']['name'] }} Monthly Salary - Invoice</title>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">

<link rel="stylesheet" href="{{asset('Backend/plugins/fontawesome-free/css/all.min.css')}}">

<link rel="stylesheet" href="{{asset('Backend/dist/css/adminlte.min2167.css?v=3.2.0')}}">
<script nonce="afd42652-4911-401b-84f2-b852d0aada0f">(function(w,d){!function(a,e,t,r,z){a.zarazData=a.zarazData||{},a.zarazData.executed=[],a.zarazData.tracks=[],a.zaraz={deferred:[]};var s=e.getElementsByTagName("title")[0];s&&(a.zarazData.t=e.getElementsByTagName("title")[0].text),a.zarazData.w=a.screen.width,a.zarazData.h=a.screen.height,a.zarazData.j=a.innerHeight,a.zarazData.e=a.innerWidth,a.zarazData.l=a.location.href,a.zarazData.r=e.referrer,a.zarazData.k=a.screen.colorDepth,a.zarazData.n=e.characterSet,a.zarazData.o=(new Date).getTimezoneOffset(),a.dataLayer=a.dataLayer||[],a.zaraz.track=(e,t)=>{for(key in a.zarazData.tracks.push(e),t)a.zarazData["z_"+key]=t[key]},a.zaraz._preSet=[],a.zaraz.set=(e,t,r)=>{a.zarazData["z_"+e]=t,a.zaraz._preSet.push([e,t,r])},a.dataLayer.push({"zaraz.start":(new Date).getTime()}),a.addEventListener("DOMContentLoaded",(()=>{var t=e.getElementsByTagName(r)[0],z=e.createElement(r);z.defer=!0,z.src="../../../../cdn-cgi/zaraz/sd0d9.js?z="+btoa(encodeURIComponent(JSON.stringify(a.zarazData))),t.parentNode.insertBefore(z,t)}))}(w,d,0,"script");})(window,document);</script></head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>SALARY DETAILS FOR : {{ $details['user']['name'] }}</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Invoice</li>
</ol>
</div>
</div>
</div>
</section>
<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-12">
	@php
    $settings = App\Models\SiteSetting::find(1);
    @endphp

<div class="invoice p-3 mb-3">

<div class="row">
<div class="col-12">
<h4>
<i class="fas fa-globe"></i> {{ $settings->school_name}}.
<small class="float-right">Print Date : {{ date("d M Y") }}</small>
</h4>
</div>

</div>

<div class="row invoice-info">
<div class="col-sm-4 invoice-col">
From
<address>
<strong>{{ $settings->school_name}}.</strong><br>
{{ $settings->company_address }}<br>
Phone: {{ $settings->phone_one}}<br>
Email: {{ $settings->email}}
</address>
</div>

<div class="col-sm-4 invoice-col">
To
<address>
<strong>{{ $details['user']['name'] }}</strong><br>

<b>Salary For The Month :</b> {{ $details->month }}<br>
<b>Title:</b> {{ $details['user']['designation']['name'] }}<br>
<b>Year:</b> {{ $details->year }}<br>
</address>
</div>


</div>


<div class="row">
<div class="col-12 table-responsive">
<table class="table table-striped">
<thead>
<tr>
	<th> Total Salary </th> 
	<th>Total Salary Picked </th> 
	<th>Total Salary Left</th>       
</tr>
</thead>
<tbody>

	<tr>

		<td>{{ $details->amount  }} ugx</td>
		<td>{{ $details->salary_amount_picked  }} ugx</td>
		<td>{{ $details->salary_amount_left  }} ugx</td>
</tr>

</tbody>
</table>
</div>

</div>



<br><br>


<div class="row">
	<div class="col-12 table-responsive">
	<table class="table table-striped">
	<thead>
	<tr>
		<th>Salary Picked</th>
		<th>Salary Left</th>
		<th> Date Picked</th>




	</tr>
</tbody>
<tbody class="body">
@foreach($salary_log as $key => $log )
	<tr>

		<td>{{ $log->salary_picked }} ugx</td>
		<td>{{ $log->salary_left }} ugx</td>
		<td>{{ $log->effected_date }} </td>


		   
		</tr>
		@endforeach
	
	</tbody>
	</table>
	</div>
	
	</div>
	




<div class="row no-print">
<div class="col-12">
	
<button type="button" class="btn btn-info" onclick="javascript:window.print()"><i class="fa fa-print"></i> Print</button>


</div>
</div>
</div>

</div>
</div>
</div>
</section>

</div>



<script data-cfasync="false" src="../../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="{{asset('Backend/plugins/jquery/jquery.min.js')}}"></script>

<script src="{{asset('Backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('Backend/dist/js/adminlte.min2167.js?v=3.2.0')}}"></script>


</body>


</html>
