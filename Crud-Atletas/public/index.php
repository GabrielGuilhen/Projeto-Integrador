<?php

require_once __DIR__ . '/../app/core/Autoload.php';
require_once __DIR__ . '/../app/config/Config.php';

use app\core\Router;

$router = new Router();

$router->get('/', 'AtletaController@listarTodos');

// Atleta Routes
$router->get('/atletas', 'AtletaController@listarTodos');
$router->get('/atletas/atleta', 'AtletaController@verAtleta');
$router->get('/atletas/cadastrar', 'AtletaController@criar');
$router->post('/atletas/deletar', 'AtletaController@deletar');

$router->post('/atletas/salvar', 'AtletaController@salvar');
$router->get('/atletas/editar', 'AtletaController@editar');
$router->post('/atletas/atualizar', 'AtletaController@atualizar');
$router->get('/atletas/excluir', 'AtletaController@excluir');


$router->get('/usuarios', 'UsuarioController@index');
$router->get('/usuarios/cadastrar', 'UsuarioController@cadastrar');
$router->post('/usuarios/salvar', 'UsuarioController@salvar');
$router->get('/usuarios/editar', 'UsuarioController@editar');
$router->post('/usuarios/atualizar', 'UsuarioController@atualizar');
$router->get('/usuarios/excluir', 'UsuarioController@excluir');

//Autenticacao
$router->get('/login', 'AutenticacaoController@login');
$router->post('/logar', 'AutenticacaoController@logar');




$router->get('/teste', 'AtletaController@redirecionarTeste');


$router->run();
