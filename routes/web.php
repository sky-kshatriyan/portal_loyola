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

Route::get('/', 'welcomeController@index');
Route::post('/login', 'userController@login');
Route::get('/dashboard', 'userController@dashboard');
Route::get('/logout', 'welcomeController@logout');

Route::get('/classes', 'classesController@index');
Route::post('/classes', 'classesController@findAction');
Route::put('/classes', 'classesController@update');
Route::get('/classes/{id}/{status}', 'classesController@statusupdate');

Route::get('/sections', 'sectionsController@index');
Route::post('/sections', 'sectionsController@findAction');
Route::put('/sections', 'sectionsController@update');
Route::get('/sections/{id}/{status}', 'sectionsController@statusupdate');

Route::get('/subjects', 'subjectsController@index');
Route::post('/subjects', 'subjectsController@findAction');
Route::put('/subjects', 'subjectsController@update');
Route::get('/subjects/{id}/{status}', 'subjectsController@statusupdate');

Route::get('/occupation', 'occupationController@index');
Route::post('/occupation', 'occupationController@findAction');
Route::put('/occupation', 'occupationController@update');
Route::get('/occupation/{id}/{status}', 'occupationController@statusupdate');

Route::get('/feetypes', 'feeTypesController@index');
Route::post('/feetypes', 'feeTypesController@findAction');
Route::put('/feetypes', 'feeTypesController@update');
Route::get('/feetypes/{id}/{status}', 'feeTypesController@statusupdate');

Route::get('/stationerygroups', 'stationeryGroupsController@index');
Route::post('/stationerygroups', 'stationeryGroupsController@findAction');
Route::put('/stationerygroups', 'stationeryGroupsController@update');
Route::get('/stationerygroups/{id}/{status}', 'stationeryGroupsController@statusupdate');

Route::get('/finetypes', 'fineTypesController@index');
Route::post('/finetypes', 'fineTypesController@findAction');
Route::put('/finetypes', 'fineTypesController@update');
Route::get('/finetypes/{id}/{status}', 'fineTypesController@statusupdate');

Route::get('/stationeryinventorymaster', 'stationeryinventorymastercontroller@index');
Route::post('/stationeryinventorymaster', 'stationeryinventorymastercontroller@findAction');
Route::put('/stationeryinventorymaster', 'stationeryinventorymastercontroller@update');
Route::get('/stationeryinventorymaster/{id}/{status}', 
				'stationeryinventorymastercontroller@statusupdate');

Route::get('/stationeryinventory', 'stationeryinventorycontroller@index');
Route::post('/stationeryinventory', 'stationeryinventorycontroller@findAction');
Route::put('/stationeryinventory', 'stationeryinventorycontroller@update');
Route::get('/stationeryinventory/{id}/{status}', 
				'stationeryinventorycontroller@statusupdate');

Route::get('/staff', 'staffController@index')->name('staffer');
Route::post('/staff', 'staffController@findAction');
Route::put('/staff', 'staffController@update');
Route::get('/staff/{id}/{status}', 'staffController@statusupdate');

Route::get('/caste', 'casteController@index');
Route::post('/caste', 'casteController@findAction');
Route::put('/caste', 'casteController@update');
Route::get('/caste/{id}/{status}', 'casteController@statusupdate');

Route::get('/paymenttypesmaster', 'paymentTypesMasterController@index');
Route::post('/paymenttypesmaster', 'paymentTypesMasterController@findAction');
Route::put('/paymenttypesmaster', 'paymentTypesMasterController@update');
Route::get('/paymenttypesmaster/{id}/{status}', 'paymentTypesMasterController@statusupdate');

Route::get('/consessiontypemaster', 'consessionTypeMasterController@index');
Route::post('/consessiontypemaster', 'consessionTypeMasterController@findAction');
Route::put('/consessiontypemaster', 'consessionTypeMasterController@update');
Route::get('/consessiontypemaster/{id}/{status}', 'consessionTypeMasterController@statusupdate');

Route::get('/stationerygroupmaster', 'stationeryGroupMasterController@index');
Route::post('/stationerygroupmaster', 'stationeryGroupMasterController@findAction');
Route::put('/stationerygroupmaster', 'stationeryGroupMasterController@update');
Route::get('/stationerygroupmaster/{id}/{status}', 'stationeryGroupMasterController@statusupdate');

Route::get('/stationerymaster', 'stationeryMasterController@index');
Route::post('/stationerymaster', 'stationeryMasterController@findAction');
Route::put('/stationerymaster', 'stationeryMasterController@update');
Route::get('/stationerymaster/{id}/{status}', 'stationeryMasterController@statusupdate');

Route::get('/transportPickup', 'transportPickupController@index');
Route::post('/transportPickup', 'transportPickupController@findAction');
Route::put('/transportPickup', 'transportPickupController@update');
Route::get('/transportPickup/{id}/{status}', 'transportPickupController@statusupdate');

Route::get('/testtype', 'testtypeController@index');
Route::post('/testtype', 'testtypeController@findAction');
Route::put('/testtype', 'testtypeController@update');
Route::get('/testtype/{id}/{status}', 'testtypeController@statusupdate');

Route::get('/testmaster', 'testmasterController@index');
Route::post('/testmaster', 'testmasterController@findAction');
Route::put('/testmaster', 'testmasterController@update');
Route::get('/testmaster/{id}/{status}', 'testmasterController@statusupdate');

Route::get('/pickpoint', 'pickpointController@index');
Route::post('/pickpoint', 'pickpointController@findAction');
Route::put('/pickpoint', 'pickpointController@update');
Route::get('/pickpoint/{id}/{status}', 'pickpointController@statusupdate');

Route::get('/adjustmentmaster', 'adjustmentmasterController@index');
Route::post('/adjustmentmaster', 'adjustmentmasterController@findAction');
Route::put('/adjustmentmaster', 'adjustmentmasterController@update');
Route::get('/adjustmentmaster/{id}/{status}', 'adjustmentmasterController@statusupdate');

Route::get('/religion', 'religionController@index');
Route::post('/religion', 'religionController@findAction');
Route::put('/religion', 'religionController@update');
Route::get('/religion/{id}/{status}', 'religionController@statusupdate');

Route::get('/mothertongue', 'mothertongueController@index');
Route::post('/mothertongue', 'mothertongueController@findAction');
Route::put('/mothertongue', 'mothertongueController@update');
Route::get('/mothertongue/{id}/{status}', 'mothertongueController@statusupdate');

/* Route::post('login', function () {
    echo $_POST['username'];
}); */
// // Dynamic dropdown dependent
// Route::get('api/dependent-dropdown','APIController@index');
// Route::get('api/get-state-list','APIController@getStateList');
// Route::get('api/get-city-list','APIController@getCityList');


Route::get('/nationality', 'nationalityController@index');
Route::post('/nationality', 'nationalityController@findAction');
Route::put('/nationality', 'nationalityController@update');
Route::get('/nationality/{id}/{status}', 'nationalityController@statusupdate');

Route::get('/admission', 'admissionController@index');
Route::post('/admission', 'admissionController@findAction');
Route::put('/admission', 'admissionController@update');
Route::get('/admission/{id}/{status}', 'admissionController@statusupdate');

// Route::get('admission', function () {
//     return view("admission");
// });
Route::get('/transportpickuppointfee', 'pickuppointController@index');
Route::post('/transportpickuppointfee', 'pickuppointController@findAction');
//sRoute::post('/transportpickuppointfee', 'pickuppointController@insert');
Route::get('/transportpickuppointfee/{id}/{status}', 'pickuppointController@statusupdate');
Route::put('/transportpickuppointfee', 'pickuppointController@update');


Route::get('/dashboard', 'dashboardController@dashboard');

Route::resource('/test' ,'testController@index');


Route::get('/test' ,'testController@index');
