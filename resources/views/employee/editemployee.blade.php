@extends('admins.layouts.appuser')
@section('admin_content')
<div class="pagetitle p-4 shadow bg-light">

<div class="pagetitle bg-light">
    <nav>
       <ol class="breadcrumb p-3 ">
          <li class="breadcrumb-item font-weight-bold"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Edit Employee</li>
       </ol>
    </nav>
 </div>
<div class="col-md-6" >
<form accept-charset="utf-8" class="shadow rounded p-3" action="{{ url('admin/updateemployee') }}" enctype="multipart/form-data"  method="POST" >
    @csrf
    @method('PUT')
    <ul class="nav nav-tabs pb-4 align-items-end  w-100">
        <li class="nav-item border-none">
           <a class="nav-link active bg-light" href=""><i class=" fas fa-plus"></i>Edit Employee</a>
         </li>
        <li class="nav-item">
          <a class="nav-link " href="{{ url('admin/allemployee') }}"><i class="fa fa-list mr-2"></i>All Employees</a>
        </li>
       </ul>
       <input type="hidden" name="id" value="{{ $employee->id }}">
               <div class="form-group">
        <label for="Name">Name</label>
        <input type="text" name="name" value="{{ $employee->name }}"  placeholder="Enter Name" class="form-control"   />
        @error('name') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="image" class="form-label">Employee Image</label>
         <input type="file" class="form-control" name="image">
         @error('image')
         <small class=" text-danger">{{ $message }}</small>
         @enderror
         <div class="pt-3 pl-3">
            <div class="row">
              <img src="{{ asset('/storage/employee/'.$employee->image) }}" style="width:80px; height:50px" class=" rounded" alt="">
            </div>                     
         </div>
     </div>
    <div class="form-group">
        <label for="Email">Email</label>
        <input type="Email"  name="email" value="{{ $employee->email }}" placeholder="Enter Email" class="form-control"   />
        @error('email') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="Phone">Phone</label>
        <input type="number" min="10" max="10" value="{{ $employee->phone }}"  name="phone" placeholder="Enter Phone" class="form-control"   />
        @error('phone') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="address">address</label>
        <input type="text"  name="address" value="{{ $employee->address }}" placeholder="Enter editress" class="form-control"   />
        @error('address') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        <label for="gender">Gender</label>
        <select  name="gender" class="form-control"  >
            <option @if(!empty($employee['gender'])&&$employee['gender']=="Male")
            selected="" @endif value="Male" class="text-red">{{ __("Male") }}</option>
            <option  @if(!empty($employee['gender'])&&$employee['gender']=="Female")
            selected="" @endif value="Female" class="text-red">{{ __("Female") }}</option>
        </select>
        @error('gender') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="job">Job</label>
        <input type="number" value="{{ $employee->job }}"  name="job"  placeholder="Enter a Job" class="form-control"   />
        @error('job') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="salary">salary</label>
        <input type="number" min="0" value="{{ $employee->salary }}" name="salary" placeholder="Enter a salary" class="form-control"   />
        @error('salary') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
    </div>
        <div class="form-group">
            <input type="submit" class="btn btn-warning" value="Update Employee">
        </div>
    </form>
</div>
@endsection