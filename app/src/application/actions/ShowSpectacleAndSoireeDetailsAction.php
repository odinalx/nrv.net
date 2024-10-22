<?php

namespace nrv\src\actions;

use nrv\src\core\services\SpectacleService;
use nrv\src\core\services\SoireeService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ShowSpectacleAndSoireeDetailsAction extends AbstractAction
{
    private $spectacleService;
    private $soireeService;

    public function __construct(SpectacleService $spectacleService, SoireeService $soireeService)
    {
        $this->spectacleService = $spectacleService;
        $this->soireeService = $soireeService;
    }

    public function __invoke(Request $request, Response $response, array $args): Response
    {
        
        $spectacleId = (int)$args['id'];

        
        $spectacleDetails = $this->spectacleService->getSpectacleDetails($spectacleId);

        
        $soireeId = $spectacleDetails['soiree_id'];
        $soireeDetails = $this->soireeService->getSoireeDetails($soireeId);

        
        $result = [
            'spectacle' => $spectacleDetails,
            'soiree' => $soireeDetails,
        ];

        
        $response->getBody()->write(json_encode($result));

        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
}
