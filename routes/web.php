<?php



Route::get('/', function () {
    return redirect('/home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::middleware(['auth','admin'])->namespace('Admin')->group(function (){

//Specialty

Route::get('/specialties', 'SpecialtyController@index');
Route::get('/specialties/create', 'SpecialtyController@create');//formulario Registro
Route::get('/specialties/{specialty}/edit', 'SpecialtyController@edit');

Route::post('/specialties', 'SpecialtyController@store');// envio del form 
Route::put('/specialties/{specialty}', 'SpecialtyController@update');
Route::delete('/specialties/{specialty}', 'SpecialtyController@destroy');


//Doctors
Route::resource('doctors', 'DoctorController');
Route::resource('patients', 'PatientController');
Route::resource('edulcerias', 'EdulceriaController');
Route::resource('etaquillas', 'EtaquillaController');
Route::resource('movies', 'MovieController');
Route::resource('products', 'ProductController');
Route::resource('salas', 'SalaController');
Route::resource('shows', 'ShowController');
//Patients


});





Route::middleware(['auth','doctor'])->namespace('Doctor')->group(function (){

    
    Route::get('/schedule', 'ScheduleController@edit');
    Route::post('/schedule', 'ScheduleController@store');
    
});


Route::middleware(['auth','taquilla'])->namespace('Admin')->group(function (){

    
    Route::resource('sales', 'SaleController');
    
});


Route::middleware('auth')->group(function (){

    
Route::get('/appointments/create', 'AppointmentController@create');
Route::post('/appointments/create', 'AppointmentController@store');

//JSON

Route::get('/specialties/{specialty}/doctors','Api\SpecialtyController@doctors');
Route::get('/schedule/hours','Api\ScheduleController@hours');
});



