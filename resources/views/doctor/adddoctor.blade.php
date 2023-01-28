@extends('admins.layouts.appuser')
@section('admin_content')
<div class="pagetitle p-4 shadow bg-light">

<div class="pagetitle bg-light">
    <nav>
       <ol class="breadcrumb p-3 ">
          <li class="breadcrumb-item font-weight-bold"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Add Doctor</li>
       </ol>
    </nav>
 </div>
<div class="col-md-6" >
<form  class=" rounded p-3" action="{{ url('admin/adddoctors') }}" enctype="multipart/form-data" method="POST">
    @csrf
                     <ul class="nav nav-tabs pb-4 align-items-end  w-100">
                        <li class="nav-item border-none">
                           <a class="nav-link active bg-light" href=""><i class=" fas fa-plus"></i>Add Doctor</a>
                         </li>
                        <li class="nav-item">
                          <a class="nav-link " href="{{ url('admin/alldoctors') }}"><i class="fa fa-list mr-2"></i>All Doctors</a>
                        </li>
                       </ul>    <div class="form-group">
        <label for="Name">Name</label>
        <input type="text" name="name"  placeholder="Enter Name" class="form-control"   />
        @error('name') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="Email">Email</label>
        <input type="Email"  name="email"  placeholder="Enter Email" class="form-control"   />
        @error('emial') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
    </div>
    {{-- <div class="form-group">
        <label for="Password">Password</label>
        <input type="password"  name="password"  placeholder="{{ __('Create New Password ')}}" class="form-control"   />
        @error('password') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
    </div> --}}
    <div class="form-group">
        <label for="Address">Address</label>
        <input type="text"  name="address"  placeholder="Enter Address" class="form-control"   />
        @error('address') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="Phone">Phone</label>
        <input type="number" min="0" max="10000000000000"name="phone"  placeholder="Enter Phone" class="form-control"   />
        @error('phone') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
    </div>
      <div class="form-group">
                        <label for="Department">Departments</label>
                        <select name="department" wire:model.lazy="department" class="form-control"  >
                            @forelse ($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @empty
                            <option value="" class="text-red">{{ __("No Department Found!") }}</option>
                            @endforelse
                        </select>
                        @error('department') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
        </div>
    <div class="form-group">
        <label for="Specialization">Specialization</label>
        <input type="text"  name="specialization"  placeholder="Enter Specialization" class="form-control"   />
        @error('specialization') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
            <label for="image" class="form-label">Doctor Image</label>
             <input type="file" class="form-control" name="image">
             @error('image')
             <small class=" text-danger">{{ $message }}</small>
             @enderror
    </div>
    <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Add New Doctor">
        </div>
    </form>
</div>
    @endsection