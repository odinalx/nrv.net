<?php

namespace nrv\application\actions;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use nrv\core\services\billet\ServiceBilletInterface;
use nrv\core\services\billet\ServiceBilletInvalidDataException;
use nrv\core\services\billet\ServiceBilletNotFoundException;
use nrv\application\renderer\JsonRenderer;
use nrv\core\services\soiree\ServiceSoireeInterface;
use nrv\core\services\panier\ServicePanierInterface;

class GetBilletsPanierAction extends AbstractAction
{
    private ServiceBilletInterface $serviceBillet;
    private ServiceSoireeInterface $serviceSoiree;
    private ServicePanierInterface $servicePanier;
    
    public function __construct(ServiceBilletInterface $serviceBillet, ServiceSoireeInterface $serviceSoiree, ServicePanierInterface $servicePanier) {
        $this->serviceBillet = $serviceBillet;
        $this->serviceSoiree = $serviceSoiree;
        $this->servicePanier = $servicePanier;
    }

    public function __invoke(ServerRequestInterface $rq, ResponseInterface $rs, array $args): ResponseInterface {
        try {
            $panier_id = $args['id']; 
            
            $billetsDTO = $this->serviceBillet->getBilletsPanier($panier_id);

            $billetsResponse = [];
            foreach ($billetsDTO as $billetDTO) {
                $soireeDto = $this->serviceSoiree->getSoireeById($billetDTO->soiree_id);

                $billetsResponse[] = [                    
                    'soiree' => [
                        'self' => "/soirees/{$soireeDto->soiree_id}",
                        'nom' => $soireeDto->nom
                    ],
                    'quantite' => $billetDTO->quantite,
                    'prix' => $billetDTO->prix
                ];
            }
            $prixtotal = $this->servicePanier->prixTotal($panier_id);
            
            $responseData = [
                'panier_id' => $panier_id,
                'billets' => $billetsResponse,
                'prix_total' => $prixtotal
            ];

            return JsonRenderer::render($rs, 200, $responseData);

        } catch (ServiceBilletInvalidDataException $e) {
            return JsonRenderer::render($rs, 400, ['error' => $e->getMessage()]);

        } catch (ServiceBilletNotFoundException $e) {
            return JsonRenderer::render($rs, 404, ['error' => $e->getMessage()]);

        } catch (\Exception $e) {            
            return JsonRenderer::render($rs, 500, ['error' => $e->getMessage()]);
        }
    }
}
