@extends('admins.layouts.appuser')
@section('admin_content')
<div class="pagetitle p-4 shadow bg-light">

    <div class="pagetitle bg-light">
        <nav>
           <ol class="breadcrumb p-3 ">
              <li class="breadcrumb-item font-weight-bold"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item">Add Department</li>
           </ol>
        </nav>
     </div>
<div class="col-md-6" >
        
<div class="text-info" wire:loading>Loading..</div>
<form accept-charset="utf-8" class=" rounded p-3" action="{{ url('admin/storedepartment') }}" method="POST">
    @csrf
    <ul class="nav nav-tabs pb-4 align-items-end  w-100">
        <li class="nav-item border-none">
           <a class="nav-link active bg-light disabled" href=""><i class=" fas fa-plus"></i>Add Department</a>
         </li>
        <li class="nav-item">
          <a class="nav-link " href="{{ url('admin/alldepartment') }}"><i class="fa fa-list mr-2"></i>All Dpartments</a>
        </li>
       </ul>

       <div class="form-group pt-4">
        <label for="name">Department Name</label>
        <input type="text"  name="name"  placeholder="Enter Department name" class="form-control"   />
        @error('name') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text"  name="description"  placeholder="Enter description" class="form-control"   />
            @error('description') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
         </div>
         <div class="form-group">
            <label for="hod_id">Head Of Department</label>
            <select name="hod_id"  class="form-control"  >
                @forelse ($hod as $hod)
                    <option  value="{{ $hod->id }}">{{ $hod->doctor['name'] }}</option>
                @empty
                <option value="" class="text-red">{{ __("No HOD Found!") }}</option>
                @endforelse
            </select>
            @error('hod_id') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
           </div>
           <div class="form-group ">
            <label for="block_id">Block</label>
            <select name="block_id"  class="form-control"  >
                @forelse ($block as $block)
                    <option  value="{{ $block->id }}">{{ $block->blockcode }}</option>
                @empty
                <option value="" class="text-red">{{ __("No HOD Found!") }}</option>
                @endforelse
            </select>
            @error('block_id') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
           </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Add department">
    </div>
</form>
</div>
</div>
@endsection