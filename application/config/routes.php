<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

/* Rotas do dashboard */
$route['default_controller'] = 'auth';
$route["bebida"] = "bebida";
$route["contato"] = "contato";
$route["endereco"] = "endereco";
$route["fornecedor"] = "fornecedor";
$route["marca"] = "marca";
$route["pagamento"] = "pagamento";
$route["pedido"] = "pedido";
$route["promocao"] = "promocao";
$route["usuario"] = "usuario";
$route["base"] = "base";
$route["categoria"] = "categoria";


//Rotas publicas
$route["home"] = "home";
$route["about"] = "about";
$route["bread"] = "bread";
$route["checkout"] = "checkout";
$route["drinks"] = "drinks";
$route["events"] = "events";
$route["faqs"] = "faqs";
$route["frozen"] = "frozen";
$route["kitchen"] = "kitchen";
$route["login"] = "login";
$route["mail"] = "mail";
$route["products"] = "products";
$route["payment"] = "payment";
$route["pet"] = "pet";
$route["privacy"] = "privacy";
$route["services"] = "services";
$route["shortCodes"] = "shortCodes";
$route["single"] = "single";
$route["vegetables"] = "vegetables";

/* Rotas de variáveis por get */
$route['beer-ecommerce/dash/bebida/apagar/(:any)/(:num)'] = 'beer-ecommerce/dash/bebida/apagar/$1/$2';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
