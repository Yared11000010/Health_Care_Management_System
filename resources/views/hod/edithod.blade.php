@extends('admins.layouts.appuser')
@section('admin_content')
<div class="pagetitle bg-light">
    <nav>
       <ol class="breadcrumb p-3 ">
          <li class="breadcrumb-item font-weight-bold"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Add Users</li>
       </ol>
    </nav>
 </div>
<div class="col-md-6" >
        
<div class="text-info" wire:loading>Loading..</div>
<form accept-charset="utf-8" class="shadow rounded p-3" action="{{ url('admin/updatehod') }}" method="POST">
    @csrf
    @method('PUT')
<div class="text-capitalize bg-dark p-2 shadow mb-3 text-center text-lg text-light rounded" >{{ __("update hod") }}</div>

<div class="form-group">
    <label for="hod">Choose Doctor</label>
    <input type="hidden" name="id" value="{{ $hod->id }}">
    <select name="hod" wire:model.lazy="doctor" class="form-control"  >
        <option  value="{{ $hod->doctor_id }}">{{ $hod->doctor->name  }}</option>
        @foreach ($doctors as $doctor)
            <option   value="{{ $doctor->id }}">{{ $doctor->name }}</option>
        @endforeach   
      </select>
    @error('hod') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> 
    @enderror
</div>

    <div class="form-group">
        <input type="submit" class="btn btn-warning " value="Update">
    </div>
</form>
</div>
@endsection