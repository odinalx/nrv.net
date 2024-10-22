<?php

namespace nrv\application\actions;

use nrv\core\services\spectacle\ServiceSpectacleInterface;
use nrv\core\services\soiree\ServiceSoireeInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use nrv\application\renderer\JsonRenderer;
use nrv\core\services\spectacle\ServiceSpectacleNotFoundException;
use nrv\core\services\soiree\ServiceSoiree;

class GetSpectaclesAction extends AbstractAction
{
    private ServiceSpectacleInterface $serviceSpectacle;
    private ServiceSoireeInterface $serviceSoiree;

    public function __construct(ServiceSpectacleInterface $serviceSpectacle, ServiceSoiree $serviceSoiree)
    {
        $this->serviceSpectacle = $serviceSpectacle;
        $this->serviceSoiree = $serviceSoiree;
    }

    public function __invoke(Request $rq, Response $rs, array $args): Response
    {
        
        try {
            $spectaclesDto = $this->serviceSpectacle->getSpectacles();

            $spectaclesResponse = [];
            foreach ($spectaclesDto as $spectacleDto) {
                $soireeDto = $this->serviceSoiree->getSoireeById($spectacleDto->soiree_id);
                                
                $images = $this->serviceSpectacle->getImagesSpectacle($spectacleDto->spectacle_id);
                $imageUrls = array_map(function($image) {
                    return $image['image'];
                }, $images);

                $spectaclesResponse[] = [
                    'self' => "/spectacles/{$spectacleDto->spectacle_id}",
                    'titre' => $spectacleDto->titre,
                    'date' => $soireeDto->date->format('d-m-Y'),
                    'horaire' => $spectacleDto->horraire_prev,
                    'soiree' => [
                        'self' => "/soirees/{$soireeDto->soiree_id}",
                        'nom' => $soireeDto->nom
                    ],
                    'images' => $imageUrls
                ];
            }
            return JsonRenderer::render($rs, 200, ['spectacles' => $spectaclesResponse]);

        } catch (ServiceSpectacleNotFoundException $e) {
            return JsonRenderer::render($rs, 404, ['error' => $e->getMessage()]);
        }
    }
}