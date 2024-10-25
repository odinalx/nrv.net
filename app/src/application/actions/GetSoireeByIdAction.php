<?php

namespace nrv\application\actions;

use nrv\core\services\soiree\ServiceSoireeInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use nrv\application\renderer\JsonRenderer;
use nrv\core\services\lieu\ServiceLieuInterface;
use nrv\core\services\spectacle\ServiceSpectacleNotFoundException;
use nrv\core\services\soiree\ServiceSoiree;
use nrv\core\services\lieu\ServiceLieuNotFoundException;
use nrv\core\services\soiree\ServiceSoireeNotFoundException;

class GetSoireeByIdAction extends AbstractAction
{
    
    private ServiceSoireeInterface $serviceSoiree;
    private ServiceLieuInterface $serviceLieu;

    public function __construct(ServiceSoiree $serviceSoiree, ServiceLieuInterface $serviceLieu)
    {
        $this->serviceSoiree = $serviceSoiree;
        $this->serviceLieu = $serviceLieu;
    }

    public function __invoke(Request $rq, Response $rs, array $args): Response
    {
        $id = (string) $args['id'];

        try {
            $soireeDto = $this->serviceSoiree->getSoireeById($id);
            $spectacles = $this->serviceSoiree->getSpectaclesBySoireeId($id);
            $lieu = $this->serviceLieu->getLieuById($soireeDto->lieu_id);

            $responseData = [
                'self' => "/soirees/{$soireeDto->soiree_id}",
                'nom' => $soireeDto->nom,
                'theme' => $soireeDto->thematique,
                'date' => $soireeDto->date->format('d-m-Y'),
                'horaire_debut' => $soireeDto->horaire_debut,
                'lieu' => $lieu->nom,                
                'tarif_normal' => $soireeDto->tarif_normal,
                'tarif_reduit' => $soireeDto->tarif_reduit,                
                'spectacles' => $spectacles
            ];
            return JsonRenderer::render($rs, 200, $responseData);

        } catch (ServiceSpectacleNotFoundException $e) {
            return JsonRenderer::render($rs, 404, ['error' => $e->getMessage()]);
        } catch (ServiceLieuNotFoundException $e) {
            return JsonRenderer::render($rs, 404, ['error' => $e->getMessage()]);
        } catch (ServiceSoireeNotFoundException $e) {
            return JsonRenderer::render($rs, 404, ['error' => $e->getMessage()]);
        } catch (\Exception $e) {
            return JsonRenderer::render($rs, 500, ['error' => $e->getMessage()]);
        }
    }
}