<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
// login routes
$routes->get('login', 'AuthenticateUser::login');
$routes->add('login', 'AuthenticateUser::login');
// register routes
$routes->get('register', 'AuthenticateUser::register');
$routes->add('register', 'AuthenticateUser::register');

// logout route
$routes->get('logout', 'AuthenticateUser::logout');

// shopping route
$routes->get('shop', 'Shop::index');
$routes->get('shop/category/(:segment)', 'Shop::category/$1');
$routes->get('shop/product/(:segment)', 'Shop::product/$1');
$routes->get('shop/getcity', 'Shop::getCity');
$routes->get('shop/getcost', 'Shop::getCost');
$routes->get('shop/getdiscount', 'Shop::getDiscount');

// transaction route
$routes->get('transaction', 'Transaksi::index', ['filter' => 'auth']);
$routes->get('invoice/(:segment)', 'Transaksi::invoice', ['filter' => 'auth']);
$routes->add('buy', 'Transaksi::buy', ['filter' => 'auth']);

// user review/comments route
$routes->add('komentar/create', 'Komentar::create');

// route of shop's contact
$routes->add('contact', 'Home::contact');

// product management (for logged in user only)
$routes->get("product-management", "ProductManagement::index");
$routes->get("product-management/tambah", "ProductManagement::tambahProduct");
$routes->get("product-management/edit/(:segment)", "ProductManagement::editProduct/$1");
$routes->get("product-management/hapus/(:segment)", "ProductManagement::hapusProduct/$1");
$routes->post("product-management/simpan-produk", "ProductManagement::simpanProduk");
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
