@extends('admins.layouts.appuser')
@section('admin_content')
<div class="pagetitle shadow bg-light">
    <div class="pagetitle bg-light">
        <nav>
           <ol class="breadcrumb p-3 ">
              <li class="breadcrumb-item font-weight-bold"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item">All Contact</li>
           </ol>
        </nav>
     </div>
                     </ul>                 
                          <table  class="table table-hover"  >
                        <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Name </th>
                                    <th class="text-center">Email </th>
                                    <th class="text-center">Phone</th>
                                    <th class="text-center">Message</th>
                                    <th class="text-center">Dated</th>
                                    <th class="text-center">Actions</th>

                                </tr>
                        </thead>
                        <tbody>
                            @foreach ($contact as $contact)
                                                    
                      
                                <tr>
                                    <td class="text-center">{{ $contact->id }}</td>
                                    <td class="text-center">{{ $contact->name}}</td>
                                    <td class="text-center">{{ $contact->email}}</td>
                                    <td class="text-center">{{ $contact->phone}}</td>
                                    <td class="text-center">{{ $contact->message}}</td>
                                    <td class="text-center">{{ $contact->created_at}}</td>

                                    <td class="text-center">
                                        <a href="{{ url('admin/deletecontact/'.$contact->id) }}" onclick="return confirm('{{ __('Are You Sure ?')  }}')" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                         
                                @endforeach
                            </tbody>
                    </table>
</div>
                    @endsection