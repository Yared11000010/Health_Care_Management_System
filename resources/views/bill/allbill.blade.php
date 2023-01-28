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
                           <a class="nav-link  bg-light" href="{{ url('admin/createbill') }}"><i class=" fas fa-plus"></i>Add Room</a>
                         </li>
                        <li class="nav-item">
                          <a class="nav-link active disabled" href=""><i class="fa fa-list mr-2"></i>All Rooms</a>
                        </li>
                     </ul>                 
                          <table  class="table table-hover"  >
                        <thead>
                                <tr>
                                    <th class="text-center">Bill ID</th>
                                    <th class="text-center">Patient</th>
                                    <th class="text-center">Bill Amount (Birr)</th>
                                    <th class="text-center">Payed</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                        </thead>
                        <tbody>
                            @foreach ($bills as $bill)
                                                    

                                <tr>
                                    <td class="text-center">{{ $bill->id }}</td>
                                    <td class="text-center">{{ $bill->patient->name}}</td>
                                    <td class="text-center">{{ $bill->amount}} &nbsp; Birr</td>
                                    @if($bill->payed==0)
                                    <td class="text-center"><a href="{{ url('admin/activepayed/'.$bill->id) }}" class=" text-white btn btn-sm bg-danger ">Not Payed</a></td>
                                    @endif
                                    @if($bill->payed==1)
                                    <td class="text-center"><a href="{{ url('admin/inactivepayed/'.$bill->id) }}" class=" text-white btn btn-sm bg-success ">Payed</a></td>
                                    @endif

                                    <td class="text-center">
                                        <a href="{{ url('admin/editbill/'.$bill->id) }}" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>

                                        <a href="{{ url('admin/deletebill/'.$bill->id) }}" onclick="return confirm('{{ __('Are You Sure To Delete Bill ?')  }}')" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                         
                                @endforeach
                            </tbody>
                    </table>
</div>
                    @endsection