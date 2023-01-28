<?php


use App\Http\Controllers\AdminController;
use App\Http\Controllers\BedController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\BirthtController;
use App\Http\Controllers\BlockController;
use App\Http\Controllers\ContactUscontroller;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\Doctorcontroller;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HODcontroller;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\NurseController;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\Subscribes;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Admins\Birthreport;
use App\Http\Livewire\Admins\Patients;
use App\Http\Livewire\Admins\Rooms;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
// Home Page Routes


// Route::get('/home', 'HomeController@index');
Auth::routes();
Route::prefix('admin')->group(function () {

//routing for HOD
            Route::get('allhod',[HODcontroller::class,'index'])->name('all_hod');
            Route::get('addhod',[HODcontroller::class,'create'])->name('create_hod');
            Route::get('deletehod/{id}',[HODcontroller::class,'delete'])->name('delete_hod');
            Route::get('edithod/{id}',[HODcontroller::class,'edit'])->name('edit_hod');
            Route::put('updatehod',[HODcontroller::class,'update'])->name('updatehod');

            Route::post('storehod',[HODcontroller::class,'store'])->name('store_hod');

            //routing for doctors
            Route::get('alldoctors',[Doctorcontroller::class,'index'])->name('all_doctors');
            Route::get('createdoctor',[Doctorcontroller::class,'create'])->name('create_doctor');
            Route::get('editdoctor/{id}',[Doctorcontroller::class,'edit'])->name('edit_doctor');
            Route::post('adddoctors',[Doctorcontroller::class,'store'])->name('store_doctor');
            Route::get('deletedoctor/{id}',[Doctorcontroller::class,'delete'])->name('delete_doctor');
            Route::put('updatedoctor',[Doctorcontroller::class,'update'])->name('update_doctor');

            //Routing for patients

            Route::get('allpatients',[PatientController::class,'index'])->name('all_patients');
            Route::get('create_patient',[PatientController::class,'create'])->name('create_patients');
            Route::post('addpatient',[PatientController::class,'store'])->name('add_patients');
            Route::get('editpatient/{id}',[PatientController::class,'edit'])->name('edit_patients');
            Route::put('updatepatient',[PatientController::class,'update'])->name('update_patients');
            Route::get('deletepatient/{id}',[PatientController::class,'delete'])->name('delete_patient');

            //Routing for operations
            Route::get('alloperations',[OperationController::class,'index'])->name('all_opreations');
            Route::get('createoperations',[OperationController::class,'create'])->name('create_operations');
            Route::post('operatonsave',[OperationController::class,'store'])->name('operation_save');
            Route::get('operation/{id}',[OperationController::class,'delete'])->name('create_operation');
            Route::get('editoperation/{id}',[OperationController::class,'edit'])->name('edit_operation');
            Route::put('updateoperation',[OperationController::class,'update'])->name('update_operation');

            //Routing for birth
            Route::get('allbirth',[BirthtController::class,'index'])->name('all_birth');
            Route::get('createbirth',[BirthtController::class,'create'])->name('createbirth');
            Route::post('birthsave',[BirthtController::class,'store'])->name('birth_save');
            Route::get('birth/{id}',[BirthtController::class,'delete'])->name('create_birth');
            Route::get('editbirth/{id}',[BirthtController::class,'edit'])->name('edit_birth');
            Route::put('updatebirth',[BirthtController::class,'update'])->name('update_birth');
            //routing for Block
            Route::get('allblock',[BlockController::class,'index'])->name('all_block');
            Route::get('addblock',[BlockController::class,'create'])->name('create_block');
            Route::get('deleteblock/{id}',[BlockController::class,'delete'])->name('delete_block');
            Route::get('editblock/{id}',[BlockController::class,'edit'])->name('edit_block');
            Route::put('updateblock',[BlockController::class,'update'])->name('updateblock');
            Route::post('storeblock',[BlockController::class,'store'])->name('store_block');
            
            
            Route::post('contact_us',[ContactUscontroller::class,'contact_us'])->name('contact_us');
            Route::get('allcontact_us',[ContactUscontroller::class,'index'])->name('allcontact_us');
            Route::get('deletecontact/{id}',[ContactUscontroller::class,'delete'])->name('delete_contact_us');


            Route::post('subscribe',[ContactUscontroller::class,'subscribe'])->name('subscribe');
            Route::get('allusers',[UserController::class,'index'])->name('allusers');
            Route::get('adduser',[UserController::class,'create'])->name('adduser');
            Route::post('store',[UserController::class,'store'])->name('store_users');
            Route::get('edit/{id}',[UserController::class,'edit'])->name('edit_user');
            Route::put('update',[UserController::class,'update'])->name('update_user');
            Route::get('delete/{id}',[UserController::class,'delete'])->name('delete_user');

            //to get maindashboard for adminpanel
            Route::get('maindashboards',[AdminController::class,'maindashboard'])->name('maindashboard');


            //routing for rooms
            Route::get('allrooms',[RoomController::class,'index'])->name('all_rooms');
            Route::get('createroom',[RoomController::class,'create'])->name('createroom'); 
            Route::get('deleteroom/{id}',[RoomController::class,'delete'])->name('deleteroom'); 
            Route::post('storerooms',[RoomController::class,'store'])->name('store_rooms');

            Route::get('editroom/{id}',[RoomController::class,'edit'])->name('edit_room');
            Route::put('updateroom',[RoomController::class,'update'])->name('update_room');

            //acitve and inactive rooms
            Route::get('activeroom/{id}',[RoomController::class,'active'])->name('active_room');
            Route::get('inactiveroom/{id}',[RoomController::class,'inactive'])->name('inactive_room');

            //routing for bill
            Route::get('allbills',[BillController::class,'index'])->name('all_bills');
            Route::get('createbill',[BillController::class,'create'])->name('createbill'); 
            Route::get('deletebill/{id}',[BillController::class,'delete'])->name('deletebill'); 
            Route::post('storebill',[BillController::class,'store'])->name('store_bill');
            
            Route::get('editbill/{id}',[BillController::class,'edit'])->name('edit_bill');
            Route::put('updatebill',[BillController::class,'update'])->name('update_bill');
            
            //acitve and inactive rooms
            Route::get('activepayed/{id}',[BillController::class,'active'])->name('active_payed');
            Route::get('inactivepayed/{id}',[BillController::class,'inactive'])->name('inactive_payed');

            //routing for beds
            Route::get('allbeds',[BedController::class,'index'])->name('all_beds');
            Route::get('createbed',[BedController::class,'create'])->name('createbed'); 
            Route::get('deletebed/{id}',[BedController::class,'delete'])->name('deletebed'); 
            Route::post('storebed',[BedController::class,'store'])->name('store_bed');
            
            Route::get('editbed/{id}',[BedController::class,'edit'])->name('edit_bed');
            Route::put('updatebed',[BedController::class,'update'])->name('update_bed');

            //routing for medicine
            Route::get('allmedicine',[MedicineController::class,'index'])->name('all_medicine');
            Route::get('createmedicine',[MedicineController::class,'create'])->name('createmedicine'); 
            Route::get('deletemedicine/{id}',[MedicineController::class,'delete'])->name('deletemedicine'); 
            Route::post('storemedicine',[MedicineController::class,'store'])->name('store_medicine');
            
            Route::get('editmedicine/{id}',[MedicineController::class,'edit'])->name('edit_medicine');
            Route::put('updatemedicine',[MedicineController::class,'update'])->name('update_medicine');


            //routing for employee
            Route::get('allemployee',[EmployeeController::class,'index'])->name('all_employee');
            Route::get('createemployee',[EmployeeController::class,'create'])->name('createemployee'); 
            Route::get('deleteemployee/{id}',[EmployeeController::class,'delete'])->name('deleteemployee'); 
            Route::post('storeemployee',[EmployeeController::class,'store'])->name('store_employee');
            
            Route::get('editemployee/{id}',[EmployeeController::class,'edit'])->name('edit_employee');
            Route::put('updateemployee',[EmployeeController::class,'update'])->name('update_employee');

                //routing for departments
                Route::get('alldepartment',[DepartmentController::class,'index'])->name('all_department');
                Route::get('createdepartment',[DepartmentController::class,'create'])->name('createdepartment'); 
                Route::get('deletedepartment/{id}',[DepartmentController::class,'delete'])->name('deletedepartment'); 
                Route::post('storedepartment',[DepartmentController::class,'store'])->name('store_department');
                
                Route::get('editdepartment/{id}',[DepartmentController::class,'edit'])->name('edit_department');
                Route::put('updatedepartment',[DepartmentController::class,'update'])->name('update_department');

                //routing for nurse
                Route::get('allnurse',[NurseController::class,'index'])->name('all_nurse');
                Route::get('createnurse',[NurseController::class,'create'])->name('createnurse'); 
                Route::get('deletenurse/{id}',[NurseController::class,'delete'])->name('deletenurse'); 
                Route::post('storenurse',[NurseController::class,'store'])->name('store_nurse');
                
                Route::get('editnurse/{id}',[NurseController::class,'edit'])->name('edit_nurse');
                Route::put('updatenurse',[NurseController::class,'update'])->name('update_nurse');
            //acitve and inactive nurse 
            Route::get('activenurse/{id}',[NurseController::class,'active'])->name('active_nurse');
            Route::get('inactivenurse/{id}',[NurseController::class,'inactive'])->name('inactive_nurse');


            //routing for site
            Route::get('general_settings',[SettingsController::class,'create'])->name('create_general_settings');
            Route::put('updatesettings',[SettingsController::class,'update'])->name('update_setting');

            //change password
            Route::get('admin_password',[AdminController::class,'changepassword'])->name('admin_password');
            Route::post('change_admin_password',[AdminController::class,'change_password'])->name('admin_change_password');
            Route::get('sub_scriber',[Subscribes::class,'index'])->name('all_subscriber');


});

    Route::resource('appointment', 'AppointmentController');
    Route::post('/appointment/check', 'AppointmentController@check')->name('appointment.check');
    Route::post('/appointment/update', 'AppointmentController@updateTime')->name('update');
    Route::get('patient-today', 'PrescriptionController@index')->name('patient.today');
    Route::post('prescription', 'PrescriptionController@store')->name('prescription');
    Route::get('/prescription/{userId}/{date}', 'PrescriptionController@show')->name('prescription.show');
    Route::get('/all-prescriptions', 'PrescriptionController@showAllPrescriptions')->name('all.prescriptions');



Route::get('admin_login',[AdminController::class,'loginpage'])->name('admin_login');
Route::get('adminlogout',[AdminController::class,'logout'])->name('adminlogout');
Route::post('loginadmin',[AdminController::class,'loginvalidate'])->name('login_admin');


Route::post('/book/appointment', 'FrontEndController@store')->name('book.appointment');
Route::get('/my-booking', 'FrontEndController@myBookings')->name('my.booking');
Route::get('/my-prescription', 'FrontEndController@myPrescription')->name('my.prescription');


Route::get('/',[\App\Http\Controllers\FontendController::class,'index'])->name('fontend');



//add-employee