<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Laravel</title>
    @notifyCss

    <link href="http://127.0.0.1:8000/assets/vendor/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="http://127.0.0.1:8000/assets/vendor/fontawesome/css/solid.min.css" rel="stylesheet">
    <link href="http://127.0.0.1:8000/assets/vendor/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="http://127.0.0.1:8000/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://127.0.0.1:8000/assets/css/master.css" rel="stylesheet">
    {{-- <link href="http://127.0.0.1:8000/assets/vendor/chartsjs/Chart.min.css" rel="stylesheet"> --}}
    <link href="http://127.0.0.1:8000/assets/vendor/flagiconcss/css/flag-icon.min.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @livewireStyles
</head>

<body class="clinic_version">

    <div class="wrapper ">
        <nav id="sidebar" class="  mt-4">
            <ul class="mt-5 list-unstyled components text-secondary">
                {{-- @auth --}}
                <li class=" bg-primary text-white">
                    <a href="{{ url('admin/maindashboards')}}"><i class=" fas fa-book-medical  "></i> Dashboard</a>
                </li> 
                <li class=" bg-light text-dark">
                    <a href="{{ url('/') }}"><i class=" fas fa-home"></i> Go To Website</a>
                </li>
                <li>
                    <a href="#authmenu" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle no-caret-down"><i class="fas fa-user-shield"></i> User Managements</a>
                    <ul class="collapse list-unstyled" id="authmenu">
                        <li>
                            <a href="{{ url('admin/adduser') }}"><i class="fas fa-lock"></i> Add User</a>
                        </li>

                        <li>
                            <a href="{{ url('admin/allusers') }}"><i class="fas fa-user-lock"></i> All Users</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#nurse" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle no-caret-down"><i class="fas fa-user-shield"></i> Nurses Managements</a>
                    <ul class="collapse list-unstyled" id="nurse">
                        <li>
                            <a href="{{ url('admin/createnurse') }}"><i class="fas fa-lock"></i> Add Nurse</a>
                        </li>

                        <li>
                            <a href="{{ url('admin/allnurse') }}"><i class="fas fa-user-lock"></i> All Nurses</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#doctor" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle no-caret-down"><i class="fas fa-user-shield"></i> Doctors Managements</a>
                    <ul class="collapse list-unstyled" id="doctor">
                        <li>
                            <a href="{{ url('admin/createdoctor') }}"><i class="fas fa-lock"></i> Add Doctor</a>
                        </li>

                        <li>
                            <a href="{{ url('admin/alldoctors') }}"><i class="fas fa-user-lock"></i> All Doctors</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#patients" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle no-caret-down"><i class="fas fa-user-shield"></i> Patients Managements</a>
                    <ul class="collapse list-unstyled" id="patients">
                        <li>
                            <a href="{{ url('admin/create_patient') }}"><i class="fas fa-lock"></i> Add Patient</a>
                        </li>

                        <li>
                            <a href="{{ url('admin/allpatients') }}"><i class="fas fa-user-lock"></i> All Patient</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#auto" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle no-caret-down"><i class="fas fa-user-shield"></i> HOD Managements</a>
                    <ul class="collapse list-unstyled" id="auto">
                        <li>
                            <a href="{{ url('admin/addhod') }}"><i class="fas fa-lock"></i> Add HOD</a>
                        </li>

                        <li>
                            <a href="{{ url('admin/allhod') }}"><i class="fas fa-user-lock"></i> All HOD</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#operations" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle no-caret-down"><i class="fas fa-user-shield"></i> Operation Reports</a>
                    <ul class="collapse list-unstyled" id="operations">
                        <li>
                            <a href="{{ url('admin/createoperations') }}"><i class="fas fa-lock"></i> Add Operation</a>
                        </li>

                        <li>
                            <a href="{{ url('admin/alloperations') }}"><i class="fas fa-user-lock"></i> All Operations</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#birth" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle no-caret-down"><i class="fas fa-user-shield"></i> Birth Report</a>
                    <ul class="collapse list-unstyled" id="birth">
                        <li>
                            <a href="{{ url('admin/createbirth') }}"><i class="fas fa-lock"></i> Add Birth Report</a>
                        </li>

                        <li>
                            <a href="{{ url('admin/allbirth') }}"><i class="fas fa-user-lock"></i> All Birth Reports</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#block" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle no-caret-down"><i class="fas fa-user-shield"></i> Block Managements</a>
                    <ul class="collapse list-unstyled" id="block">
                        <li>
                            <a href="{{ url('admin/addblock') }}"><i class="fas fa-lock"></i> Add Block</a>
                        </li>

                        <li>
                            <a href="{{ url('admin/allblock') }}"><i class="fas fa-user-lock"></i> All Blocks</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#rooms" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle no-caret-down"><i class="fas fa-user-shield"></i> Rooms Managements</a>
                    <ul class="collapse list-unstyled" id="rooms">
                        <li>
                            <a href="{{ url('admin/createroom') }}"><i class="fas fa-lock"></i> Add Room</a>
                        </li>

                        <li>
                            <a href="{{ url('admin/allrooms') }}"><i class="fas fa-user-lock"></i> All Rooms</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#bill" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle no-caret-down"><i class="fas fa-user-shield"></i> Bill Managements</a>
                    <ul class="collapse list-unstyled" id="bill">
                        <li>
                            <a href="{{ url('admin/createbill') }}"><i class="fas fa-lock"></i> Add Bill</a>
                        </li>

                        <li>
                            <a href="{{ url('admin/allbills') }}"><i class="fas fa-user-lock"></i> All Bills</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#bed" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle no-caret-down"><i class="fas fa-user-shield"></i> Bed Managements</a>
                    <ul class="collapse list-unstyled" id="bed">
                        <li>
                            <a href="{{ url('admin/createbed') }}"><i class="fas fa-lock"></i> Add Bed</a>
                        </li>

                        <li>
                            <a href="{{ url('admin/allbeds') }}"><i class="fas fa-user-lock"></i> All Beds</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#medicine" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle no-caret-down"><i class="fas fa-book-medical  "></i>Medicines Managements</a>
                    <ul class="collapse list-unstyled" id="medicine">
                        <li>
                            <a href="{{ url('admin/createmedicine') }}"><i class="fas fa-lock"></i> Add Medicine</a>
                        </li>

                        <li>
                            <a href="{{ url('admin/allmedicine') }}"><i class="fas fa-user-lock"></i> All Medicines</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#employee" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle no-caret-down"><i class="fas fa-temperature-low "></i>Employees Managements</a>
                    <ul class="collapse list-unstyled" id="employee">
                        <li>
                            <a href="{{ url('admin/createemployee') }}"><i class="fas fa-lock"></i> Add Employee</a>
                        </li>

                        <li>
                            <a href="{{ url('admin/allemployee') }}"><i class="fas fa-user-lock"></i> All Employees</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#department" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle no-caret-down"><i class="fas fa-address-card"></i>Departments </a>
                    <ul class="collapse list-unstyled" id="department">
                        <li>
                            <a href="{{ url('admin/createdepartment') }}"><i class="fas fa-lock"></i> Add Department</a>
                        </li>

                        <li>
                            <a href="{{ url('admin/alldepartment') }}"><i class="fas fa-user-lock"></i> All Departments</a>
                        </li>
                    </ul>
                </li>
                
                <li>
                    <a href=""><i class="fas fa-file-alt"></i>Appointment
                        Requests</a>
                </li>
             
                <li>
                    <a href="{{ url('admin/sub_scriber') }}"><i class="fas fa-file-alt"></i>Subscribers</a>
                </li>
                <li>
                    <a href="{{ url('admin/allcontact_us') }}"><i class="fas fa-file-alt"></i>Contacted Messages</a>
                </li>
                <li>
                    <a href="#authmenu" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle no-caret-down"><i class="fas fa-user-shield"></i> Authentication</a>
                    <ul class="collapse list-unstyled" id="authmenu">
                        <li>
                            <a href="{{ url('admin/admin_password') }}"><i class="fas fa-lock"></i> Change Your Password</a>
                        </li>

                        <li>
                            <a href="forgot-password.html"><i class="fas fa-user-lock"></i> Forgot password</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ url('admin/general_settings') }}"><i class="fas fa-cog"></i>Settings</a>
                </li>
                {{-- @endauth --}}
                {{-- @guest --}}
              
                {{-- @endguest --}}

            </ul>
        </nav>

        <div id="body" class="active">
            <nav class="navbar navbar-expand-lg fixed-top navbar-white bg-white shadow-sm  ">
                <button type="button" id="sidebarCollapse" class="btn btn-light"><i
                        class="fas fa-bars"></i><span></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        
                        <li class="nav-item dropdown">
                            <div class="nav-dropdown">
                                <a href="" class="nav-item nav-link dropdown-toggle text-secondary"
                                    data-toggle="dropdown"><i class="fas fa-user"></i>
                                    <span>{{ auth()->user()->name ?? '' }}</span> <i style="font-size: .8em;"
                                        class="fas fa-caret-down"></i></a>
                                <div class="dropdown-menu dropdown-menu-right nav-link-menu">
                                    <ul class="nav-list">
                                        <li><a href="" class="dropdown-item"><i class="fas fa-address-card"></i>
                                                Profile</a></li>
                                        <li><a href="" class="dropdown-item"><i class="fas fa-envelope"></i>
                                                Messages</a></li>
                                        <li><a href="{{ url('admin/general_settings') }}" class="dropdown-item"><i class="fas fa-cog"></i> Settings</a>
                                        </li>
                                        <div class="dropdown-divider"></div>
                                        <li><a href="{{ url('adminlogout') }}" class="dropdown-item"><i
                                                    class="fas fa-sign-out-alt"></i> Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                    @include('notify::messages')

                </div>
            </nav>

            <div class="content">
                <div class="container-fluid ">
                    <br><br><br>

                    @yield('admin_content')
                    @notifyJs
                    <script src="http://127.0.0.1:8000/js/livewire-turbolinks.js"></script>
                    <script src="http://127.0.0.1:8000/js/alpine.js"></script>
                    <script src="http://127.0.0.1:8000/assets/vendor/jquery/jquery.min.js"></script>
                    <script src="http://127.0.0.1:8000/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
                    {{-- <script src="http://127.0.0.1:8000/assets/vendor/chartsjs/Chart.min.js"></script> --}}
                    {{-- <script src="http://127.0.0.1:8000/assets/js/dashboard-charts.js"></script> --}}
                    <script src="http://127.0.0.1:8000/assets/js/script.js"></script>
</body>

</html>
