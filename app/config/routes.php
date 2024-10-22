<?php
declare(strict_types=1);

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use nrv\application\actions\GetSpectacleIdByAction;

return function( \Slim\App $app):\Slim\App {

    $app->get('/', \nrv\application\actions\HomeAction::class);

    //Routes Spectacle
    $app->get('/spectacles/{id}', GetSpectacleIdByAction::class);


    return $app;
};