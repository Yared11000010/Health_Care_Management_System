@extends('admins.layouts.appuser')
@section('admin_content')
<div class="pagetitle p-4 shadow bg-light">

<div class="pagetitle bg-light">
    <nav>
       <ol class="breadcrumb p-3 ">
          <li class="breadcrumb-item font-weight-bold"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Update Nurse</li>
       </ol>
    </nav>
 </div>
<div class="col-md-6" >
<form accept-charset="utf-8" class="shadow rounded p-3" action="{{ url('admin/updatenurse') }}" enctype="multipart/form-data"  method="POST" >
    @csrf
    @method('PUT')
    <ul class="nav nav-tabs pb-4 align-items-end  w-100">
        <li class="nav-item border-none">
           <a class="nav-link active bg-light" href=""><i class=" fas fa-plus"></i>Update nurse</a>
         </li>
        <li class="nav-item">
          <a class="nav-link " href="{{ url('admin/allnurse') }}"><i class="fa fa-list mr-2"></i>All Nurses</a>
        </li>
       </ul>        <div class="form-group">
        <label for="Name">Name</label>
        <input type="text" name="name" value="{{ $nurse->name }}" placeholder="Enter Name" class="form-control"   />
        @error('name') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
    </div>
    <input type="hidden" name="id" value="{{ $nurse->id }}">
    <div class="form-group">
        <label for="image" class="form-label">Nurse Image</label>
         <input type="file" class="form-control" name="image">
         @error('image')
         <small class=" text-danger">{{ $message }}</small>
         @enderror
         <div class="pt-3 pl-3">
            <div class="row">
              <img src="{{ asset('/storage/nurse/'.$nurse->photo_path) }}" style="width:80px; height:50px" class=" rounded" alt="">
            </div>                     
         </div>
     </div>
    <div class="form-group">
        <label for="Email">Email</label>
        <input type="Email"  name="email" value="{{ $nurse->email }}"  placeholder="Enter Email" class="form-control"   />
        @error('email') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="Phone">Phone</label>
        <input type="number" min="0"  value="{{ $nurse->phone }}"  name="phone" placeholder="Enter Phone" class="form-control"   />
        @error('phone') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="Address">Address</label>
        <input type="text"  name="address" value="{{ $nurse->address }}" placeholder="Enter Address" class="form-control"   />
        @error('address') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        <label for="gender">Gender</label>
        <select  name="gender" class="form-control"  >
            <option @if(!empty($nurse['gender'])&&$nurse['gender']=="Male")
            selected="" @endif value="Male" class="text-red">{{ __("Male") }}</option>
            <option  @if(!empty($nurse['gender'])&&$nurse['gender']=="Female")
            selected="" @endif value="Female" class="text-red">{{ __("Female") }}</option>
        </select>
        @error('gender') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="qualification">qualification</label>
        <input type="text"  name="qualification" value="{{ $nurse->qualification }}"  placeholder="Enter a qualification" class="form-control"   />
        @error('qualification') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="position">position</label>
        <input type="text" min="0" name="position" value="{{ $nurse->position }}" placeholder="Enter a position" class="form-control"   />
        @error('position') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="registered">registered</label>
        <input type="checkbox" class=" form-control" {{ $nurse->registered=='1'?'checked':'' }} name="registered" id="">
     </div>
        <div class="form-group">
            <input type="submit" class="btn btn-warning" value="Update Nurse">
        </div>
    </form>
</div>
@endsection