<?php

namespace nrv\application\actions;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use nrv\core\services\panier\ServicePanier;
use nrv\core\services\panier\ServicePanierInterface;
use nrv\core\services\panier\ServicePanierNotFoundException;
use nrv\core\services\billet\ServiceBilletInterface;
use nrv\application\renderer\JsonRenderer;
use nrv\core\services\soiree\ServiceSoireeInterface;
use nrv\core\services\billet\ServiceBilletNotFoundException;
use nrv\core\services\soiree\ServiceSoireeNotFoundException;

class GetPanierByUserIdAction extends AbstractAction
{
    
    private ServicePanierInterface $servicePanier;
    private ServiceBilletInterface $serviceBillet;
    private ServiceSoireeInterface $serviceSoiree;

    public function __construct(ServicePanier $servicePanier, ServiceBilletInterface $serviceBillet, ServiceSoireeInterface $serviceSoiree)
    {
        $this->servicePanier = $servicePanier;
        $this->serviceBillet = $serviceBillet;
        $this->serviceSoiree = $serviceSoiree;
    }

    public function __invoke(Request $rq, Response $rs, array $args): Response
    {
        $id = (string) $args['user_id'];

        try {
            $panierDTO = $this->servicePanier->getPanierByUserId($id);
            $billetsDTO = $this->serviceBillet->getBilletsPanier($panierDTO->panier_id);
            
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
            $prixtotal = $this->servicePanier->prixTotal($panierDTO->panier_id);
            
            $responseData = [
                'panier' => $panierDTO->panier_id,
                'user' => $panierDTO->user_id,
                'billets' => $billetsResponse,
                'prix_total' => $prixtotal
            ];
            return JsonRenderer::render($rs, 200, $responseData);

        } catch (ServicePanierNotFoundException $e) {
            return JsonRenderer::render($rs, 404, ['error' => $e->getMessage()]);
        } catch (ServiceSoireeNotFoundException $e) {
            return JsonRenderer::render($rs, 404, ['error' => $e->getMessage()]);
        } catch (ServiceBilletNotFoundException $e) {
            return JsonRenderer::render($rs, 404, ['error' => $e->getMessage()]);
        } catch (\Exception $e) {
            return JsonRenderer::render($rs, 500, ['error' => $e->getMessage()]);
        }
    }
}