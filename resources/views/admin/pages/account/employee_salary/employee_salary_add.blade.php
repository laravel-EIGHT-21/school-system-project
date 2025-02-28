@extends('admin.body.master')
@section('admin')
@section('title')
Employee Salary Add
@endsection


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script>


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Employee Salary Management</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Employee Salary Details </li>
</ol>
</div>
</div>
</div>
</section>


<section class="content">
<div class="container-fluid">
        
<div class="row">
<div class="col-md-12">


  <form action="{{ route('account.salary.store') }}" method="post" >
  	@csrf
<table class="table table-bordered table-striped" style="width: 100%;">
<thead>
<tr>
<th>SL</th>
 <th>Employee</th>
 <th>Title</th>
 <th> Salary</th>
 <th>Select</th>
		
</tr>

</thead>
<tbody>
@foreach($employees as $key => $employee)
		
<tr id="div{{$employee->id}}" class="text-center">
<input type="hidden" name="user_id[]" value="{{ $employee->id }}">
<td>{{ $key+1  }}</td>
<td>{{ $employee->name }}</td>
<td>{{ $employee['designation']['name'] }}</td>

@php

$salary = (float)$employee->salary;

@endphp

<td>{{ $salary}} <input type="hidden" name="amount[]" value="{{$salary}}"></td>

<td>  <input type="checkbox" name="checkmanage[]" id="{{$key}}" value="{{$key}}" checked="checked">
<label for="{{$key}}"></label>  </td>

</tr>			

@endforeach
</tbody>
</table>

<input type="submit" class="btn btn-rounded btn-info" value="Submit Employee Month Salary">


</form>


</div>
</div>
</div>

 

</section>
<br><br>

<script type="text/javascript">
  $(document).on('click','#search',function(){   
    var month = $('#month').val();

     $.ajax({
      url: "{{ route('account.salary.getemployee')}}",
      type: "get",
      data: {'month':month},
      beforeSend: function() {       
      },
      success: function (data) {
        var source = $("#document-template").html();
        var template = Handlebars.compile(source);
        var html = template(data);
        $('#DocumentResults').html(html);
        $('[data-toggle="tooltip"]').tooltip();
      }
    });
  });

</script>
 


@endsection
