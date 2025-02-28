
@extends('admin.body.master')
@section('admin')



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1> Lessons Schedule Management</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Lessons Schedule</li>
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
<h3 class="card-title">Lessons Schedule Details </h3>


<a href="{{ route('lessons.view') }}" style="float: right;" class="btn btn-rounded btn-success ">View Lessons Schedule</a>	


</div>

<div class="card-body">
<h4> <strong>Class : </strong>{{ $detailsData['0']->class }}  &nbsp;| &nbsp; <strong>Term: </strong>{{ $detailsData['0']->term }} &nbsp;| &nbsp; <strong>Day : </strong>{{ $detailsData['0']->day }} </h4>
<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th width="5%">SL</th>  
<th>Time</th> 
<th>Subject</th>
<th>Teacher</th>
</tr>
</thead>
<tbody>
@foreach($detailsData as $key => $details )
<tr> 
<td>{{ $key+1 }}</td>
<td> {{ $details->start_time }} - {{ $details->end_time }}</td>				 
<td> {{ $details['subject']['name'] }}</td>
<td> {{ $details['user']['name'] }}</td>
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
