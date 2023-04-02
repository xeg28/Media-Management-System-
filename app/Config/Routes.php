<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Auth');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->match(['get', 'post'], '/', 'Auth::index');
$routes->get('/home', 'Home::index', ['filter' => 'auth']);
$routes->get('/image', 'Image::index', ['filter' => 'auth']);
$routes->get('/audioPage', 'Audio::index', ['filter' => 'auth']); // /audio was giving error 403
$routes->get('/videoPage', 'Video::index', ['filter' => 'auth']);    // /video was giving error 403

$routes->post('/ImageUpload', 'Image::imageUpload', ['filter' => 'auth']);
$routes->get('/DeleteImage', 'Image::delete', ['filter' => 'auth']);
$routes->match(['get', 'post'], '/EditImage', 'Image::edit', ['filter' => 'auth']);

$routes->post('/AudioUpload', 'Audio::audioUpload', ['filter' => 'auth']);
$routes->get('/DeleteAudio', 'Audio::delete', ['filter' => 'auth']);
$routes->match(['get', 'post'], '/EditAudio', 'Audio::edit', ['filter' => 'auth']);

$routes->post('/VideoUpload', 'Video::videoUpload', ['filter' => 'auth']);
$routes->get('/DeleteVideo', 'Video::delete', ['filter' => 'auth']);
$routes->match(['get', 'post'], '/EditVideo', 'Video::edit', ['filter' => 'auth']);

$routes->get('/login', 'Auth::index');
$routes->match(['get', 'post'], '/register', 'Auth::register');
$routes->get('/logout', 'Auth::logout');


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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
