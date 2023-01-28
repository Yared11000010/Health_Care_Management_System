@extends('admins.layouts.appuser')
@section('admin_content')
<div class="pagetitle p-4 shadow bg-light">

<div class="pagetitle bg-light">
    <nav>
       <ol class="breadcrumb p-3 ">
          <li class="breadcrumb-item font-weight-bold"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">General Settings</li>
       </ol>
    </nav>
 </div>
<div class="col-md-6" >
<form accept-charset="utf-8" class="shadow rounded p-3" action="{{ url('admin/updatesettings') }}" enctype="multipart/form-data"  method="POST" >
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{ $setting->id }}">
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" value="{{ $setting->title }}" name="title"  placeholder="Enter Your Site title" class="form-control"   />
    @error('title') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="description">Site Description</label>
        <textarea class=" form-control" name="description" id="" cols="30" rows="10">
{{  $setting->description}}    
    </textarea>
        @error('description') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror

    </div>
    <div class="form-group">
        <label for="logo" class="form-label">Site Logo</label>
         <input type="file" class="form-control" name="logo">
         @error('logo')
         <small class=" text-danger">{{ $message }}</small>
         @enderror
         <div class="pt-3 pl-3">
            <div class="row">
              <img src="{{ asset('/storage/setting/'.$setting->logo_path) }}" style="width:80px; height:50px" class=" rounded" alt="">
            </div>                     
         </div>
     </div>
     <div class="form-group">
        <label for="favicon" class="form-label">Site favicon</label>
         <input type="file" class="form-control" name="favicon">
         @error('favicon')
         <small class=" text-danger">{{ $message }}</small>
         @enderror
         <div class="pt-3 pl-3">
            <div class="row">
              <img src="{{ asset('/storage/setting/'.$setting->favicon_path) }}" style="width:80px; height:50px" class=" rounded" alt="">
            </div>                     
         </div>
     </div>
     <div class="form-group">
        <label for="icon" class="form-label">Site icon</label>
         <input type="file" class="form-control" name="icon">
         @error('icon')
         <small class=" text-danger">{{ $message }}</small>
         @enderror
         <div class="pt-3 pl-3">
            <div class="row">
              <img src="{{ asset('/storage/setting/'.$setting->icon_logo_path) }}" style="width:80px; height:50px" class=" rounded" alt="">
            </div>                     
         </div>
     </div>

    <div class="form-group">
        <label for="Email">Business Email</label>
        <input type="Email" value="{{ $setting->business_email }}" name="email"  placeholder="Enter Site Email" class="form-control"   />
        @error('email') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="Phone">Business Phone</label>
        <input type="number"  value="{{ $setting->business_phone }}"  name="phone" placeholder="Enter Business Phone" class="form-control"   />
        @error('phone') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="Address">Business Address</label>
        <input type="text" value="{{ $setting->address }}"  name="address"  placeholder="Enter Address" class="form-control"   />
        @error('address') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
    </div>

     <div class="form-group">
        <label for="workinghour"> Working Hour</label>
        <input type="text" value="{{ $setting->working_horse }}" class="form-control" name="workinghour" id="" placeholder="Enter Working Hour e.g 7:00am -4:00pm ">
     </div>
        <div class="form-group">
            <input type="submit" class="btn btn-warning" value="Update Settings">
        </div>
    </form>
</div>
@endsection