@extends('admins.layouts.appuser')
@section('admin_content')
  <div class="row">
    <div class="col-md-4 ">
        <div class="card  p-3 shadow text-light" style="background-color: rgb(49, 125, 232)">
            <div class="inner">
                <h3>{{ $allusers }}</h3>
                <p>User</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
         </div>
    </div>
    <div class="col-md-4 ">
        <div class="card  p-3  shadow text-light" style="background-color: rgb(43, 183, 219)">
            <div class="inner">
                <h3>{{ $patients }}</h3>
                <p>Paitents</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
         </div>
    </div>
    <div class="col-md-4 ">
        <div class="card  p-3 shadow text-white" style="background-color: rgb(17, 136, 221)">
            <div class="inner">
                <h3>{{ $alldoctors }}</h3>
                <p>Doctors</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
         </div>
    </div>
    <div class="col-md-4 ">
        <div class="card  p-3  shadow text-white" style="background-color: rgb(21, 14, 32)">
            <div class="inner">
                <h3>20</h3>
                <p>Rooms</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
         </div>
    </div>
    <div class="col-md-4 ">
        <div class="card  p-3 shadow text-white" style="background-color: rgb(17, 136, 221)">
            <div class="inner">
                <h3>{{ $department }}</h3>
                <p>Departments</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
         </div>
    </div>
    <div class="col-md-4 ">
        <div class="card  p-3  shadow text-white" style="background-color: rgb(21, 14, 32)">
            <div class="inner">
                <h3>20</h3>
                <p>Appointments</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
         </div>
    </div>
  </div>
@endsection