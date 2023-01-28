@extends('admins.layouts.appuser')
@section('admin_content')
<div class="pagetitle p-4 shadow bg-light">
    <div class="pagetitle bg-light">
        <nav>
           <ol class="breadcrumb p-3 ">
              <li class="breadcrumb-item font-weight-bold"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item">All Rooms</li>
           </ol>
        </nav>
     </div>
                     <ul class="nav nav-tabs pb-4 align-items-end  card-header-tabs bg-light w-100">
                        <li class="nav-item border-none">
                           <a class="nav-link  bg-light" href="{{ url('admin/createroom') }}"><i class=" fas fa-plus"></i>Add Room</a>
                         </li>
                        <li class="nav-item">
                          <a class="nav-link active disabled" href=""><i class="fa fa-list mr-2"></i>All Rooms</a>
                        </li>
                     </ul>                 
                          <table  class="table table-hover"  >
                        <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Room Type</th>
                                    <th class="text-center">Department</th>
                                    <th class="text-center">Available</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                        </thead>
                        <tbody>
                            @foreach ($rooms as $room)
                                                    

                                <tr>
                                    <td class="text-center">{{ $room->id }}</td>
                                    <td class="text-center">{{ $room->roomtype}}</td>
                                    <td class="text-center">{{ $room->department->name}}</td>
                                    @if($room->available==0)
                                    <td class="text-center"><a href="{{ url('admin/activeroom/'.$room->id) }}" class=" text-white btn btn-sm bg-danger ">not availble</a></td>
                                    @endif
                                    @if($room->available==1)
                                    <td class="text-center"><a href="{{ url('admin/inactiveroom/'.$room->id) }}" class=" text-white btn btn-sm bg-success ">Availble</a></td>
                                    @endif

                                    <td class="text-center">
                                        <a href="{{ url('admin/editroom/'.$room->id) }}" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>

                                        <a href="{{ url('admin/deleteroom/'.$room->id) }}" onclick="return confirm('{{ __('Are You Sure To Delete Department ?')  }}')" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                         
                                @endforeach
                            </tbody>
                    </table>
</div>
                    @endsection