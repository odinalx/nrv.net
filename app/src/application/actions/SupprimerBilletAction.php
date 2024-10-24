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


            $newBillet = $this->serviceBillet->supprimerBillet($billetpanier_id);
            $responseData = [
                'billet supprimé' => $newBillet->id,
                'panier' => $newBillet->panier_id,
                'soiree' => $newBillet->soiree_id
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
