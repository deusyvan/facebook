<?php
global $routes;
$routes = array();

//$routes['/'] = '/home';
$routes['/login'] = '/login';
$routes['/logar'] = '/login/entrar';
$routes['/cadastrar'] = '/login/cadastrar';
$routes['/sair'] = '/login/logout';

$routes['/editar'] = '/perfil';

//Não muito usual pois força fazer router pra todos os tipos e a solução do home no comentário acima
//$routes['/{titulo}'] = '/controller/acao/:titulo';