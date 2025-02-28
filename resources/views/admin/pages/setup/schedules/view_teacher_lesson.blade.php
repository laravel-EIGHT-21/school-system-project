
@extends('admin.body.master')
@section('admin')



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Teacher Lessons Schedules Information</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Lessons Schedules </li>
</ol>
</div>
</div>
</div>
</section>

<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-header">
<h3 class="card-title">Lessons Schedules List </h3>


</div>

<div class="card-body">
<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th width="5%">SL</th>  
 
<th>Term</th>


<th width="10%">Action</th>
</tr>
</thead>
<tbody>
@foreach($allData as $key => $subject )
<tr>
<td>{{ $key+1 }}</td>
<td> {{ $subject->term }}</td>			


@php
$id = Auth::user()->id;
$user = App\Models\lessons::where('user_id',$id)->get();

@endphp

<td>

<a href="{{ route('teacher.lessons.schedule',$user['0']['user']['id']) }}?user_id={{ $user['0']['user']['id'] }}" class="btn btn-sm btn-success" target="_blank" title="View Schedule Details"><i class="fa fa-calendar"></i></a>

</td>

</tr>
@endforeach
    
</tbody>                  
                    </table>


</div>

</div>

</div>





</div>


</div>

</section>


@endsection
