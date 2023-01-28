@extends('admins.layouts.appuser')
@section('admin_content')
<div class="pagetitle p-4 shadow bg-light">

    <div class="pagetitle bg-light">
        <nav>
           <ol class="breadcrumb p-3 ">
              <li class="breadcrumb-item font-weight-bold"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item">Add bed</li>
           </ol>
        </nav>
     </div>
<div class="col-md-6" >
        
<div class="text-info" wire:loading>Loading..</div>
<form accept-charset="utf-8" class=" rounded p-3" action="{{ url('admin/updatebed') }}" method="POST">
    @csrf
    @method('PUT')
    <ul class="nav nav-tabs align-items-end  w-100">
        <li class="nav-item border-none">
           <a class="nav-link active bg-light disabled" href=""><i class=" fas fa-plus"></i>Add bed</a>
         </li>
        <li class="nav-item">
          <a class="nav-link " href="{{ url('admin/allbeds') }}"><i class="fa fa-list mr-2"></i>All bed</a>
        </li>
       </ul>
   <div class="form-group pt-4">
    <input type="hidden" name="id" value="{{ $beds->id }}">
    <label for="room">Choose room</label>
    <select name="room"  class="form-control"  >
        <option  value="{{ $beds->room_id}}">{{ $beds->room->roomtype}}</option>
        @forelse ($rooms as $room)
            <option  value="{{ $room->id }}">{{ $room->roomtype }}</option>
        @empty
        <option value="" class="text-red">{{ __("No room Found!") }}</option>
        @endforelse
    </select>
    @error('room') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
   
   <div class="form-group pt-4">
    <label for="patient">Choose Patient</label>
    <select name="patient"  class="form-control"  >
        <option  value="{{ $beds->patient_id}}">{{ $beds->patient->name}}</option>

        @forelse ($patients as $patient)
            <option  value="{{ $patient->id }}">{{ $patient->name }}</option>
        @empty
        <option value="" class="text-red">{{ __("No Patient Found!") }}</option>
        @endforelse
    </select>
    @error('patient') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
   </div>

      <div class="form-group">
        <label for="alloted_time">Alloted Time</label>
        <input type="time" name="alloted_time" value="{{ $beds->alloted_time }}" placeholder="Enter alloted_time" class="form-control"   />
        @error('alloted_time') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="discharge_time">Discharge Time</label>
            <input type="time" name="discharge_time"  value="{{ $beds->discharge_time }}" placeholder="Enter discharge_time" class="form-control"   />
            @error('discharge_time') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
            </div>
    <div class="form-group">
        <input type="submit" class="btn btn-warning" value="Update Bed">
    </div>
</form>
</div>
</div>
@endsection