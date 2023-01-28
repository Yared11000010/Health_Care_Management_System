@extends('admins.layouts.appuser')
@section('admin_content')
<div class="pagetitle p-4 shadow bg-light">
    <div class="pagetitle bg-light">
        <nav>
           <ol class="breadcrumb p-3 ">
              <li class="breadcrumb-item font-weight-bold"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item">All Department</li>
           </ol>
        </nav>
     </div>
                     <ul class="nav nav-tabs pb-4 align-items-end  card-header-tabs bg-light w-100">
                        <li class="nav-item border-none">
                           <a class="nav-link  bg-light" href="{{ url('admin/createdepartment') }}"><i class=" fas fa-plus"></i>Add Department</a>
                         </li>
                        <li class="nav-item">
                          <a class="nav-link active disabled" href=""><i class="fa fa-list mr-2"></i>All Departments</a>
                        </li>
                     </ul>                 
                          <table  class="table table-hover"  >
                        <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Description</th>
                                    <th class="text-center">HODID</th>
                                    <th class="text-center">BlockCode</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                        </thead>
                        <tbody>
                            @foreach ($department as $department)
                                                    
                      
                                <tr>
                                    <td class="text-center">{{ $department->id }}</td>
                                    <td class="text-center">{{ $department->name}}</td>
                                    <td class="text-center">{{ $department->description}}</td>
                                    <td class="text-center">{{ $department->hod_id}}</td>
                                    <td class="text-center">{{ $department->block_id}}</td>

                                    <td class="text-center"></td>
                                    <td class="text-center">
                                        <a href="{{ url('admin/editdepartment/'.$department->id) }}" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>

                                        <a href="{{ url('admin/deletedepartment/'.$department->id) }}" onclick="return confirm('{{ __('Are You Sure ?')  }}')" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                         
                                @endforeach
                            </tbody>
                    </table>
</div>
                    @endsection