@extends('admins.layouts.appuser')
@section('admin_content')
<div class="pagetitle p-4 shadow bg-light">
    <div class="pagetitle bg-light">
        <nav>
           <ol class="breadcrumb p-3 ">
              <li class="breadcrumb-item font-weight-bold"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item">All Medicines</li>
           </ol>
        </nav>
     </div>
                     <ul class="nav nav-tabs pb-4 align-items-end  card-header-tabs bg-light w-100">
                        <li class="nav-item border-none">
                           <a class="nav-link  bg-light" href="{{ url('admin/createmedicine') }}"><i class=" fas fa-plus"></i>Add Medicine</a>
                         </li>
                        <li class="nav-item">
                          <a class="nav-link active disabled" href=""><i class="fa fa-list mr-2"></i>All Medicines</a>
                        </li>
                     </ul>                 
                          <table  class="table table-hover"  >
                        <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Expiry Date</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Code</th>
                                    <th class="text-center">Dated</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                        </thead>
                        <tbody>
                            @foreach ($medicine as $medicine)
                                <tr>
                                    <td class="text-center">{{ $medicine->id }}</td>
                                    <td class="text-center">{{ $medicine->medicine_name}}</td>
                                    <td class="text-center">{{ $medicine->expiry_date}}</td>
                                    <td class="text-center">{{ $medicine->quantity}}</td>
                                    <td class="text-center">{{ $medicine->code}}</td>
                                    <td class="text-center">{{ $medicine->created_at}}</td>

                                    <td class="text-center">
                                        <a href="{{ url('admin/editmedicine/'.$medicine->id) }}" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>

                                        <a href="{{ url('admin/deletemedicine/'.$medicine->id) }}" onclick="return confirm('{{ __('Are You Sure To Delete medicine ?')  }}')" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
</div>
                    @endsection