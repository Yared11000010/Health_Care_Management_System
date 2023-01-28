@extends('admins.layouts.appuser')
@section('admin_content')
<div class="pagetitle p-4 shadow bg-light">

    <div class="pagetitle bg-light">
        <nav>
           <ol class="breadcrumb p-3 ">
              <li class="breadcrumb-item font-weight-bold"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item">Add Medicine</li>
           </ol>
        </nav>
     </div>
<div class="col-md-6" >
        
<div class="text-info" wire:loading>Loading..</div>
<form accept-charset="utf-8" class=" rounded p-3" action="{{ url('admin/storemedicine') }}" method="POST">
    @csrf
    <ul class="nav nav-tabs align-items-end pb-4 w-100">
        <li class="nav-item border-none">
           <a class="nav-link active bg-light disabled" href=""><i class=" fas fa-plus"></i>Add Medicine</a>
         </li>
        <li class="nav-item">
          <a class="nav-link " href="{{ url('admin/allmedicine') }}"><i class="fa fa-list mr-2"></i>All Medicines</a>
        </li>
       </ul>
   
       <div class="form-group">
        <label for="medicine_name">Medicine_name</label>
        <input type="text"  name="medicine_name"  placeholder="Enter medicine_name" class="form-control"   />
        @error('medicine_name') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="expiry_date">Expiry_date</label>
            <input type="date" name="expiry_date"  placeholder="Enter expiry_date" class="form-control"   />
            @error('expiry_date') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
            </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price"  placeholder="Enter price" class="form-control"   />
            @error('price') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity"  placeholder="Enter quantity" class="form-control"   />
            @error('quantity') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="code">Code</label>
            <input type="number" name="code"  placeholder="Enter code" class="form-control"   />
            @error('code') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
        </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Add Medicine">
    </div>
</form>
</div>
</div>
@endsection