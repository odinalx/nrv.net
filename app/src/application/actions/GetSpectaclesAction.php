<?php

namespace nrv\application\actions;

use nrv\core\services\spectacle\ServiceSpectacleInterface;
use nrv\core\services\soiree\ServiceSoireeInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use nrv\application\renderer\JsonRenderer;
use nrv\core\services\lieu\ServiceLieu;
use nrv\core\services\spectacle\ServiceSpectacleNotFoundException;
use nrv\core\services\soiree\ServiceSoiree;
use nrv\core\services\lieu\ServiceLieuInterface;
use nrv\core\services\soiree\ServiceSoireeNotFoundException;
use nrv\core\services\lieu\ServiceLieuNotFoundException;

class GetSpectaclesAction extends AbstractAction
{
    private ServiceSpectacleInterface $serviceSpectacle;
    private ServiceSoireeInterface $serviceSoiree;
    private ServiceLieuInterface $serviceLieu;

    public function __construct(ServiceSpectacleInterface $serviceSpectacle, ServiceSoiree $serviceSoiree, ServiceLieuInterface $serviceLieu)
    {
        $this->serviceSpectacle = $serviceSpectacle;
        $this->serviceSoiree = $serviceSoiree;
        $this->serviceLieu = $serviceLieu;
    }

    public function __invoke(Request $rq, Response $rs, array $args): Response
    {
        
        try {
            $spectaclesDto = $this->serviceSpectacle->getSpectacles();

            $spectaclesResponse = [];
            foreach ($spectaclesDto as $spectacleDto) {
                $soireeDto = $this->serviceSoiree->getSoireeById($spectacleDto->soiree_id);
                                
                $images = $this->serviceSpectacle->getImagesSpectacle($spectacleDto->spectacle_id);
                $lieu = $this->serviceLieu->getLieuById($soireeDto->lieu_id);
                $artistes = $this->serviceSpectacle->getArtistes($spectacleDto->spectacle_id);

                $spectaclesResponse[] = [
                    'self' => "/spectacles/{$spectacleDto->spectacle_id}",
                    'titre' => $spectacleDto->titre,
                    'date' => $soireeDto->date->format('d-m-Y'),
                    'horaire' => $spectacleDto->horraire_prev,
                    'soiree' => [
                        'self' => "/soirees/{$soireeDto->soiree_id}",
                        'nom' => $soireeDto->nom,
                        'lieu' => $lieu->nom
                    ],
                    'style' => $spectacleDto->style,
                    'artistes' => $artistes,
                    'images' => $images
                ];
            }
            return JsonRenderer::render($rs, 200, ['spectacles' => $spectaclesResponse]);

        } catch (ServiceSpectacleNotFoundException $e) {
            return JsonRenderer::render($rs, 404, ['error' => $e->getMessage()]);
        } catch (ServiceSoireeNotFoundException $e) {
            return JsonRenderer::render($rs, 404, ['error' => $e->getMessage()]);
        } catch (ServiceLieuNotFoundException $e) {
            return JsonRenderer::render($rs, 404, ['error' => $e->getMessage()]);
        } catch (\Exception $e) {
            return JsonRenderer::render($rs, 500, ['error' => $e->getMessage()]);
        }
    }
}