<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/* Homepage */
Route::get('/', 'UserCredentialController@index')->name('credential.index');

/* Show all credentials for hospital */
Route::get('/user-credentials/{userid}', 'UserCredentialController@userCredentialList')->name('userCredential.showCredentialList');

/*Adding new hospital to credential list*/
Route::get('/user-credentials/{userid}/add', 'UserCredentialController@addNewCredentialForm')->name('credential.addNewCredentialForm');
Route::post('/user-credentials/{userid}', 'UserCredentialController@addNewCredential')->name('credential.addNewCredential');

/* Edit credential status for user */
Route::get('/user-credentials/{userid}/edit', 'UserCredentialController@editUserCredentialForm')->name('credential.editUserCredentialForm');
Route::put('/user-credentials/{userid}', 'UserCredentialController@editUserCredential')->name('credential.editUserCredential');

/* Remove hospital from credential list */
Route::delete('/user-credentials/{userid}/delete', 'UserCredentialController@deleteUserCredential')->name('credential.deleteUserCredential');


/* show list of all hospital*/
Route::get('/hospitals', 'HospitalController@hospitalIndex')->name('credential.hospitalIndex');

/* show requirements for specific hospital*/
Route::get('/hospitals/view/{hospital}', 'HospitalController@hospitalRequirement')->name('credential.hospitalRequirement');

/* add new hospital to master list */
Route::get('/hospitals/add', 'HospitalController@addNewHospitalForm')->name('credential.addNewHospitalForm');
Route::post('/hospitals', 'HospitalController@addNewHospital')->name('credential.addNewHospital');

/* edit master list of hospital requirements*/
Route::get('/hospitals/edit/{hospital}', 'HospitalController@editHospitalForm')->name('credential.editHospitalForm');
Route::put('/hospitals', 'HospitalController@editHospital')->name('credential.editHospital');

/* Remove hospital from master list - this is a dangerous thing to have so perhaps we don't really want folks to do it */
Route::delete('/hospitals/delete/{hospital}', 'HospitalController@deleteHospital')->name('credential.deleteHospital');
