<?php

namespace nrv\application\actions;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use nrv\core\services\panier\ServicePanier;
use nrv\core\services\panier\ServicePanierInterface;
use nrv\core\services\panier\ServicePanierNotFoundException;
use nrv\application\renderer\JsonRenderer;

class GetPanierByUserIdAction extends AbstractAction
{
    
    private ServicePanierInterface $servicePanier;

    public function __construct(ServicePanier $servicePanier)
    {
        $this->servicePanier = $servicePanier;
    }

    public function __invoke(Request $rq, Response $rs, array $args): Response
    {
        $id = (string) $args['id'];

        try {
            $panierDTO = $this->servicePanier->getPanierByUserId($id);           

            $responseData = [
                'panier' => $panierDTO->panier_id,
                'user' => $panierDTO->user_id,
                'billets' => 'les billets'
            ];
            return JsonRenderer::render($rs, 200, $responseData);

        } catch (ServicePanierNotFoundException $e) {
            return JsonRenderer::render($rs, 404, ['error' => $e->getMessage()]);
        }
    }
}