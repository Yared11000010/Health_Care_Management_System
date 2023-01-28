@extends('admins.layouts.appuser')
@section('admin_content')
<div class="pagetitle p-4 shadow bg-light">
    <div class="pagetitle bg-light">
        <nav>
           <ol class="breadcrumb p-3 ">
              <li class="breadcrumb-item font-weight-bold"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item">All Patients</li>
           </ol>
        </nav>
     </div>
                     <ul class="nav nav-tabs pb-4 align-items-end  card-header-tabs bg-light w-100">
                        <li class="nav-item border-none">
                           <a class="nav-link  bg-light" href="{{ url('admin/create_patient') }}"><i class=" fas fa-plus"></i>Add Patient</a>
                         </li>
                        <li class="nav-item">
                          <a class="nav-link active disabled" href=""><i class="fa fa-list mr-2"></i>All Patients</a>
                        </li>
                     </ul>                 
                          <table  class="table table-hover"  >
                        <thead>
                                <tr>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Age</th>
                                    <th class="text-center">Gender </th>
                                    <th class="text-center">Address</th>
                                    <th class="text-center">BloodGroup </th>
                                    <th class="text-center">Photo</th>
                                    <th class="text-center">Dated</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                        </thead>
                        <tbody>
                            @foreach ($patients as $patients)
                                                    
                      
                                <tr>
                                    <td class="text-center">{{ $patients->name }}</td>
                                    <td class="text-center">{{ $patients->email}}</td>
                                    <td class="text-center">{{ $patients->age}}</td>
                                    <td class="text-center">{{ $patients->gender}}</td>
                                    <td class="text-center">{{ $patients->address}}</td>
                                    <td class="text-center">{{ $patients->bloodgroup}}</td>
                                    <td><img src="{{ asset('/storage/patients/'.$patients->photo_path) }}" style="width: 40px; height:40px" alt=""></td>

                                    <td class="text-center">{{ $patients->created_at }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('admin/editpatient/'.$patients->id) }}" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>

                                        <a href="{{ url('admin/deletepatient/'.$patients->id) }}" onclick="return confirm('{{ __('Are You Sure for Delete a patients ?')  }}')" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                    </table>
</div>
                    @endsection