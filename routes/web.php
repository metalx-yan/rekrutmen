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

Route::resource('applicant', 'ApplicantController');

Route::get('applicant/download/{id}', 'ApplicantController@download')->name('applicant.download');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:administrator']], function() {

    Route::get('/', function () {
        return view('dashboard');
    })->name('home.admin');

    Route::get('/user/viewprofile/{id}', 'UserController@viewData')->name('viewdata.admin');

    Route::put('/user/updatedata/{id}', 'UserController@updatePassword')->name('updatedata.admin');

    Route::put('/user/resetdata/{id}', 'UserController@resetPassword')->name('resetdata.admin');

    Route::resource('user', 'UserController');

    
});

// Route::get('detailJob/{id}', 'JobVacancyController@detailJob')->name('detail.job');

Route::group(['prefix' => 'hrd', 'middleware' => ['auth', 'role:hrd']], function() {

    Route::resource('requirement', 'RequirementController');
    
    Route::resource('criteria', 'CriteriaController');
    
    
    Route::get('schedule', 'JobVacancyController@schedule')->name('schedule.job');

    Route::put('schedule/{id}', 'JobVacancyController@scheduleStore')->name('schedule.store.job');

    Route::get('/', function () {
        return view('dashboard');
    })->name('home.hrd');
    
    Route::get('/user/viewprofile/{id}', 'UserController@viewData')->name('viewdata.hrd');
    
    Route::put('/user/updatedata/{id}', 'UserController@updatePassword')->name('updatedata.hrd');
});
Route::resource('jobvacancy', 'JobVacancyController');

Route::get('/', function () {

    // $schema = Schema::getColumnListing('criterias');

    // $records = DB::table('criterias')->get();

    return view('welcome', compact('schema', 'records'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
