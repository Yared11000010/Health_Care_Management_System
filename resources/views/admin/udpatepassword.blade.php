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
<form accept-charset="utf-8" class=" rounded p-3" action="{{ url('admin/change_admin_password') }}" method="POST">
    @csrf
<div class="form-group pt-4">
    <div class="form-group">
        <label for="old_password">Old Password</label>
        <input type="password"  name="old_password"  placeholder="Enter Old Password" class="form-control"   />
        @error('old_password') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
        </div>
     <div class="form-group">
        <label for="new_password">New Password</label>
        <input type="password"  name="new_password"  placeholder="Enter New Password" class="form-control"   />
        @error('new_password') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
        </div>

     <div class="form-group">
        <label for="amount">Confirm Password</label>
        <input type="password"  name="confirm_password"  placeholder="Enter Confirm Password" class="form-control"   />
        @error('confirm_password') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
        </div>
    
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Change Password">
    </div>
</form>
</div>
</div>
@endsection