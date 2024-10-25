<?php

namespace nrv\application\actions;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use nrv\core\services\billet\ServiceBilletInterface;
use nrv\core\services\billet\ServiceBilletInvalidDataException;
use nrv\core\services\billet\ServiceBilletNotFoundException;
use nrv\application\renderer\JsonRenderer;

class AddBilletPanierAction extends AbstractAction
{
    private ServiceBilletInterface $serviceBillet;
    
    public function __construct(ServiceBilletInterface $serviceBillet) {
        $this->serviceBillet = $serviceBillet;
    }

    public function __invoke(ServerRequestInterface $rq, ResponseInterface $rs, array $args): ResponseInterface {
        try {
            $data = json_decode($rq->getBody()->getContents(), true);
            $panier_id = $args['id'];

            if (!isset($data['soiree_id'], $data['quantite'], $data['prix'])) {
                throw new ServiceBilletInvalidDataException("Des données sont manquantes");
            }

            $newBillet = $this->serviceBillet->ajouterBillet($panier_id, $data['soiree_id'], $data['quantite'], $data['prix']);
            
            $responseData = [
                'billet ajouté' => $newBillet,
                'panier' => $panier_id,
                'soiree' => $data['soiree_id'],
                'quantite' => $data['quantite'],
                'prix' => $data['prix']
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
