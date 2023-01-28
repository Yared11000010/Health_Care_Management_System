@extends('admins.layouts.appuser')
@section('admin_content')
<div class="pagetitle p-4 shadow bg-light">

<div class="pagetitle bg-light">
    <nav>
       <ol class="breadcrumb p-3 ">
          <li class="breadcrumb-item font-weight-bold"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Add Patient</li>
       </ol>
    </nav>
 </div>
<div class="col-md-6" >
<form accept-charset="utf-8" class="shadow rounded p-3" action="{{ url('admin/addpatient') }}" enctype="multipart/form-data"  method="POST" >
    @csrf
    <ul class="nav nav-tabs pb-4 align-items-end  w-100">
        <li class="nav-item border-none">
           <a class="nav-link active bg-light" href=""><i class=" fas fa-plus"></i>Add Patient</a>
         </li>
        <li class="nav-item">
          <a class="nav-link " href="{{ url('admin/allpatients') }}"><i class="fa fa-list mr-2"></i>All Patients</a>
        </li>
       </ul>        <div class="form-group">
        <label for="Name">Name</label>
        <input type="text" name="name"  placeholder="Enter Name" class="form-control"   />
        @error('name') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="Email">Email</label>
        <input type="Email"  name="email"  placeholder="Enter Email" class="form-control"   />
        @error('email') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="Phone">Phone</label>
        <input type="number" min="0"  name="phone" placeholder="Enter Phone" class="form-control"   />
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
        <label for="age">Age</label>
        <input type="number" min="1" max="130"  name="age"  placeholder="Enter age" class="form-control"   />
        @error('age') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="Blood">Blood Group</label>
        <select name="Blood" name="bloodgroup" class="form-control"  >
         <option value="Null" class="text-red">Null</option>
         <option value="A+" class="text-red">A+</option>
         <option value="A-" class="text-red">A-</option>
         <option value="B+" class="text-red">B+</option>
         <option value="B-" class="text-red">B-</option>
         <option value="AB-" class="text-red">AB-</option>
         <option value="AB+" class="text-red">AB+</option>
        </select>
        @error('bloodgroup') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
    </div>
    {{-- <div class="form-group ">
        <label class="form-check-label mr-3">
            Patient Type
            </label><br>
        <div class="form-inline">
            <div class="form-check mx-3">
                <input class="form-check-input"  type="radio" name="rad" id="rad1" value="indoor">
                <label class="form-check-label" for="rad1">
                Indoor
                </label>
            </div>
            <div class="form-check mx-3">
                <input class="form-check-input"  type="radio" name="rad" id="rad2" value="outdoor">
                <label class="form-check-label" for="rad2">
                    Outdoor
                </label>
            </div>
        </div>
    </div> --}}
    {{-- @if ($indoor) --}}
    {{-- <h1>out door is on</h1> --}}
    {{-- @endif --}}
    {{-- @if ($indoor) --}}
    <div class="form-group">
        <label for="image" class="form-label">Patient Image</label>
         <input type="file" class="form-control" name="image">
         @error('image')
         <small class=" text-danger">{{ $message }}</small>
         @enderror
     </div>
    {{-- @endif --}}

        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Add Patient">
        </div>
    </form>
</div>
@endsection