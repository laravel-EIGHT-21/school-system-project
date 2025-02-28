
@extends('admin.body.master')
@section('admin')



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>School Subjects Management</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">School Subjects </li>
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
<h3 class="card-title">School Subjects List </h3>



<a href="javascript:void(0);" style="float: right;" data-toggle="modal" data-target="#AddSubject" class="btn btn-rounded btn-success "> Add Subject</a>	


</div>






<div class="modal fade" id="AddSubject">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
    <h4 class="modal-title">Add Subject</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <form method="post" action="{{ route('store.school.subject') }}">
        @csrf
    <div class="modal-body">
    
        <div class="col-md-12">
            <div class="form-group">
            <label>Type<span style="color:red;">*</span></label>
            <input class="form-control" type="text" name="name" autocomplete="off"  required />
            @error('name') 
                 <span class="text-danger">{{ $message }}</span>
                 @enderror
            </div>
            </div> <!-- end col md 4 -->
    </div>
    <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>   
    </div>
    
    </div>
    
    </div>




<div class="card-body">
<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th width="5%">SL</th>
<th>Name</th> 
<th width="25%">Action</th>
</tr>
</thead>
<tbody>
@foreach($allData as $key => $subject )
<tr>
<td>{{ $key+1 }}</td>
<td> {{ $subject->name }}</td>				 
<td>

<a href="javascript:void(0);" class="btn btn-info" title="Edit" data-toggle="modal" data-target="#editSubject" id="{{ $subject->id }}"  onclick="subjectView(this.id)"><i class="fa fa-edit"></i></a>

</td>

</tr>
@endforeach
    
</tbody>                  
                    </table>


</div>





<div class="modal fade" id="editSubject">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
    <h4 class="modal-title">Update Subject</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <form action="{{ url('/setups/school/subject/update')}}"  method="post">
        @csrf

        <input type="hidden" name="id" id="id">
    <div class="modal-body">
    
        <div class="col-md-12">
            <div class="form-group">
            <label>Type<span style="color:red;">*</span></label>
            <input class="form-control" type="text" name="name" id="name" autocomplete="off"  required />
            @error('name') 
                 <span class="text-danger">{{ $message }}</span>
                 @enderror
            </div>
            </div> <!-- end col md 4 -->
    </div>
    <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>   
    </div>
    
    </div>
    
    </div>

</div>

</div>





</div>


</div>

</section>

                  
<script type="text/javascript">


    $.ajaxSetup({
    headers:{
    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
    })
    
    
    function subjectView(id){
    
    $.ajax({
    type: 'GET',
    url: '/setups/school/subject/edit/'+id,
    dataType: 'json',
    success:function(data){
     $('#name').val(data.subject.name);
    $('#id').val(id);
    


    
    }
    })
    
    }
    
    </script>



@endsection
