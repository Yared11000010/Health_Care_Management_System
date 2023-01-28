@extends('admins.layouts.appuser')
@section('admin_content')
<div class="pagetitle p-4 shadow bg-light">
    <div class="pagetitle bg-light">
        <nav>
           <ol class="breadcrumb p-3 ">
              <li class="breadcrumb-item font-weight-bold"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item">All Employees</li>
           </ol>
        </nav>
     </div>
                     <ul class="nav nav-tabs pb-4 align-items-end  card-header-tabs bg-light w-100">
                        <li class="nav-item border-none">
                           <a class="nav-link  bg-light" href="{{ url('admin/createemployee') }}"><i class=" fas fa-plus"></i>Add Employee</a>
                         </li>
                        <li class="nav-item">
                          <a class="nav-link active disabled" href=""><i class="fa fa-list mr-2"></i>All employees</a>
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
                                    <th class="text-center">Gender</th>
                                    <th class="text-center">Job</th>
                                    <th class="text-center">Salary</th>

                                    <th class="text-center">Actions</th>
                                </tr>
                        </thead>
                        <tbody>
                            @foreach ($employee as $employee)
                                <tr>
                                    <td class="text-center">{{ $employee->id }}</td>
                                    <td class="text-center">{{ $employee->name}}</td>
                                    <td><img src="{{ asset('/storage/employee/'.$employee->image) }}" style="width: 40px; height:40px" alt=""></td>
                                    <td class="text-center">{{ $employee->email}}</td>
                                    <td class="text-center">{{ $employee->phone}}</td>
                                    <td class="text-center">{{ $employee->address}}</td>
                                    <td class="text-center">{{ $employee->gender}}</td>
                                    <td class="text-center">{{ $employee->job}}</td>
                                    <td class="text-center">{{ $employee->salary}}</td>
                                    <td class="text-center">
                                        <a href="{{ url('admin/editemployee/'.$employee->id) }}" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>

                                        <a href="{{ url('admin/deleteemployee/'.$employee->id) }}" onclick="return confirm('{{ __('Are You Sure To Delete employee ?')  }}')" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
</div>
                    @endsection