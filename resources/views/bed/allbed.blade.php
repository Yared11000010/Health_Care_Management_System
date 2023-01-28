@extends('admins.layouts.appuser')
@section('admin_content')
<div class="pagetitle p-4 shadow bg-light">
    <div class="pagetitle bg-light">
        <nav>
           <ol class="breadcrumb p-3 ">
              <li class="breadcrumb-item font-weight-bold"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item">All Beds</li>
           </ol>
        </nav>
     </div>
                     <ul class="nav nav-tabs pb-4 align-items-end  card-header-tabs bg-light w-100">
                        <li class="nav-item border-none">
                           <a class="nav-link  bg-light" href="{{ url('admin/createbed') }}"><i class=" fas fa-plus"></i>Add Bed</a>
                         </li>
                        <li class="nav-item">
                          <a class="nav-link active disabled" href=""><i class="fa fa-list mr-2"></i>All Beds</a>
                        </li>
                     </ul>                 
                          <table  class="table table-hover"  >
                        <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Departement</th>
                                    <th class="text-center">Patient</th>
                                    <th class="text-center">Alloted_time</th>
                                    <th class="text-center">Discharge_time</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                        </thead>
                        <tbody>
                            @foreach ($beds as $bed)
                                <tr>
                                    <td class="text-center">{{ $bed->id }}</td>
                                    <td class="text-center">{{ $bed->room->roomtype}}</td>
                                    <td class="text-center">{{ $bed->patient['name']}}</td>
                                    <td class="text-center">{{ $bed->alloted_time}}</td>
                                    <td class="text-center">{{ $bed->discharge_time}}</td>
                                    <td class="text-center">
                                        <a href="{{ url('admin/editbed/'.$bed->id) }}" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>

                                        <a href="{{ url('admin/deletebed/'.$bed->id) }}" onclick="return confirm('{{ __('Are You Sure To Delete Bed ?')  }}')" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
</div>
                    @endsection