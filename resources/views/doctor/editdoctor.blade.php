@extends('admins.layouts.appuser')
@section('admin_content')
<div class="pagetitle p-4 shadow bg-light">

<div class="pagetitle bg-light">
    <nav>
       <ol class="breadcrumb p-3 ">
          <li class="breadcrumb-item font-weight-bold"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Update Doctor</li>
       </ol>
    </nav>
 </div>
<div class="col-md-6" >
<form  class=" rounded p-3" action="{{ url('admin/updatedoctor') }}" enctype="multipart/form-data" method="POST">
    @csrf
    @method('PUT')
                     <ul class="nav nav-tabs pb-4 align-items-end  w-100">
                        <li class="nav-item border-none">
                           <a class="nav-link active bg-light" href=""><i class=" fas fa-plus"></i>Update Doctor</a>
                         </li>
                        <li class="nav-item">
                          <a class="nav-link " href="{{ url('admin/alldoctors') }}"><i class="fa fa-list mr-2"></i>All Doctors</a>
                        </li>
                       </ul>
                       <input type="hidden" value="{{ $doctors->id }}" name="id">
                            <div class="form-group">
        <label for="Name">Name</label>
        <input type="text" value="{{ $doctors->name }}" name="name"  placeholder="Enter Name" class="form-control"   />
        @error('name') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="Email">Email</label>
        <input type="Email"  name="email" value="{{ $doctors->email  }}"  placeholder="Enter Email" class="form-control"   />
        @error('emial') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
    </div>
    {{-- <div class="form-group">
        <label for="Password">Password</label>
        <input type="password"  name="password"  placeholder="{{ __('Create New Password ')}}" class="form-control"   />
        @error('password') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
    </div> --}}
    <div class="form-group">
        <label for="Address">Address</label>
        <input type="text"  name="address" value="{{ $doctors->address }}"  placeholder="Enter Address" class="form-control"   />
        @error('address') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="Phone">Phone</label>
        <input type="number" value="{{ $doctors->phone  }}" name="phone"   class="form-control"   />
        @error('phone') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
    </div>
      <div class="form-group">
                        <label for="Department">Departments</label>
                        <select name="department"  class="form-control"  >
                            <option  value="{{ $doctors->department }}">{{ $doctors->departments['name'] }}</option>
                            @foreach ($departments as $department)
                                 <option   value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach 
                          </select>
                        @error('department') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
        </div>
    <div class="form-group">
        <label for="Specialization">Specialization</label>
        <input type="text"  name="specialization" value="{{ $doctors->specialization }}" placeholder="Enter Specialization" class="form-control"   />
        @error('specialization') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
            <label for="image" class="form-label">Doctor Image</label>
             <input type="file" class="form-control" name="image">
             @error('image')
             <small class=" text-danger">{{ $message }}</small>
             @enderror
             <div class="pt-3">
                <div class="row">
                  <img src="{{ asset('/storage/doctors/'.$doctors->photo_path) }}" style="width:80px; height:50px" class=" rounded" alt="">
                </div>                     
             </div>
    </div>
    <div class="form-group">
            <input type="submit" class="btn btn-warning" value="Update Doctor">
        </div>
    </form>
</div>
    @endsection