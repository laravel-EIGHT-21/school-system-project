@extends('admin.admin_master')
@section('admin')

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1> Assign Subject Teachers Management</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Assigned Subject Teacher </li>
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
<h3 class="card-title">Assigned Subjects Details </h3>
			  
</div>

<div class="card-body">
<h4><strong> Teacher`s Name: </strong>{{ $detailsData['0']['user']['name'] }} </h4>
<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th width="5%">SL</th>  
<th width="15%">Subject </th> 

</tr>
</thead>
<tbody>
@foreach($detailsData as $key => $detail )
<tr>
<td>{{ $key+1 }}</td>
<td> {{ $detail['school_subject']['name'] }}</td>				 

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
