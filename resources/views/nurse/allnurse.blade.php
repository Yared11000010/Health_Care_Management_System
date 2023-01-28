@extends('admins.layouts.appuser')
@section('admin_content')
<div class="pagetitle p-4 shadow bg-light">
    <div class="pagetitle bg-light">
        <nav>
           <ol class="breadcrumb p-3 ">
              <li class="breadcrumb-item font-weight-bold"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item">All Nurses</li>
           </ol>
        </nav>
     </div>
                     <ul class="nav nav-tabs pb-4 align-items-end  card-header-tabs bg-light w-100">
                        <li class="nav-item border-none">
                           <a class="nav-link  bg-light" href="{{ url('admin/createnurse') }}"><i class=" fas fa-plus"></i>Add Nurse</a>
                         </li>
                        <li class="nav-item">
                          <a class="nav-link active disabled" href=""><i class="fa fa-list mr-2"></i>All Nurses</a>
                        </li>
                     </ul>                 
                          <table  class="table table-hover"  >
                        <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Image</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Phone</th>
                                    <th class="text-center">Address</th>
                                    <th class="text-center">Qualification</th>
                                    <th class="text-center">Position</th>
                                    <th class="text-center">Registered</th>

                                    <th class="text-center">Actions</th>
                                </tr>
                        </thead>
                        <tbody>
                            @foreach ($nurse as $nurse)
                                <tr>
                                    <td class="text-center">{{ $nurse->id }}</td>
                                    <td class="text-center">{{ $nurse->name}}</td>
                                    <td><img src="{{ asset('/storage/nurse/'.$nurse->photo_path) }}" style="width: 40px; height:40px" alt=""></td>
                                    <td class="text-center">{{ $nurse->email}}</td>
                                    <td class="text-center">{{ $nurse->phone}}</td>
                                    <td class="text-center">{{ $nurse->address}}</td>
                                    <td class="text-center">{{ $nurse->qualification}}</td>
                                    <td class="text-center">{{ $nurse->position}}</td>
                                    <td class="text-center">
                                        @if($nurse->registered=="1")
                                        <a href="{{ url('admin/inactivenurse/'.$nurse->id) }}" class="btn btn-sm text-white bg-success ">Yes</a>
                                        @elseif ($nurse->registered=='0')
                                        <a href="{{ url('admin/activenurse/'.$nurse->id) }}" class="btn btn-sm text-white bg-danger">No</a>
                                        @endif
                                    
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ url('admin/editnurse/'.$nurse->id) }}" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                                        <a href="{{ url('admin/deletenurse/'.$nurse->id) }}" onclick="return confirm('{{ __('Are You Sure To Delete nurse ?')  }}')" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
</div>
                    @endsection