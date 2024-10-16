<?php
defined('BASEPATH') or exit('No direct script access allowed');
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

#CATEGORY
$route['category/create'] = 'CategoryController/create';
$route['category/store'] = 'CategoryController/store';
$route['category/show'] = 'CategoryController/show';

#CUSTOMER
$route['customer/create'] = 'CustomerController/create';
$route['customer/store'] = 'CustomerController/store';

#CURRENCY
$route['currency/create'] = 'CurrencyController/create';
$route['currency/store'] = 'CurrencyController/store';

#PAYMENT
$route['payment/create'] = 'PaymentController/create';
$route['payment/store'] = 'PaymentController/store';
$route['payment/show'] = 'PaymentController/show';
$route['payment/showAll'] = 'PaymentController/showAll';
