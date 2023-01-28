@extends('admins.layouts.appuser')
@section('admin_content')
<div class="pagetitle p-4 shadow bg-light">
    <div class="pagetitle bg-light">
        <nav>
           <ol class="breadcrumb p-3 ">
              <li class="breadcrumb-item font-weight-bold"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item">All Subscriber</li>
           </ol>
        </nav>
     </div>
                     </ul>                 
                          <table  class="table table-hover"  >
                        <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Email </th>
                                    <th class="text-center">Dated</th>
                                    <th class="text-center">Actions</th>

                                </tr>
                        </thead>
                        <tbody>
                            @foreach ($subscriber as $subscriber)
                                                    
                      
                                <tr>
                                    <td class="text-center">{{ $subscriber->id }}</td>
                                    <td class="text-center">{{ $subscriber->email}}</td>
                                    <td class="text-center">{{ $subscriber->created_at}}</td>

                                    <td class="text-center">
                                        <a href="{{ url('admin/deletecontact/'.$subscriber->id) }}" onclick="return confirm('{{ __('Are You Sure ?')  }}')" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                         
                                @endforeach
                            </tbody>
                    </table>
</div>
                    @endsection