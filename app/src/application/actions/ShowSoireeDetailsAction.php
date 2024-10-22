<?php

namespace nrv\src\actions;

use nrv\src\core\services\SoireeService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ShowSoireeDetailsAction extends AbstractAction
{
    private $soireeService;

    public function __construct(SoireeService $soireeService)
    {
        $this->soireeService = $soireeService;
    }

    public function __invoke(Request $request, Response $response, array $args): Response
    {
        
        $soireeId = (int)$args['id'];

        
        $soireeDetails = $this->soireeService->getSoireeDetails($soireeId);

        
        $response->getBody()->write(json_encode($soireeDetails));

        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
}
