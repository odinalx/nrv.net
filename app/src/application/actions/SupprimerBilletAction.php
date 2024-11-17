<?php

namespace nrv\application\actions;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use nrv\core\services\billet\ServiceBilletInterface;
use nrv\core\services\billet\ServiceBilletInvalidDataException;
use nrv\core\services\billet\ServiceBilletNotFoundException;
use nrv\application\renderer\JsonRenderer;

class SupprimerBilletAction extends AbstractAction
{
    private ServiceBilletInterface $serviceBillet;
    
    public function __construct(ServiceBilletInterface $serviceBillet) {
        $this->serviceBillet = $serviceBillet;
    }

    public function __invoke(ServerRequestInterface $rq, ResponseInterface $rs, array $args): ResponseInterface {
        try {
            $billetpanier_id = $args['id'];
            $panier_id = $args['panier_id'];

            $newBillet = $this->serviceBillet->supprimerBillet($billetpanier_id);

            if ($newBillet->panier_id != $panier_id) {
                throw new ServiceBilletInvalidDataException('Le billet n\'appartient pas au panier');
            }

            $responseData = [
                'billet supprimé' => $billetpanier_id,
                'panier' => $newBillet->panier_id,
                'soiree' => $newBillet->soiree_id
            ];

            return JsonRenderer::render($rs, 200, $responseData);

        } catch (ServiceBilletNotFoundException $e) {
            return JsonRenderer::render($rs, 404, ['error' => $e->getMessage()]);
        } catch (ServiceBilletInvalidDataException $e) {
            return JsonRenderer::render($rs, 400, ['error' => $e->getMessage()]);
        } catch (\Exception $e) {            
            return JsonRenderer::render($rs, 500, ['error' => $e->getMessage()]);
        }
    }
}
