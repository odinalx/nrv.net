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
    $app->post('/paniers/{id}/billet', AddBilletPanierAction::class); //ajout d'un billet dans un panier
    $app->get('/paniers/{id}/billet', GetBilletsPanierAction::class); //récupération des billets d'un panier
    $app->post('/paniers/{id}/valider', ValiderPanierAction::class); //validation d'un panier

    //Route Billets
    $app->post('/billetspanier/{id}/supprimer', SupprimerBilletAction::class); //surrpession d'un billet dans un panier
    $app->get('/billets/{id}', GetBilletsByUserIdAction::class); //récupération des billets d'un panier

    //Route Auth
    $app->post('/auth/login', AuthLoginAction::class);
    $app->post('/auth/register', AuthRegisterAction::class);
    return $app;
};