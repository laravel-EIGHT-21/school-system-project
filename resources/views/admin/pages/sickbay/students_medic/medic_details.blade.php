@extends('admin.body.master')
@section('admin')

@section('title')
Student`s Health Info
@endsection

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6"> 
<h1>Student Medication Details</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Medication Details</li>
</ol>
</div>
</div>
</div>
</section>

<section class="content">
<div class="container-fluid">

<div class="row">
<div class="col-md-12 col-12">
<div class="card">
<div class="card-header">
<h3 class="card-title"><strong>Student Details</strong></h3>
</div>

<div class="card-body">
<table class="table table-striped">

<tr>
<th> Student Name : </th>
<th> {{ $medic_issued->student->name }} </th>
</tr>

<tr> 
<th> Student ID: </th>
<th> {{ $medic_issued->student->id_no }} </th>
</tr>


<tr>
<th>  Year : </th>
<th> {{ $medic_issued->year}} </th>
</tr>

<tr>
<th> Student Class: </th>
<th> {{ $medic_issued->class}} </th>
</tr>

<tr>
<th> Term: </th>
<th> {{ $medic_issued->term}} </th>
</tr>


</table>
</div>


</div>



</div>



</div>



<div class="row">



<div class="col-md-6 col-12">
<div class="card">

<div class="card-body">
<div class="form-group">
<label>Medical Diagnostics</label>
<textarea id="editor1" name="diagnostics" rows="10" cols="80" readonly>
{!!$medic_issued->diagnostics !!}
</textarea>

</div>
</div>


</div>



</div>








<div class="col-md-6 col-12">
<div class="card">
<div class="card-header">
<h3 class="card-title"><strong>Medications Details</strong></h3>
</div>

<div class="card-body">
<table class="table table-striped">

<tr>
<th> Clinic_No: </th>
<th> {{ $medic_issued->clinic_no}} </th>
</tr>


<tr>
<th> Illness(Disease): </th>
<th> {{ $medic_issued->illness }} </th>
</tr>

<tr>
<th> Start Date: </th>
<th> {{ $medic_issued->start_date}} </th>
</tr>

<tr>
<th> End Date: </th>
<th> {{ $medic_issued->end_date}} </th>
</tr>


<tr>
<th> Administered Date : </th>
<th> {{ $medic_issued->date }} </th>
</tr> 

 
<tr>
<th> Medication Status : </th>
<th>   
<span class="badge badge-pill " style="background: yellow;"><strong>{{ $medic_issued->medic_status }} </strong></span> </th>
</tr>


<tr>
<th>  </th>
<th> 
@if($medic_issued->medic_status == 'On Medication')
<a href="{{ route('start-to-finish',$medic_issued->clinic_no) }}" class="btn btn-block btn-success" id="medic">Dosage Has Been Completed</a>


@elseif($medic_issued->medic_status == 'Finished Medication')
<p style="color:green;"><b>Completed Treatment Successfully</b></p>

@endif

</th>
</tr>

<tr>
    <th>  </th>
    <th> 

  
    </th>
    </tr>


</table>
</div>


</div>



</div>


</div>




<br>
<div class="row">
<div class="col-md-12 col-12">

<div class="box box-bordered border-primary">

<div class="card-header">
<h3 class="card-title" style="text-align: center;"><strong >Medicine Details</strong></h3>
</div>

 
<table class="table">
<tbody>

<tr>


<td width="10%">
<label for="" style="color:green"><b> Medicine Name </b></label>
</td>

<td width="10%">
<label for="" style="color:green"><b> Medicine Category</b></label>
</td>


<td width="10%">
<label for="" style="color:green"><b> Dosage</b></label>
</td>



</tr>


@foreach($medics as $item)
<tr>


<td width="10%">
<label for=""><b> {{ $item->medicine->name }}</b></label>
</td>


<td width="10%">
<label for=""><b> {{ $item->medicine->category->name }}</b></label>
</td>

<td width="10%">
<label for=""><b> {{ $item->dosage}}</b></label>
</td>


</tr>
@endforeach

</tbody>

</table>



</div>



</div>
</div>




















<br><br>




</div>
</section>


@endsection

