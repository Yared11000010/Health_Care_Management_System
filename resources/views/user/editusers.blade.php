@extends('admins.layouts.appuser')
@section('admin_content')
<div class="pagetitle bg-light">
    <nav>
       <ol class="breadcrumb p-3 ">
          <li class="breadcrumb-item font-weight-bold"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Update Users</li>
       </ol>
    </nav>
 </div>
<div class=" pt-4 col-md-6" >
   
        <div class="text-info" wire:loading>Loading..</div>
      <form accept-charset="utf-8" class="shadow rounded p-3" action="{{ url('admin/update') }}"  method="POST">
        @csrf
        @method('PUT')
        <div class="text-capitalize bg-dark p-2 shadow mb-3 text-left text-lg text-light p-2 btn  " >{{ __("Update User") }}</div>
        <input type="hidden" name="id" value="{{ $users->id }}">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ $users->name }}" id="name"placeholder="Enter Name" class="form-control" = >
        </div>
        @error('name') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror

        <div class="form-group">
            <label for="email">Email</label>

            <input type="email" name="email" value="{{ $users->email }}" placeholder="Enter  Email" class="form-control"  >
        </div>
        @error('email') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror

        {{-- <div class="form-group">
            <label for="password">Password</label>
            <input type="password"  name="password" value="{{ $users->password }}"  placeholder="Enter Password" class="form-control"  >
        </div>
        @error('phone') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror --}}

        <div class="form-group">
            <label for="role">User Role</label>
            <select name="role" wire:model.lazy="role" class="form-control" required>
                <option @if(empty($users['role']))
                    selected=""
                @endif selected value="No Role">Choose role</option>
                    <option @if(!empty($users['role'])&&$users['role']=="super admin")
                    selected="" @endif value="SuperAdmin">SuperAdmin</option>
                    <option @if(!empty($users['role'])&&$users['role']=="Doctor")
                    selected="" @endif value="Doctor">Doctor</option>
                    <option @if(!empty($users['role'])&&$users['role']=="Admin")
                    selected="" @endif value="Admin">Admin</option>
                    <option @if(!empty($users['role'])&&$users['role']=="Patient")
                    selected="" @endif value="Patient">Patient</option>  
            </select>
            @error('role') <span class="text-red-500 text-danger text-xs">{{ $message }}</span>
            @enderror
          </div>
              <div class="form-group">
                <input type="submit" class="btn btn-warning rounded" value="Update User">
            </div>
        </form>
    </div>
    
@endsection