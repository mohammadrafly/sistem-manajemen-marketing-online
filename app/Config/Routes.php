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
$routes->get('/', 'Home::index');
$routes->get('login', 'Auth::index');
$routes->get('register', 'Auth::register');
$routes->post('login', 'Auth::login');
$routes->post('register', 'Auth::store');
$routes->get('logout', 'Auth::logout');

$routes->group('dashboard', ['filter' => 'authGuard'], function ($routes) {
    $routes->get('/', 'Dashboard::index');
    $routes->group('profile', function ($routes) {
        $routes->get('u/(:any)', 'Profile::index/$1');
        $routes->post('/', 'Profile::update');
    });
    $routes->group('category', ['filter' => 'superuserGuard'], function ($routes) {
        $routes->get('/', 'Categories::index');
        $routes->get('add', 'Categories::add');
        $routes->post('add', 'Categories::store');
        $routes->get('edit/(:num)', 'Categories::edit/$1');
        $routes->post('update', 'Categories::update');
        $routes->get('delete/(:num)', 'Categories::delete/$1');
    });
    $routes->group('teams', ['filter' => 'superuserGuard'], function ($routes) {
        $routes->get('/', 'Team::index');
        $routes->get('add', 'Team::add');
        $routes->post('add', 'Team::store');
        $routes->get('edit/(:num)', 'Team::edit/$1');
        $routes->post('update', 'Team::update');
        $routes->get('delete/(:num)', 'Team::delete/$1');
    });
    $routes->group('users', ['filter' => 'superuserGuard'], function ($routes) {
        $routes->get('/', 'Users::index');
        $routes->get('add', 'Users::add');
        $routes->post('add', 'Users::store');
        $routes->get('edit/(:num)', 'Users::edit/$1');
        $routes->post('update', 'Users::update');
        $routes->get('delete/(:num)', 'Users::delete/$1');
    });
    $routes->group('posts', ['filter' => 'superuserGuard'], function ($routes) {
        $routes->get('/', 'Posts::index');
        $routes->get('add', 'Posts::add');
        $routes->post('add', 'Posts::store');
        $routes->get('edit/(:num)', 'Posts::edit/$1');
        $routes->post('update', 'Posts::update');
        $routes->get('delete/(:num)', 'Posts::delete/$1');
    });
});

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
