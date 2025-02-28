
@extends('admin.body.master')
@section('admin')



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-8">
<h1>User-Role Permissions Management</h1>
</div>

</div>
</div>
</section>

<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-8">

<div class="card">
<div class="card-header">
<h3 class="card-title">Permissions<span class="badge badge-pill badge-danger"> {{ count($permits) }} </span></h3>

<a href="{{ route('import.permission') }}" style="float: right;" class="btn btn-warning waves-effect waves-light">Import</a>
</div>

<div class="card-body">
<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th width="5%">SL</th>
<th scope="col">Permission Name</th>
<th scope="col">Action</th>

</tr>
</thead>

<tbody>
@foreach($permits as $key => $item)
<tr>
<td>{{ $key+1 }}</td>


<td>
{{$item->name}}

</td>
<td width="15%">

        
<a href="javascript:void(0);" class="btn btn-info" title="Edit" data-toggle="modal" data-target="#editPermission" id="{{ $item->id }}" onclick="permitView(this.id)"><i class="fa fa-edit"></i></a>


    <a href="{{route('permission.delete',$item->id)}}"class="btn btn-danger btn-sm" title="Delete" id="delete">
    <i class="fa fa-trash"></i></a>
    

</td>
</tr>
@endforeach

</tbody>


</table>
</div>

</div>

</div>


<!--Add New Blog Category-->

<div class="col-4 ">

    <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title"><b> Add New Permission</b></h3>

          
        </div>
        <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-9 col-md-offset-1">

<form method="post" action="{{route('permissions.store')}}" enctype="multipart/form-data">

        @csrf
        @method('POST')

<div class="form-group">
<label>Name</label>
<input type="text" name="name" class="form-control" > 
@error('name')
<span class="text-danger">{{$message}}</span>
@enderror
</div>

<button type="submit" class="btn btn-rounded btn-primary">Add Permission </button>

                                  </form>
                          </div>
                      </div>
                          </div>

      </div>



</div>






<div class="modal fade" id="editPermission">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
    <h4 class="modal-title">Update Class</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <form action="{{ url('/user/permission/update')}}"  method="post">
        @csrf

        <input type="hidden" name="id" id="id">
    <div class="modal-body">
    
        <div class="col-md-12">
            <div class="form-group">
            <label>Class Name<span style="color:red;">*</span></label>
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

</section>



			                   
<script type="text/javascript">


    $.ajaxSetup({
    headers:{
    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
    })
    
    
    function permitView(id){
    
    $.ajax({
    type: 'GET',
    url: '/user/permission/edit/'+id,
    dataType: 'json',
    success:function(data){
     $('#name').val(data.permit.name);
    $('#id').val(id);
    


    
    }
    })
    
    }
    
    </script>
    


@endsection
