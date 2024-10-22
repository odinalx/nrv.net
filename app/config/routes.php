<?php
declare(strict_types=1);

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

use nrv\application\actions\GetSoireeByIdAction;
use nrv\application\actions\GetSpectaclesAction;
use nrv\application\actions\GetSpectacleByIdAction;


return function( \Slim\App $app):\Slim\App {

    $app->get('/', \nrv\application\actions\HomeAction::class);

    //Routes Spectacle
    $app->get('/spectacles', GetSpectaclesAction::class);
    $app->get('/spectacles/{id}', GetSpectacleByIdAction::class);

    //Routes Soiree
    $app->get('/soirees/{id}', GetSoireeByIdAction::class);

    return $app;
};