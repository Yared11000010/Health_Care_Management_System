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

    <form accept-charset="utf-8" class="shadow rounded p-3" action="{{ url('admin/operatonsave') }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $operations->id }}">
        <ul class="nav nav-tabs pb-4 align-items-end  w-100">
            <li class="nav-item border-none">
               <a class="nav-link active bg-light" href=""><i class=" fas fa-plus"></i>Update Opeation</a>
             </li>
            <li class="nav-item">
              <a class="nav-link " href="{{ url('admin/alloperations') }}"><i class="fa fa-list mr-2"></i>All Operations</a>
            </li>
           </ul>    
    

        <div class="form-group">
            <label for="patient">Patient</label>
            <select  name="patient" class="form-control" required>
                <option value="{{ $operations->patient }}">{{ $operations->patient }}</option>
                @forelse ($patients as $patient)
                     @if($patient->name==$operations->patient)
                        @else
                        <option value="{{ $patient->name }}">{{ $patient->name }}</option>

                     @endif 
                @empty
                    <option value="" class="text-warning">No Patient Found!</option>
                @endforelse


            </select>
            @error('patient') <span class="text-red-500 text-danger text-xs">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="Details">Details</label>
            <textarea  id="Details" name="details"
                value="{{ $operations->description }}" class="form-control" required cols="30"
                rows="5">{{ $operations->description }}</textarea>
        </div>
        @error('details') <span class="text-red-500 text-danger text-xs">{{ $message }}</span>
        @enderror

        <div class="form-group">
            <label for="Docter">Docter</label>
            <select class="form-control" name="doctor">
                <option value="{{ $operations->doctor }}">{{ $operations->doctor }}</option>
                @forelse ($doctors as $doctor)
                     @if($operations->doctor==$doctor->name)
                        @else
                        <option value="{{ $doctor->name }}">{{ $doctor->name }}</option>

                     @endif 
                @empty
                    <option value="" class="text-warning">No Doctor Found!</option>
                @endforelse
            </select>
            @error('doctor') <span class="text-red-500 text-danger text-xs">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="time">Time</label>
            <input type="time" id="time" name="time"
                placeholder="Enter operation time" value="{{ $operations->time }}" class="form-control" required />
        </div>
        @error('time') <span class="text-red-500 text-danger text-xs">{{ $message }}</span>
        @enderror
        <div class="form-group">
            <input type="submit" class="btn btn-warning " value="Update Opeation">
        </div>
    </form>

</div>
    @endsection