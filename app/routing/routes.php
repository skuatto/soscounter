<?php

$routes->group(['namespace' => 'app\controllers'], function($routes)
{
	$routes->get('/', 'Principal::index', 'index');
	$routes->post('/', 'Principal::incrementar_contador', 'incrementar_contador');

	$routes->get('/logout', 'Principal::logout', 'logout');
	$routes->get('/login', 'Principal::login', 'login');
	$routes->post('/login', 'Principal::loguearse', 'loguearse');
});