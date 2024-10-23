<?php
declare(strict_types=1);

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

use nrv\application\actions\GetSoireeByIdAction;
use nrv\application\actions\GetSpectaclesAction;
use nrv\application\actions\GetSpectacleByIdAction;
use nrv\application\actions\HomeAction;
use app\middlewares\CorsMiddleware;


return function( \Slim\App $app):\Slim\App {

    // Middleware CORS
    $app->add(CorsMiddleware::class);

    // Route OPTIONS pour toutes les routes
    $app->options('/{routes:.+}', function(Request $rq, Response $rs, array $args): Response {
        return $rs
        ->withHeader('Access-Control-Allow-Origin', $rq->getHeaderLine('Origin'))
        ->withHeader('Access-Control-Allow-Methods', 'POST, PUT, GET, DELETE, OPTIONS')
        ->withHeader('Access-Control-Allow-Headers', 'Authorization, Content-Type')
        ->withHeader('Access-Control-Max-Age', 3600)
        ->withHeader('Access-Control-Allow-Credentials', 'true');
    });

    $app->get('/', HomeAction::class);

    //Routes Spectacle
    $app->get('/spectacles', GetSpectaclesAction::class);
    $app->get('/spectacles/{id}', GetSpectacleByIdAction::class);

    //Routes Soiree
    $app->get('/soirees/{id}', GetSoireeByIdAction::class);

    return $app;
};