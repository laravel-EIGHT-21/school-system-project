@extends('admin.admin_master')
@section('admin')

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Total Admin Users</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Admin User Roles</li>
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
<h3 class="card-title"> Admin User Roles</h3>
<a href="{{ route('add.admin.user') }}" class="btn btn-success" style="float: right;">Add Admin User </a>
</div>

<div class="card-body">
<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
    <th>Image  </th>
    <th>Name  </th>
    <th>Email </th> 
    <th>Designation </th> 
    <th>Access </th>
    <th>Action</th>
</tr>
</thead>


<tbody>
    @foreach($adminuser as $item)
    <tr>
    <td><img src="{{ (!empty($item->profile_photo_path))? url('upload/admin_images/'.$item->profile_photo_path):url('upload/no_image.jpg') }}" id="showImagess" style="width: 50px; height: 50px;"> </td>

       <td> {{ $item->name }}  </td>
       <td>  {{ $item->email  }}  </td>
       <td>{{ $item['designation']['name'] }}  </td>
       <td>
          

         </td>
        

       <td width="15%">
       <a href="{{ route('edit.admin.user',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-eye"></i> </a>

       <a href="{{ route('delete.admin.user',$item->id) }}" class="btn btn-danger" title="Delete"  id="delete">
    <i class="fa fa-trash"></i></a>
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



<script type="text/javascript">
	$(document).ready(function(){
		$('#imagess').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
			 $('#showImagess').attr('src',e.target.result);	
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>



@endsection
