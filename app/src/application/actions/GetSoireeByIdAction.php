<?php

namespace nrv\application\actions;

use nrv\core\services\soiree\ServiceSoireeInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use nrv\application\renderer\JsonRenderer;
use nrv\core\services\spectacle\ServiceSpectacleNotFoundException;
use nrv\core\services\soiree\ServiceSoiree;

class GetSoireeByIdAction extends AbstractAction
{
    
    private ServiceSoireeInterface $serviceSoiree;

    public function __construct(ServiceSoiree $serviceSoiree)
    {
        $this->serviceSoiree = $serviceSoiree;
    }

    public function __invoke(Request $rq, Response $rs, array $args): Response
    {
        $id = (string) $args['id'];

        try {
            $soireeDto = $this->serviceSoiree->getSoireeById($id);
            $spectacles = $this->serviceSoiree->getSpectaclesBySoireeId($id);

            $spectaclesFormatted = [];
            foreach ($spectacles as $spectacle) {
                $spectaclesFormatted[] = [  
                    'self' => "/spectacles/{$spectacle->getID()}",             
                    'titre' => $spectacle->getTitre(),           
                    'description' => $spectacle->getDescription(), 
                    'style' => $spectacle->getStyle(),           
                    'horaire_prev' => $spectacle->getHorairePrev()   
                ];
            }

            $responseData = [
                'self' => "/soirees/{$soireeDto->soiree_id}",
                'nom' => $soireeDto->nom,
                'theme' => $soireeDto->thematique,
                'date' => $soireeDto->date->format('d-m-Y'),
                'horaire_debut' => $soireeDto->horaire_debut,
                'lieu_id' => $soireeDto->lieu_id,
                'tarif_normal' => $soireeDto->tarif_normal,
                'tarif_reduit' => $soireeDto->tarif_reduit,
                'spectacles' => $spectaclesFormatted
            ];
            return JsonRenderer::render($rs, 200, $responseData);

        } catch (ServiceSpectacleNotFoundException $e) {
            return JsonRenderer::render($rs, 404, ['error' => $e->getMessage()]);
        }
    }
}