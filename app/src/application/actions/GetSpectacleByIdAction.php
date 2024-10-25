<?php

namespace nrv\application\actions;

use nrv\core\services\spectacle\ServiceSpectacleInterface;
use nrv\core\services\soiree\ServiceSoireeInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use nrv\application\renderer\JsonRenderer;
use nrv\core\services\spectacle\ServiceSpectacleNotFoundException;
use nrv\core\services\soiree\ServiceSoiree;
use nrv\core\services\soiree\ServiceSoireeNotFoundException;

class GetSpectacleByIdAction extends AbstractAction
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
        $id = (string) $args['id'];

        try {
            $spectacleDto = $this->serviceSpectacle->getSpectacleById($id);
            $soireeDto = $this->serviceSoiree->getSoireeById($spectacleDto->soiree_id);
            $responseData = [
                'self' => "/spectacles/{$spectacleDto->spectacle_id}",
                'titre' => $spectacleDto->titre,
                'date' => $soireeDto->date->format('d-m-Y'),
                'horaire' => $spectacleDto->horraire_prev,
            ];
            return JsonRenderer::render($rs, 200, $responseData);

        } catch (ServiceSpectacleNotFoundException $e) {
            return JsonRenderer::render($rs, 404, ['error' => $e->getMessage()]);
        } catch (ServiceSoireeNotFoundException $e) {
            return JsonRenderer::render($rs, 404, ['error' => $e->getMessage()]);
        } catch (\Exception $e) {
            return JsonRenderer::render($rs, 500, ['error' => $e->getMessage()]);
        }
    }
}