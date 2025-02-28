@extends('admin.admin_master')
@section('admin')

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>User Management</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Users </li>
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
<h3 class="card-title"> Users </h3>
<a href="{{ route('users.add') }}" class="btn btn-success" style="float: right;">Add User</a>
</div>

<div class="card-body">
<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th width="5%">SL</th>
<th>Role</th>
<th>Name</th>
<th>Email</th>
<th>Code</th>
<th width="25%">Action</th>
</tr>
</thead>
<tbody>
    @foreach($allUser as $key => $user )
    <tr>
    <td>{{ $key+1 }}</td>
<td> {{ $user->role }}</td>
<td>{{ $user->name }}</td>
<td>{{ $user->email }}</td>
<td>{{ $user->code }}</td>
    <td>
    <a href="{{ route('users.edit',$user->id) }}" class="btn btn-info">Edit</a>
    <a href="{{ route('users.delete',$user->id) }}" class="btn btn-danger" id="delete">Delete</a>

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
