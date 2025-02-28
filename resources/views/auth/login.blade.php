<!DOCTYPE html>
<html lang="en">

 

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
@php
$setting = App\Models\SiteSetting::find(1);
@endphp
<title>{{ ($setting->school_name) }} | Log in</title>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">

<link rel="stylesheet" href="{{asset('Backend/plugins/fontawesome-free/css/all.min.css')}}">

<link rel="stylesheet" href="{{asset('Backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">

<link rel="stylesheet" href="{{asset('Backend/dist/css/adminlte.min2167.css?v=3.2.0')}}">
<script nonce="617296f0-b0ad-4a49-8c36-1832de404220">(function(w,d){!function(a,e,t,r,z){a.zarazData=a.zarazData||{},a.zarazData.executed=[],a.zarazData.tracks=[],a.zaraz={deferred:[]};var s=e.getElementsByTagName("title")[0];s&&(a.zarazData.t=e.getElementsByTagName("title")[0].text),a.zarazData.w=a.screen.width,a.zarazData.h=a.screen.height,a.zarazData.j=a.innerHeight,a.zarazData.e=a.innerWidth,a.zarazData.l=a.location.href,a.zarazData.r=e.referrer,a.zarazData.k=a.screen.colorDepth,a.zarazData.n=e.characterSet,a.zarazData.o=(new Date).getTimezoneOffset(),a.dataLayer=a.dataLayer||[],a.zaraz.track=(e,t)=>{for(key in a.zarazData.tracks.push(e),t)a.zarazData["z_"+key]=t[key]},a.zaraz._preSet=[],a.zaraz.set=(e,t,r)=>{a.zarazData["z_"+e]=t,a.zaraz._preSet.push([e,t,r])},a.dataLayer.push({"zaraz.start":(new Date).getTime()}),a.addEventListener("DOMContentLoaded",(()=>{var t=e.getElementsByTagName(r)[0],z=e.createElement(r);z.defer=!0,z.src="../../../../cdn-cgi/zaraz/sd0d9.js?z="+btoa(encodeURIComponent(JSON.stringify(a.zarazData))),t.parentNode.insertBefore(z,t)}))}(w,d,0,"script");})(window,document);</script></head>
<body class="hold-transition login-page">
<div class="login-box">
<div class="login-logo">
    <img src="{{ asset($setting->logo) }}" />  
<br><br>

  <a href="{{ url('/') }}"><b><strong>{{ ($setting->school_name) }}</strong> </b>   </a>

</div>




@if (session('error'))
     <div class="alert alert-danger">
         {{ session('error') }}
     </div>
  @endif


<div class="card">
<div class="card-body login-card-body">
<p class="login-box-msg">Sign in to start your session</p>
<form method="POST" action="{{ route('login') }}">
  @csrf  
<div class="input-group mb-3">
  <input type="email" name="email" id="email" class="form-control" placeholder="Email" :value="old('email')" required>
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-envelope"></span>
</div>
</div>
</div>
<div class="input-group mb-3">
<input type="password" name="password" class="form-control" placeholder="Password">
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-lock"></span>
</div>
</div>
</div>
<div class="row">
<div class="col-8">
<div class="icheck-primary">
<input type="checkbox" id="remember">
<label for="remember">
Remember Me
</label>
</div>
</div>

<div class="col-4">
<button type="submit" class="btn btn-primary btn-block">Sign In</button>
</div>

</div>
</form>


<p class="mb-1">
  
  @if (Route::has('password.request'))
<a href="{{route('password.request')}}">I forgot my password</a>
@endif
</p>

</div>

</div>
</div>


<script src="{{asset('Backend/plugins/jquery/jquery.min.js')}}"></script>

<script src="{{asset('Backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('Backend/dist/js/adminlte.min2167.js?v=3.2.0')}}"></script>
</body>


</html>
