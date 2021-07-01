<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('LoginController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('login', 'LoginController::index');

// ROUTING DATA 
$routes->get('bahasa', 'BahasaController::index');
$routes->get('bahasa/create', 'BahasaController::create');
$routes->post('bahasa/store', 'BahasaController::store');
$routes->get('bahasa/edit/(:alphanum)', 'BahasaController::edit/$1');
$routes->post('bahasa/update', 'BahasaController::update/$1');
$routes->get('bahasa/delete/(:alphanum)', 'BahasaController::delete/$1');


// ROUTING DATA 
$routes->get('rak', 'RakController::index');
$routes->get('rak/create', 'RakController::create');
$routes->post('rak/store', 'RakController::store');
$routes->get('rak/edit/(:alphanum)', 'RakController::edit/$1');
$routes->post('rak/update', 'RakController::update/$1');
$routes->get('rak/delete/(:alphanum)', 'RakController::delete/$1');


// ROUTING DATA 
$routes->get('vendor', 'VendorController::index');
$routes->get('vendor/create', 'VendorController::create');
$routes->post('vendor/store', 'VendorController::store');
$routes->get('vendor/edit/(:alphanum)', 'VendorController::edit/$1');
$routes->post('vendor/update', 'VendorController::update/$1');
$routes->get('vendor/delete/(:alphanum)', 'VendorController::delete/$1');


// ROUTING DATA 
$routes->get('documentmasuk', 'DocumentMasukController::index');
$routes->get('documentmasuk/create', 'DocumentMasukController::create');
$routes->post('documentmasuk/store', 'DocumentMasukController::store');
$routes->get('documentmasuk/edit/(:alphanum)', 'DocumentMasukController::edit/$1');
$routes->post('documentmasuk/update', 'DocumentMasukController::update/$1');
$routes->get('documentmasuk/delete/(:alphanum)', 'DocumentMasukController::delete/$1');


// ROUTING DATA 
$routes->get('documentkeluar', 'DocumentKeluarController::index');
$routes->get('documentkeluar/create', 'DocumentKeluarController::create');
$routes->post('documentkeluar/store', 'DocumentKeluarController::store');
$routes->get('documentkeluar/edit/(:alphanum)', 'DocumentKeluarController::edit/$1');
$routes->post('documentkeluar/update', 'DocumentKeluarController::update/$1');
$routes->get('documentkeluar/delete/(:alphanum)', 'DocumentKeluarController::delete/$1');


// ROUTING DATA 

$routes->get('drawingkode', 'DrawingKodeController::index');
$routes->get('drawingkode/create', 'DrawingKodeController::create');
$routes->post('drawingkode/store', 'DrawingKodeController::store');
$routes->get('drawingkode/edit/(:alphanum)', 'DrawingKodeController::edit/$1');
$routes->post('drawingkode/update', 'DrawingKodeController::update/$1');
$routes->get('drawingkode/delete/(:alphanum)', 'DrawingKodeController::delete/$1');


// ROUTING DATA 

$routes->get('drawingtype', 'DrawingTypeController::index');
$routes->get('drawingtype/create', 'DrawingTypeController::create');
$routes->post('drawingtype/store', 'DrawingTypeController::store');
$routes->get('drawingtype/edit/(:alphanum)', 'DrawingTypeController::edit/$1');
$routes->post('drawingtype/update', 'DrawingTypeController::update/$1');
$routes->get('drawingtype/delete/(:alphanum)', 'DrawingTypeController::delete/$1');


// ROUTING DATA 

$routes->get('jabatan', 'JabatanController::index');
$routes->get('jabatan/create', 'JabatanController::create');
$routes->post('jabatan/store', 'JabatanController::store');
$routes->get('jabatan/edit/(:alphanum)', 'JabatanController::edit/$1');
$routes->post('jabatan/update', 'JabatanController::update/$1');
$routes->get('jabatan/delete/(:alphanum)', 'JabatanController::delete/$1');


// ROUTING DATA 

$routes->get('notamasuk', 'NotaMasukController::index');
$routes->get('notamasuk/create', 'NotaMasukController::create');
$routes->post('notamasuk/store', 'NotaMasukController::store');
$routes->get('notamasuk/edit/(:alphanum)', 'NotaMasukController::edit/$1');
$routes->post('notamasuk/update', 'NotaMasukController::update/$1');
$routes->get('notamasuk/delete/(:alphanum)', 'NotaMasukController::delete/$1');



// ROUTING DATA 

$routes->get('notakeluar', 'NotaKeluarController::index');
$routes->get('notakeluar/create', 'NotaKeluarController::create');
$routes->post('notakeluar/store', 'NotaKeluarController::store');
$routes->get('notakeluar/edit/(:alphanum)', 'NotaKeluarController::edit/$1');
$routes->post('notakeluar/update', 'NotaKeluarController::update/$1');
$routes->get('notakeluar/delete/(:alphanum)', 'NotaKeluarController::delete/$1');




// ROUTING DATA 

$routes->get('users', 'UsersController::index');
$routes->get('users/create', 'UsersController::create');
$routes->post('users/store', 'UsersController::store');
$routes->get('users/edit/(:alphanum)', 'UsersController::edit/$1');
$routes->post('users/update/(:alphanum)', 'UsersController::update/$1');
$routes->get('users/delete/(:alphanum)', 'UsersController::delete/$1');




/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
