@extends('admins.layouts.appuser')
@section('admin_content')
<div class="pagetitle p-4 shadow bg-light">

    <div class="pagetitle bg-light">
        <nav>
           <ol class="breadcrumb p-3 ">
              <li class="breadcrumb-item font-weight-bold"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item">Add HOD</li>
           </ol>
        </nav>
     </div>
<div class="col-md-6" >
        
<div class="text-info" wire:loading>Loading..</div>
<form accept-charset="utf-8" class=" rounded p-3" action="{{ url('admin/storehod') }}" method="POST">
    @csrf
    <ul class="nav nav-tabs align-items-end  w-100">
        <li class="nav-item border-none">
           <a class="nav-link active bg-light disabled" href=""><i class=" fas fa-plus"></i>Add HOD</a>
         </li>
        <li class="nav-item">
          <a class="nav-link " href="{{ url('admin/allhod') }}"><i class="fa fa-list mr-2"></i>All HOD</a>
        </li>
       </ul>
<div class="form-group pt-4">
    <label for="hod">Choose Doctor</label>
    <select name="hod" wire:model.lazy="doctor" class="form-control"  >
        @forelse ($doctors as $doctor)
            <option  value="{{ $doctor->id }}">{{ $doctor->name }}</option>
        @empty
        <option value="" class="text-red">{{ __("No Doctor Found!") }}</option>
        @endforelse
    </select>
    @error('doctor') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
</div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="ADD">
    </div>
</form>
</div>
</div>
@endsection