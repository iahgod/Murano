<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');
//!LOGIN
$router->get('/admin/login', 'LoginController@signin');
$router->post('/admin/login', 'LoginController@signinAction');
//!CADASTRO
$router->get('/admin/cadastro', 'LoginController@signup');
$router->post('/admin/cadastro', 'LoginController@signupAction');
//!ESQUECEU SENHA
$router->get('/admin/esqueceu-senha', 'LoginController@esqueceu');
$router->post('/admin/esqueceu-senha', 'LoginController@esqueceuAction');
//!LOGOUT
$router->get('/admin/sair', 'LoginController@logout');
//!MINHA CONTA
$router->get('/admin/minha-conta', 'UserController@conta');
$router->post('/admin/minha-conta', 'UserController@contaUpdate');
//!ADMIN
$router->get('/admin', 'AdminController@index');
//!NOTIFICACAO
$router->get('/admin/notificacao/{id}', 'AdminController@viuNotificacao');
$router->get('/admin/Teste/lista',       'TesteController@index');
$router->get('/admin/Teste/form',        'TesteController@form');
$router->get('/admin/Teste/form/{id}',   'TesteController@form');
$router->post('/admin/Teste/form',       'TesteController@action');
$router->get('/admin/Teste/delete/{id}', 'TesteController@delete');
//!TESTE
$router->get('/admin/teste', 'AdminController@teste');
//!Rotas de Menu
$router->get('/admin/Menu/lista',       'MenuController@index');
$router->get('/admin/Menu/form',        'MenuController@form');
$router->post('/admin/Menu/formSub',    'MenuController@actionSub');
$router->post('/admin/Menu/form',       'MenuController@action');
$router->get('/admin/Menu/status/{id}', 'MenuController@status');
$router->get('/admin/Menu/delete/{id}', 'MenuController@delete');
$router->get('/admin/Menu/deleteSub/{id}', 'MenuController@deleteSub');
//!Rotas de usuarios
$router->get('/admin/usuarios',             'UsuariosController@index');
$router->get('/admin/usuarios/form',        'UsuariosController@form');
$router->get('/admin/usuarios/form/{id}',   'UsuariosController@form');
$router->post('/admin/usuarios/form',       'UsuariosController@action');
$router->get('/admin/usuarios/delete/{id}', 'UsuariosController@delete');
//!Rotas de Grupos
$router->get('/admin/Grupos',             'GruposController@index');
$router->get('/admin/Grupos/form',        'GruposController@form');
$router->get('/admin/Grupos/form/{id}',   'GruposController@form');
$router->post('/admin/Grupos/form',       'GruposController@action');
$router->get('/admin/Grupos/delete/{id}', 'GruposController@delete');