@extends('admins.layouts.appuser')
@section('admin_content')
<div class="pagetitle p-4 shadow bg-light">

    <div class="pagetitle bg-light">
        <nav>
           <ol class="breadcrumb p-3 ">
              <li class="breadcrumb-item font-weight-bold"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item">Add Block</li>
           </ol>
        </nav>
     </div>
<div class="col-md-6" >
        
<div class="text-info" wire:loading>Loading..</div>
<form accept-charset="utf-8" class=" rounded p-3" action="{{ url('admin/storeblock') }}" method="POST">
    @csrf
    <ul class="nav nav-tabs pb-4 align-items-end  w-100">
        <li class="nav-item border-none">
           <a class="nav-link active bg-light disabled" href=""><i class=" fas fa-plus"></i>Add Block</a>
         </li>
        <li class="nav-item">
          <a class="nav-link " href="{{ url('admin/allblock') }}"><i class="fa fa-list mr-2"></i>All Blocks</a>
        </li>
       </ul>

       <div class="form-group">
        <label for="blockfloor">Blockfloor</label>
        <input type="text"  name="blockfloor"  placeholder="Enter blockfloor" class="form-control"   />
        @error('blockfloor') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="blockcode">Blockcode</label>
            <input type="text"  name="blockcode"  placeholder="Enter blockcode" class="form-control"   />
            @error('blockcode') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
            </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Add Block">
    </div>
</form>
</div>
</div>
@endsection