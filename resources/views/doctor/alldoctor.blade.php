@extends('admins.layouts.appuser')
@section('admin_content')
<div class="pagetitle p-4 shadow bg-light">
    <div class="pagetitle bg-light">
        <nav>
           <ol class="breadcrumb p-3 ">
              <li class="breadcrumb-item font-weight-bold"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item">All Doctors</li>
           </ol>
        </nav>
     </div>
                     <ul class="nav nav-tabs pb-4 align-items-end  card-header-tabs bg-light w-100">
                        <li class="nav-item border-none">
                           <a class="nav-link  bg-light" href="{{ url('admin/createdoctor') }}"><i class=" fas fa-plus"></i>Add Doctor</a>
                         </li>
                        <li class="nav-item">
                          <a class="nav-link active disabled" href=""><i class="fa fa-list mr-2"></i>All Doctors</a>
                        </li>
                     </ul>                 
                          <table  class="table table-hover"  >
                        <thead>
                                <tr>
                                    <th class="text-center">Doctor ID</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Image</th>
                                    <th class="text-center">Email </th>
                                    <th class="text-center">Address</th>
                                    <th class="text-center">Phone </th>
                                    <th class="text-center">Specialization</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                        </thead>
                        <tbody>
                            @foreach ($doctors as $doctor)
                                                    
                      
                                <tr>
                                    <td class="text-center">{{ $doctor->id }}</td>
                                    <td class="text-center">{{ $doctor->name}}</td>
                                    <td><img src="{{ asset('/storage/doctors/'.$doctor->photo_path) }}" style="width: 50px; height:50px" alt=""></td>

                                    <td class="text-center">{{ $doctor->email}}</td>
                                    <td class="text-center">{{ $doctor->address}}</td>
                                    <td class="text-center">{{ $doctor->phone}}</td>
                                    @if(!empty($doctor->specialization ))
                                    
                                        <td class="text-center" > <a href="" class=" disabled btn btn-sm btn-secondary" > {{ $doctor->specialization }}</a></td>

                                    @endif 
                                    <td class="text-center">
                                        <a href="{{ url('admin/editdoctor/'.$doctor->id) }}" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>

                                        <a href="{{ url('admin/deletedoctor/'.$doctor->id) }}" onclick="return confirm('{{ __('Are You Sure for Delete a Doctor ?')  }}')" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                    </table>
</div>
                    @endsection