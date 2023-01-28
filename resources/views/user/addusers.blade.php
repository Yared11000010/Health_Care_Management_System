@extends('admins.layouts.appuser')
@section('admin_content')
<div class="pagetitle p-4 shadow bg-light">

<div class="pagetitle bg-light">
    <nav>
       <ol class="breadcrumb p-3 ">
          <li class="breadcrumb-item font-weight-bold"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Add Users</li>
       </ol>
    </nav>
 </div>
<div class="col-md-6" >
        
      <form accept-charset="utf-8" class=" rounded p-3" action="{{ url('admin/store') }}"  method="POST">
        @csrf
                     <ul class="nav nav-tabs pb-4 align-items-end card-header-tabs w-100">
                        <li class="nav-item border-none">
                           <a class="nav-link active bg-light" href=""><i class=" fas fa-plus"></i>Add User</a>
                         </li>
                        <li class="nav-item">
                          <a class="nav-link " href="{{ url('admin/allusers') }}"><i class="fa fa-list mr-2"></i>All Users</a>
                        </li>
                       </ul>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name"placeholder="Enter Name" class="form-control" = >
        </div>
        @error('name') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror

        <div class="form-group">
            <label for="email">Email</label>

            <input type="email" name="email" placeholder="Enter Email" value="" class="form-control"  >
        </div>
        @error('email') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password"  name="password"  placeholder="Enter Password" class="form-control"  >
        </div>
        @error('phone') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror

        <div class="form-group">
            <label for="role">User Role</label>
            <select name="role" wire:model.lazy="role" class="form-control" required>
                <option value="" selected>Choose role</option>
                    <option value="SuperAdmin">SuperAdmin</option>
                    <option value="Doctor">Doctor</option>
                    <option value="Admin">Admin</option>
                    <option value="Patient">Patient</option>

            </select>
            @error('role') <span class="text-red-500 text-danger text-xs">{{ $message }}</span>
            @enderror
          </div>
              <div class="form-group">
                <input type="submit" class="btn btn-primary " value="Add User">
            </div>
        </form>
    </div>
</div>
    
@endsection