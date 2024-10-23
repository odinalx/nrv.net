<?php

namespace nrv\middlewares;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Exception\HttpUnauthorizedException;

class CorsMiddleware {
    public function corsHeaders(Request $rq, RequestHandlerInterface $next ): Response {

        if (! $rq->hasHeader('Origin'))
            throw new HttpUnauthorizedException ($rq, "missing Origin Header (cors)");

        $response = $next->handle($rq);
        $response = $response
            ->withHeader('Access-Control-Allow-Origin', 'Origin')
            ->withHeader('Access-Control-Allow-Methods', 'POST, PUT, GET' )
            ->withHeader('Access-Control-Allow-Headers','Authorization' )
            ->withHeader('Access-Control-Max-Age', 3600)
            ->withHeader('Access-Control-Allow-Credentials', 'true');

        return $response;
    }
}