@extends('admin.admin_master')
@section('admin')

@section('title')
Student Admissions Report
@endsection

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Student Admissions Report</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active"> Admissions </li>
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
<h3 class="card-title">Students Admission Report</h3>
</div>

<div class="card-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th>Name </th>
<th>Class </th>
<th>Phone </th>
<th>Email </th>
<th>Date  </th>
<th>Month </th>
<th>Status</th>
</tr>
</thead>
<tbody>
    @foreach($issued_books as $admit)
    <tr> 
       
       <td> {{ $admit->name }}  </td>
       <td>  {{ $admit['class']['name'] }}</td>
       <td> {{ $admit->phone }}  </td>
       <td> {{ $admit->email }}  </td>
	   <td>{{ $admit->date }} </td>
	   <td>{{ $admit->month }} </td>
       <td>
       @if($admit->status == 0)
     <span class="badge badge-pill badge-primary">Pending </span>
      @elseif($admit->status == 1)
      <span class="badge badge-pill badge-success">Accepted </span>
       @endif

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
