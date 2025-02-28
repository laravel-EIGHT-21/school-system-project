@extends('admin.body.master')
@section('admin')



<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Damaged Books Returned </h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Book Details</li>
</ol>
</div>
</div>
</div>
</section>

<section class="content">
<div class="container-fluid">

<div class="row">
<div class="col-md-6 col-12">
<div class="card">
<div class="card-header">
<h3 class="card-title"><strong>Student Details</strong></h3>
</div>

<div class="card-body">
<table class="table table-striped">

<tr>
<th> Student Name : </th>
<th> {{ $issued_book->student->name }} </th>
</tr>

<tr>
<th> Student ID: </th>
<th> {{ $issued_book->student->id_no }} </th>
</tr>

<tr>
<th> Term : </th>
<th> {{ $issued_book->term}} </th>
</tr>

<tr>
<th>  Class: </th>
<th> {{ $issued_book->class}} </th>
</tr>



<tr>
<th> Section: </th>
<th> {{ $issued_book->student->day_boarding}} </th>
</tr>


    



</table>
</div>


</div>



</div>



<div class="col-md-6 col-12">
<div class="card">
<div class="card-header">
<h3 class="card-title"><strong>Issued Book Details</strong></h3>
</div>

<div class="card-body">
<table class="table table-striped">
@foreach($bookItem as $item)

<tr>
<th> Book Image : </th>
<th> <img src="{{ (!empty($item->book->image))? url('upload/book_images/'.$item->book->image):url('upload/no_image.jpg') }}" style="height: 90px; width: 80px;">  </th>
</tr>

<tr>
<th> Book Name : </th>
<th> {{ $item->book->name }} </th>
</tr>

<tr>
<th> Category: </th>
<th> {{ $item->book->category->name }} </th>
</tr>


<tr>
<th> Author: </th>
<th> {{ $item->book->author->name}} </th>
</tr>

<tr>
<th> Issued Quantity: </th> 
<th> {{ $item->issued_quantity}} </th>
</tr>
@endforeach

<tr>
<th> Not-Damaged  </th>
<th> {{ $issued_book->good_books_cond }} </th>
</tr>

<tr>
<th>Damaged   </th>
@php 

$_qty = $issued_book->issued_quantity-$issued_book->good_books_cond;

@endphp
<th> {{ $_qty }} </th>
</tr>



<tr>
<th> Issued Date : </th>
<th> {{ $issued_book->issue_date }} </th>
</tr>

<tr>
<th> Returned Date  </th>
<th> {{ $issued_book->return_date }} </th>
</tr>

<tr>
<th> Returning Day  </th>
<th> {{ $issued_book->return_day }} </th>
</tr>
 
<tr>
<th> Issue Status : </th>
<th>   
<span class="badge badge-pill badge-warning" style="background: orange;"><strong>{{ $issued_book->issue_status }} </strong></span> </th>
</tr>


<tr>
<th>  </th>
<th> 
@if($issued_book->issue_status == 'Damaged Returned')
<a href="{{ route('returned-damaged-to-returned',$issued_book->id) }}" class="btn btn-block btn-success" id="not_damaged"><b>Submit Books Not Damaged</b></a>


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




<br><br>




</div>
</section>


@endsection

