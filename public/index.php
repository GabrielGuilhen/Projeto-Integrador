<?php

require_once __DIR__ . '/../app/config/Config.php';

    //SISTEMA DE ROTAS V0.1
   $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

   switch($uri){
    case '/teste':
        print 'teste!';
        break;

    case '/jogadores':
        
        
        break;

    default:
    http_response_code(404);
    print'pagina não encontrada';
        break;


   }
