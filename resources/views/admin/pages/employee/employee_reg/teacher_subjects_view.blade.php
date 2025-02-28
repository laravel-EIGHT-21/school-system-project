
@extends('admin.body.master')
@section('admin')



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>All Teachers` Subjects Information</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Teachers` Subjects Details </li>
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
<h3 class="card-title">Teachers` Subjects</h3>

</div>



<div class="card-body">

<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
  <th>Teacher</th>
  <th>Subjects</th>
</tr>
</thead>
<tbody>
@foreach($subjects as $key => $value )
<tr>

<td>  {{ $value['teacher']['name'] }}</td>	


<td>  {{ $value['subject']['name'] }}</td>	


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
<br><br>




                  




@endsection
