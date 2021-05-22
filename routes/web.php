<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','Website\HomeController@home')->name('home');

Route::group(['prefix'=>'search','namespace'=>'Website'],function (){
   Route::post('/','SearchController@search')->name('search');
   Route::get('/doctorprofile/{id}','SearchController@getDoctorProfile')->name('website.doctorprofile');
   Route::get('/patientprofile/{id}','SearchController@getPatientProfile')->name('website.patientprofile');
});


Route::group(['prefix'=>'admin','namespace'=>'Auth'],function (){

    Route::get('login','AdminLoginController@getLogin')->name('admin.getlogin');
    Route::post('login','AdminLogincontroller@login')->name('admin.login');
    Route::get('logout','AdminLogincontroller@logout')->name('admin.logout')->middleware('auth:admin');
});

Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'auth:admin'],function (){

        Route::get('/dashboard','DashboardController@index')->name('admin.index');
        Route::get('/profile','DashboardController@getProfile')->name('admin.getprofile');
        Route::post('/profile','DashboardController@updateProfile')->name('admin.updateprofile');
        Route::post('/password','DashboardController@updatePassword')->name('admin.updatepassword');

    Route::group(['prefix'=>'appointment'],function (){
        Route::get('/','AppointmentController@index')->name('admin.appointment');
        Route::post('/status','AppointmentController@status')->name('admin.appointment.status');
    });

    Route::group(['prefix'=>'speciality'],function (){
        Route::get('/','SpecialityController@index')->name('admin.speciality');
        Route::post('/create','SpecialityController@create')->name('admin.speciality.create');
        Route::post('/update','SpecialityController@update')->name('admin.speciality.update');
        Route::post('/delete','SpecialityController@delete')->name('admin.speciality.delete');
    });

     Route::group(['prefix'=>'doctor'],function (){
        Route::get('/','DoctorController@index')->name('admin.doctor');
        Route::post('/status','DoctorController@status')->name('admin.doctor.status');
    });
    Route::group(['prefix'=>'patient'],function (){
        Route::get('/','PatientController@index')->name('admin.patient');
        Route::post('/status','PatientController@status')->name('admin.patient.status');
    });

    Route::group(['prefix'=>'review'],function (){
        Route::get('/','ReviewController@index')->name('admin.review');
        Route::post('/delete','ReviewController@delete')->name('admin.review.delete');
    });

});


Route::group(['prefix'=>'doctor','namespace'=>'Auth'],function (){

    Route::get('login','DoctorLoginController@getLogin')->name('doctor.getlogin');
    Route::post('login','DoctorLoginController@login')->name('doctor.login');
    Route::get('register','DoctorRegisterController@getRegister')->name('doctor.getregister');
    Route::post('register','DoctorRegisterController@register')->name('doctor.register');
    Route::get('logout','DoctorLogincontroller@logout')->name('doctor.logout')->middleware('auth:doctor');
});

Route::group(['prefix'=>'doctor','namespace'=>'Doctor','middleware'=>'auth:doctor'],function (){
    Route::get('/','DashboardController@index')->name('doctor.index');
    Route::group(['prefix'=>'dashboard'],function (){
        Route::get('/profile','DashboardController@getProfile')->name('doctor.getprofile');
        Route::post('/profile','DashboardController@updateProfile')->name('doctor.updateprofile');
        Route::get('/mypatient','DashboardController@myPatient')->name('doctor.mypatient');
        Route::get('/review','DashboardController@review')->name('doctor.review');
        Route::get('/changepassword','DashboardController@getChangePassword')->name('doctor.changepassword');
        Route::post('/changepassword','DashboardController@updatePassword')->name('doctor.updatepassword');

    });

    Route::group(['prefix'=>'appointment'],function (){
        Route::get('/','AppointmentController@index')->name('doctor.appointment');
        Route::get('/status/{id}','AppointmentController@changeStatus')->name('doctor.appointment.status');
    });


     Route::group(['prefix'=>'schedule'],function (){
        Route::get('/','ScheduleController@index')->name('doctor.schedule');
        Route::post('/add','ScheduleController@add')->name('doctor.schedule.add');
        Route::post('/edit','ScheduleController@edit')->name('doctor.schedule.edit');
        Route::post('/delete','ScheduleController@delete')->name('doctor.schedule.delete');
        Route::get('/status/{id}','ScheduleController@status')->name('doctor.schedule.status');
    });

});










Route::group(['prefix'=>'patient','namespace'=>'Patient','middleware'=>'auth:web'],function (){
    Route::get('/','DashboardController@index')->name('patient.dashboard');

    Route::group(['prefix'=>'dashboard'],function (){
        Route::get('/profile','DashboardController@getProfile')->name('patient.getprofile');
        Route::post('/profile','DashboardController@updateProfile')->name('patient.updateprofile');
        Route::get('/changepassword','DashboardController@getChangePassword')->name('patient.getchangepassword');
        Route::post('/changepassword','DashboardController@updatePassword')->name('patient.updatepassword');
    });


     Route::group(['prefix'=>'favourite'],function (){

        Route::get('/','FavouriteController@index')->name('patient.favourite');
        Route::get('/add/{id}','FavouriteController@add')->name('patient.favourite.add');
    });

    Route::group(['prefix'=>'review'],function (){

        Route::post('/add','ReviewController@add')->name('patient.review.add');
        Route::post('/edit','ReviewController@edit')->name('patient.review.edit');
        Route::post('/delete','ReviewController@delete')->name('patient.review.delete');
    });


     Route::group(['prefix'=>'booking'],function (){

        Route::get('/{id}','BookingController@index')->name('patient.booking');
        Route::post('/confirm','BookingController@confirm')->name('patient.booking.confirm');
    });


});


Route::get('/test', function () {
    return view('layouts.doctor');
});

Auth::routes();
