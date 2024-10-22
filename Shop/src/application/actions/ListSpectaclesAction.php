<?php

namespace nrv\src\actions;

use nrv\src\core\services\SpectacleService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ListSpectaclesAction extends AbstractAction
{
    private $spectacleService;

    public function __construct(SpectacleService $spectacleService)
    {
        $this->spectacleService = $spectacleService;
    }

    public function __invoke(Request $request, Response $response): Response
    {
        
        $spectacles = $this->spectacleService->listAllSpectacles();

        
        $response->getBody()->write(json_encode($spectacles));

        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
}
