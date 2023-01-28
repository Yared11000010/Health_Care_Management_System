@extends('admins.layouts.appuser')
@section('admin_content')
<div class="pagetitle p-4 shadow bg-light">

    <div class="pagetitle bg-light">
        <nav>
           <ol class="breadcrumb p-3 ">
              <li class="breadcrumb-item font-weight-bold"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item">Add Bill</li>
           </ol>
        </nav>
     </div>
<div class="col-md-6" >
        
<div class="text-info" wire:loading>Loading..</div>
<form accept-charset="utf-8" class=" rounded p-3" action="{{ url('admin/updatebill') }}" method="POST">
    @csrf
    @method('PUT')
    <ul class="nav nav-tabs align-items-end  w-100">
        <li class="nav-item border-none">
           <a class="nav-link active bg-light disabled" href=""><i class=" fas fa-plus"></i>Add Bill</a>
         </li>
        <li class="nav-item">
          <a class="nav-link " href="{{ url('admin/allbills') }}"><i class="fa fa-list mr-2"></i>All Bill</a>
        </li>
       </ul>
<div class="form-group pt-4">
    <input type="hidden" name="id" value="{{ $bills->id }}">
    <label for="patients_id">Choose Patient</label>
    <select name="patients_id"  class="form-control"  >
        <option  value="{{ $bills->patients_id}}">{{ $bills->patient->name }}</option>
        @forelse ($patient as $patient)
            <option  value="{{ $patient->id }}">{{ $patient->name }}</option>
        @empty
        <option value="" class="text-red">{{ __("No patients Found!") }}</option>
        @endforelse
    </select>
    @error('patients_id') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
    <div class="form-group">
        <label for="amount">Amount</label>
        <input type="text" value="{{ $bills->amount }}"  name="amount"  placeholder="Enter amount" class="form-control"   />
        @error('amount') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
        </div>
     </div>
     <div class="form-group">
        <label for="payed">payed</label>
        <input type="checkbox" class=" form-control "  {{ $bills->payed=='1'?'checked':'' }} name="payed" id="">
     </div>

    <div class="form-group">
        <input type="submit" class="btn btn-warning" value="Update Bill">
    </div>
</form>
</div>
</div>
@endsection