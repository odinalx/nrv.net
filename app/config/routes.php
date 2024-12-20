<?php
declare(strict_types=1);

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

use nrv\application\actions\GetSoireeByIdAction;
use nrv\application\actions\GetSpectaclesAction;
use nrv\application\actions\GetSpectacleByIdAction;
use nrv\application\actions\HomeAction;
use app\middlewares\CorsMiddleware;
use nrv\application\actions\AddBilletPanierAction;
use nrv\application\actions\CreerPanierAction;
use nrv\application\actions\GetBilletsPanierAction;
use nrv\application\actions\ValiderPanierAction;
use nrv\application\actions\SupprimerBilletAction;
use nrv\application\actions\GetBilletsByUserIdAction;
use nrv\application\actions\AuthLoginAction;
use nrv\application\actions\AuthRegisterAction;
use nrv\application\actions\GetPanierByUserIdAction;
use nrv\application\actions\GetUserByIdAction;

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


    //Routes Panier
    $app->post('/paniers', CreerPanierAction::class); //création d'un panier    
    $app->post('/paniers/{id}/billets', AddBilletPanierAction::class); //ajout d'un billet dans un panier
    $app->delete('/paniers/{panier_id}/billets/{id}', SupprimerBilletAction::class); //surrpession d'un billet dans un panier
    $app->get('/users/{user_id}/panier', GetPanierByUserIdAction::class); //récupération des billets d'un panier d'un user
    $app->post('/paniers/{id}/valider', ValiderPanierAction::class); //validation d'un panier

    //Route Billets    
    $app->get('/users/{id}/billets', GetBilletsByUserIdAction::class); //récupération des billets d'un panier

    //Route Auth
    $app->post('/auth/login', AuthLoginAction::class);
    $app->post('/auth/register', AuthRegisterAction::class);
    $app->get('/auth/{id}', GetUserByIdAction::class);
    return $app;
};