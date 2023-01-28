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
                           <a class="nav-link  bg-light" href="{{ url('admin/createoperations') }}"><i class=" fas fa-plus"></i>Add Opeation</a>
                         </li>
                        <li class="nav-item">
                          <a class="nav-link active disabled" href=""><i class="fa fa-list mr-2"></i>All Operations</a>
                        </li>
                     </ul>                 
                          <table  class="table table-hover"  >
                        <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Patient</th>
                                    <th class="text-center">Details</th>
                                    <th class="text-center">Doctor </th>
                                    <th class="text-center">Dated</th>
                                    <th class="text-center">Create_at </th>
                                    <th class="text-center">Actions</th>
                                </tr>
                        </thead>
                        <tbody>
                            @foreach ($operations as $operation)
                                                    
                      
                                <tr>
                                    <td class="text-center">{{ $operation->id }}</td>
                                    <td class="text-center">{{ $operation->patient}}</td>
                                    <td class="text-center">{{ $operation->description}}</td>
                                    <td class="text-center">{{ $operation->doctor}}</td>
                                    <td class="text-center">{{ $operation->time}}</td>
                                    <td class="text-center">{{ $operation->created_at}}</td>
                                    
                                    
                                    <td class="text-center">
                                        <a href="{{ url('admin/editoperation/'.$operation->id) }}" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>

                                        <a href="{{ url('admin/operation/'.$operation->id) }}" onclick="return confirm('{{ __('Are You Sure for Delete a Opeations ?')  }}')" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                    </table>
</div>
                    @endsection