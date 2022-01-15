<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
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
$routes->get('/', 'Home::index',['filter' => 'sudahLogin']);
$routes->get('/infoperusahaan', 'info::infoadmin',['filter' => 'sudahLogin']);
$routes->get('/', 'Home::index',['filter' => 'sudahLogin']);
$routes->get('/', 'Home::index',['filter' => 'sudahLogin']);
$routes->get('/', 'Home::index',['filter' => 'sudahLogin']);
$routes->get('/homeadmin','Home::homeadmin',['filter' => 'cekLogin']);
$routes->get('/brosuradmin','brosur::brosuradmin',['filter' => 'cekLogin']);
$routes->get('/blogadmin','blog::blogadmin',['filter' => 'cekLogin']);
$routes->get('/contactadmin','contact::contactadmin',['filter' => 'cekLogin']);
$routes->get('/infoadmin','infoperusahaan::infoadmin',['filter' => 'cekLogin']);
$routes->get('/brosuradmin/editbrosur/(:num)','brosur::editBrosur/$1',['filter' => 'cekLogin']);
// $routes->get('/produk/(:any)','Produk::index',['filter' => 'cekLogin']);
$routes->get('/login','login::index',['filter' => 'sudahLogin']);
$routes->get('/','Home::index',['filter' => 'sudahLogin']);



$routes->delete('/blog/delete/(:num)','blog::delete/$1');
$routes->delete('/layanan/delete/(:num)','home::delete/$1');
$routes->delete('/Produk/deletecctv/(:num)','Produk::deletecctv/$1');
$routes->delete('/Produk/deletecctv5/(:num)','Produk::deletecctv5/$1');
$routes->delete('/Produkrunt/deleterunt/(:num)','Produkrunt::deleterunt/$1');
$routes->delete('/Produkrunt/deleterunt2/(:num)','Produkrunt::deleterunt2/$1');
$routes->delete('/brosur/deleteBrosur/(:num)','brosur::deleteBrosur/$1');
$routes->delete('/info/delete/(:num)','infoperusahaan::deleteInfo/$1');
$routes->delete('/brand/delete/(:num)','brand::delete/$1');
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
