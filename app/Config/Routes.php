<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->add('/', 'Home::index');
$routes->add('pages/(:any)', 'Home::index/$1');
$routes->get('blogList', 'Home::blogList');
$routes->add('category/(:any)', 'Home::blogList/$1');
$routes->get('productList', 'Home::productList');
$routes->get('contact', 'Home::contact');
$routes->get('tags', 'Home::tagList');
$routes->get('tag_add', 'Home::tagAddView');
$routes->post('tag_add', 'Home::tagAdd');
$routes->get('tagUpdate/(:num)', 'Home::tagUpdateView/$1');
$routes->post('tagUpdate/(:num)', 'Home::tagUpdate/$1');
$routes->get('tagDelete/(:num)', 'Home::tagDelete/$1');
$routes->get('recoveryTag/(:num)', 'Home::recoveryTag/$1');
$routes->get('deletedTags', 'Home::deletedTags');
$routes->post('contactForm','Pageforms::contactForm',['as'=>'contactForm']);
$routes->post('imgMan','Pageforms::imgMan',['as'=>'imgMan']);
$routes->get('imgMan_view','Home::imgMan_view',['as'=>'imgMan_view']);

$routes->get('basket','Product::basket');
$routes->post('successfullBasket','Product::successfullBasket',['as'=>'successfullBasket']);
$routes->post('addBasket','Product::addBasket');
$routes->post('updateBasket','Product::updateBasket');
$routes->post('removeBasketOne','Product::removeBasketOne');
$routes->post('emptyTheBasket','Product::emptyTheBasket');

/**
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
