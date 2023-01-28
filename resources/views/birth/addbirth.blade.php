@extends('admins.layouts.appuser')
@section('admin_content')
<div class="pagetitle p-4 shadow bg-light">

<div class="pagetitle bg-light">
    <nav>
       <ol class="breadcrumb p-3 ">
          <li class="breadcrumb-item font-weight-bold"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Add Birth</li>
       </ol>
    </nav>
 </div>
<div class="col-md-6" >

    <form accept-charset="utf-8" class="shadow rounded p-3" action="{{ url('admin/birthsave') }}" method="POST">
        @csrf
        <ul class="nav nav-tabs pb-4 align-items-end  w-100">
            <li class="nav-item border-none">
               <a class="nav-link active bg-light" href=""><i class=" fas fa-plus"></i>Add Birth</a>
             </li>
            <li class="nav-item">
              <a class="nav-link " href="{{ url('admin/allbirth') }}"><i class="fa fa-list mr-2"></i>All Birth Reports</a>
            </li>
           </ul>    
    

        <div class="form-group">
            <label for="patient">Patient</label>
            <select  name="patient" class="form-control" required>
                <option value="" selected>Choose Patient</option>
                @forelse ($patients as $patient)
                <option value="{{ $patient->name }}">{{ $patient->name }}</option>
 
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
                placeholder="Enter operation Details" class="form-control" required cols="30"
                rows="5"></textarea>
        </div>
        @error('details') <span class="text-red-500 text-danger text-xs">{{ $message }}</span>
        @enderror

        <div class="form-group">
            <label for="Docter">Docter</label>
            <select class="form-control" name="doctor">
                <option>Choose Doctor</option>
                @forelse ($doctors as $doctor)
                    
                    <option value="{{ $doctor->name }}">{{ $doctor->name }}</option>
                @empty
                    <option value="" class="text-warning">No Doctor Found!</option>
                @endforelse
            </select>
            @error('doctor') <span class="text-red-500 text-danger text-xs">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Add Birth Report">
        </div>
    </form>

</div>
    @endsection