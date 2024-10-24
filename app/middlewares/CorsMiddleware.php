<?php

namespace app\middlewares;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Exception\HttpUnauthorizedException;   

class CorsMiddleware implements MiddlewareInterface 
{
    public function process(Request $request, RequestHandlerInterface $handler): Response 
    {
        /*if (!$request->hasHeader('Origin')) {
            throw new HttpUnauthorizedException($request, "missing Origin Header (cors)");
        }*/

        $origin = $request->getHeaderLine('Origin');
        $response = $handler->handle($request);
        
        // Handle preflight OPTIONS request
        return $response
            ->withHeader('Access-Control-Allow-Origin', $origin)
            ->withHeader('Access-Control-Allow-Methods', 'POST, PUT, GET')
            ->withHeader('Access-Control-Allow-Headers', 'Authorization')
            ->withHeader('Access-Control-Max-Age', '3600')
            ->withHeader('Access-Control-Allow-Credentials', 'true');
    }

}