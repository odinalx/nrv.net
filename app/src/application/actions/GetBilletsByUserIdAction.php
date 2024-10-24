<?php

namespace nrv\application\actions;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use nrv\core\services\billet\ServiceBilletInterface;
use nrv\core\services\billet\ServiceBilletInvalidDataException;
use nrv\core\services\billet\ServiceBilletNotFoundException;
use nrv\application\renderer\JsonRenderer;
use nrv\core\services\soiree\ServiceSoireeInterface;

class GetBilletsByUserIdAction extends AbstractAction
{
    private ServiceBilletInterface $serviceBillet;
    private ServiceSoireeInterface $serviceSoiree;
    
    public function __construct(ServiceBilletInterface $serviceBillet, ServiceSoireeInterface $serviceSoiree) {
        $this->serviceBillet = $serviceBillet;
        $this->serviceSoiree = $serviceSoiree;
    }

    public function __invoke(ServerRequestInterface $rq, ResponseInterface $rs, array $args): ResponseInterface {
        try {
            $user_id = $args['id']; 
            
            $billetsDTO = $this->serviceBillet->getBilletsByUserId($user_id);           

            $responseData = [];
            foreach ($billetsDTO as $billet) {
                $soiree = $this->serviceSoiree->getSoireeById($billet->soiree_id);
                $responseData[] = [
                    'billet_id' => $billet->billet_id,
                    'soiree' => $soiree->nom,
                    'date' => $soiree->date->format('d-m-Y'),
                    'horaire' => $soiree->horaire_debut,
                    'commande_id' => $billet->commande_id,
                ];
            }            

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
