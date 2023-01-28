@extends('admins.layouts.appuser')
@section('admin_content')
<div class="pagetitle p-4 shadow bg-light">

    <div class="pagetitle bg-light">
        <nav>
           <ol class="breadcrumb p-3 ">
              <li class="breadcrumb-item font-weight-bold"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item">Update Room</li>
           </ol>
        </nav>
     </div>
<div class="col-md-6" >
        
<div class="text-info" wire:loading>Loading..</div>
<form accept-charset="utf-8" class=" rounded p-3" action="{{ url('admin/updateroom') }}" method="POST">
    @csrf
    @method('PUT')
    <ul class="nav nav-tabs align-items-end  w-100">
        <li class="nav-item border-none">
           <a class="nav-link active bg-light disabled" href=""><i class=" fas fa-plus"></i>Update Room</a>
         </li>
        <li class="nav-item">
          <a class="nav-link " href="{{ url('admin/allrooms') }}"><i class="fa fa-list mr-2"></i>All Room</a>
        </li>
       </ul>
       <input type="hidden" name="id" value="{{ $rooms->id }}">
<div class="form-group pt-4">
    <label for="department">Choose Department</label>
    <select name="department"  class="form-control"  >
        <option  value="{{ $rooms->department_id }}">{{ $rooms->department->name }}</option>
        @forelse ($department as $department)
            <option  value="{{ $department->id }}">{{$department->name }}</option>
        @empty
        <option value="" class="text-red">{{ __("No Department Found!") }}</option>
        @endforelse
    </select>
    @error('department') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
    <div class="form-group">
        <label for="roomtype">Room Type</label>
        <input type="text" value="{{ $rooms->roomtype }}" name="roomtype"  placeholder="Enter roomtype" class="form-control"   />
        @error('roomtype') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
        </div>
     </div>
     <div class="form-group">
        <label for="available">Available</label>
        <input type="checkbox" class=" form-control " name="available"  {{ $rooms->available=='1'?'checked':'' }} id="">
     </div>

    <div class="form-group">
        <input type="submit" class="btn btn-warning" value="Update Room">
    </div>
</form>
</div>
</div>
@endsection