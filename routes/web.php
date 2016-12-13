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

/* clean out database completely - need to rerun all migrations and seeds */
/* if(App::environment('local')) {

    Route::get('/dropDatabase', function() {

        DB::statement('DROP database credential_manager');
        DB::statement('CREATE database credential_manager');

        return 'Dropped credential_manager; created credential_manager.';
    });

};

/* Debugger */
	Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(config('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';

    /*
    The following line will output your MySQL credentials.
    Uncomment it only if you're having a hard time connecting to the database and you
    need to confirm your credentials.
    When you're done debugging, comment it back out so you don't accidentally leave it
    running on your live server, making your credentials public.
    */
    //print_r(config('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    }
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});


/* Homepage */
Route::get('/', 'UserCredentialController@index')->name('credential.index');

/* Route::get('/example', 'UserCredentialController@example')->name('credential.example');

/* Show all credentials for hospital */
Route::get('/user-credentials/{userid}', 'UserCredentialController@showCredentialList')->name('userCredential.showCredentialList');

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

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/logout','Auth\LoginController@logout')->name('logout');
