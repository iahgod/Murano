<?php
use core\Router;

$router = new Router();

//? USUARIO
$router->get('/', 'HomeController@index');

//? ADMIN
$router->get('/admin', 'Admin\AdminController@index');
$router->get('/admin/teste', 'Admin\AdminController@teste');
$router->get('/admin/logs/lista', 'Admin\AdminController@log');

//! Logins e cadastros
$router->get('/admin/login', 'LoginAdmin\LoginController@loginView');             $router->post('/admin/login', 'LoginAdmin\LoginController@loginAction');
$router->get('/admin/cadastro', 'LoginAdmin\LoginController@cadastroView');       $router->post('/admin/cadastro', 'LoginAdmin\LoginController@cadastroAction');
$router->get('/admin/esqueceu-senha', 'LoginAdmin\LoginController@esqueceuView'); $router->post('/admin/esqueceu', 'LoginAdmin\LoginController@esqueceuAction');
$router->get('/admin/resetar-senha', 'LoginAdmin\LoginController@ResetarView');   $router->post('/admin/resetar', 'LoginAdmin\LoginController@resetarAction');
$router->get('/admin/sair', 'LoginAdmin\LoginController@logout');
//! Rotas de Menu
$router->get('/admin/Menu/lista',       'Admin\MenuController@lista');
$router->get('/admin/Menu/form',        'Admin\MenuController@form');
$router->post('/admin/Menu/form',       'Admin\MenuController@action');
$router->get('/admin/Menu/delete/{id}', 'Admin\MenuController@delete');
$router->get('/admin/Menu/status/{id}', 'Admin\MenuController@status');
//!Rotas de Grupos
$router->get('/admin/Grupos/lista',       'Admin\GruposController@lista');
$router->get('/admin/Grupos/form',        'Admin\GruposController@form');
$router->get('/admin/Grupos/form/{id}',   'Admin\GruposController@form');
$router->post('/admin/Grupos/form',       'Admin\GruposController@action');
$router->get('/admin/Grupos/delete/{id}', 'Admin\GruposController@delete');
//! Rotas de minha conta
$router->get('/admin/minha-conta',  'Admin\UserController@form');
$router->post('/admin/minha-conta', 'Admin\UserController@action');
