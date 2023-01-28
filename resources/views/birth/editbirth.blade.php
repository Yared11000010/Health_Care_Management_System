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

    <form accept-charset="utf-8" class="shadow rounded p-3" action="{{ url('admin/updatebirth') }}" method="POST">

        @csrf
@method('PUT')
        <input type="hidden" name="id" value="{{ $birth_reports->id }}">
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
                <option value="{{ $birth_reports->patient }}">{{ $birth_reports->patient }}</option>
                @forelse ($patients as $patient)
                     @if($patient->name==$birth_reports->patient)
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
                value="{{ $birth_reports->description }}" class="form-control" required cols="30"
                rows="5">{{ $birth_reports->description }}</textarea>
        </div>
        @error('details') <span class="text-red-500 text-danger text-xs">{{ $message }}</span>
        @enderror

        <div class="form-group">
            <label for="Docter">Docter</label>
            <select class="form-control" name="doctor">
                <option value="{{ $birth_reports->doctor }}">{{ $birth_reports->doctor }}</option>
                @forelse ($doctors as $doctor)
                     @if($birth_reports->doctor==$doctor->name)
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
            <input type="submit" class="btn btn-warning " value="Update Birth Reports">
        </div>
    </form>

</div>
    @endsection