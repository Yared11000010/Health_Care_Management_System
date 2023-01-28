@extends('admins.layouts.appuser')
@section('admin_content')
<div class="pagetitle p-4 shadow bg-light">

<div class="pagetitle bg-light">
    <nav>
       <ol class="breadcrumb p-3 ">
          <li class="breadcrumb-item font-weight-bold"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">All Users</li>
       </ol>
    </nav>
 </div>
                     <ul class="nav nav-tabs pb-4 align-items-end  card-header-tabs bg-light w-100">
                        <li class="nav-item border-none">
                           <a class="nav-link  bg-light" href="{{ url('admin/adduser') }}"><i class=" fas fa-plus"></i>Add User</a>
                         </li>
                        <li class="nav-item">
                          <a class="nav-link active disabled" href="{{ url('admin/allusers') }}"><i class="fa fa-list mr-2"></i>All Users</a>
                        </li>
                     </ul>                 
                          <table  class="table table-hover"  >
                        <thead>
                                <tr>
                                    <th class="text-center">User ID</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Email </th>
                                    <th class="text-center">Role</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                                    
                      
                                <tr>
                                    <td class="text-center">{{ $user->id }}</td>
                                    <td class="text-center">{{ $user->name}}</td>
                                    <td class="text-center">{{ $user->email}}</td>
                                    @if(empty($user->role))
                                        <td class="text-center" > <a href="" class=" disabled btn btn-sm btn-danger" >No Role</a></td>

                                        @else
                                        <td class="text-center" > <a href="" class=" disabled btn btn-sm btn-success" > {{ $user->role }}</a></td>

                                    @endif 
                                    <td class="text-center">
                                        <a href="{{ url('admin/edit/'.$user->id) }}" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>

                                        <a href="{{ url('admin/delete/'.$user->id) }}" onclick="return confirm('{{ __('Are You Sure ?')  }}')" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                         
                                @endforeach
                            </tbody>
                    </table>
</div>

                    @endsection