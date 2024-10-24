<?php

namespace nrv\application\actions;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use nrv\core\services\panier\ServicePanierInterface;
use nrv\core\services\panier\ServicePanierInvalidDataException;
use nrv\application\renderer\JsonRenderer;

class CreerPanierAction extends AbstractAction
{
    private ServicePanierInterface $servicePanier;
    
    public function __construct(ServicePanierInterface $servicePanier) {
        $this->servicePanier = $servicePanier;
    }

    public function __invoke(ServerRequestInterface $rq, ResponseInterface $rs, array $args): ResponseInterface {
        try {
            $data = json_decode($rq->getBody()->getContents(), true);

            if (!isset($data['user_id'])) {
                throw new ServicePanierInvalidDataException("Il manque l'identifiant de l'utilisateur");
            }

            $panierDTO = $this->servicePanier->createPanier($data['user_id']);

            $responseData = [
                'id' => $panierDTO->panier_id,
                'user' => $panierDTO->user_id,
                'is_validated' => $panierDTO->is_validated
            ];

            return JsonRenderer::render($rs, 201, $responseData); //code 201 = created

        } catch (ServicePanierInvalidDataException $e) {
            return JsonRenderer::render($rs, 400, ['error' => $e->getMessage()]);

        } catch (\Exception $e) {            
            return JsonRenderer::render($rs, 500, ['error' => $e->getMessage()]);
        }
    }
}
