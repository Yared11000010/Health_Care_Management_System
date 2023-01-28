@extends('admins.layouts.appuser')
@section('admin_content')
<div class="pagetitle p-4 shadow bg-light">

<div class="pagetitle bg-light">
    <nav>
       <ol class="breadcrumb p-3 ">
          <li class="breadcrumb-item font-weight-bold"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Add employee</li>
       </ol>
    </nav>
 </div>
<div class="col-md-6" >
<form accept-charset="utf-8" class="shadow rounded p-3" action="{{ url('admin/storeemployee') }}" enctype="multipart/form-data"  method="POST" >
    @csrf
    <ul class="nav nav-tabs pb-4 align-items-end  w-100">
        <li class="nav-item border-none">
           <a class="nav-link active bg-light" href=""><i class=" fas fa-plus"></i>Add employee</a>
         </li>
        <li class="nav-item">
          <a class="nav-link " href="{{ url('admin/allemployee') }}"><i class="fa fa-list mr-2"></i>All employees</a>
        </li>
       </ul>        <div class="form-group">
        <label for="Name">Name</label>
        <input type="text" name="name"  placeholder="Enter Name" class="form-control"   />
        @error('name') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="image" class="form-label">Employee Image</label>
         <input type="file" class="form-control" name="image">
         @error('image')
         <small class=" text-danger">{{ $message }}</small>
         @enderror
     </div>
    <div class="form-group">
        <label for="Email">Email</label>
        <input type="Email"  name="email"  placeholder="Enter Email" class="form-control"   />
        @error('email') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="Phone">Phone</label>
        <input type="number" min="10" max="10"  name="phone" placeholder="Enter Phone" class="form-control"   />
        @error('phone') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="Address">Address</label>
        <input type="text"  name="address"  placeholder="Enter Address" class="form-control"   />
        @error('address') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        <label for="gender">Gender</label>
        <select  name="gender" class="form-control"  >
         <option value="Male" class="text-red">{{ __("Male") }}</option>
         <option value="Female" class="text-red">{{ __("Female") }}</option>
        </select>
        @error('gender') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="job">Job</label>
        <input type="number"  name="job"  placeholder="Enter a Job" class="form-control"   />
        @error('job') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="salary">salary</label>
        <input type="number" min="0" name="salary" placeholder="Enter a salary" class="form-control"   />
        @error('salary') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
    </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Add employee">
        </div>
    </form>
</div>
@endsection