<?php

namespace nrv\application\actions;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use nrv\core\services\billet\ServiceBilletInterface;
use nrv\core\services\billet\ServiceBilletInvalidDataException;
use nrv\core\services\billet\ServiceBilletNotFoundException;
use nrv\application\renderer\JsonRenderer;
use nrv\core\services\auth\AuthService;
use nrv\core\services\auth\AuthServiceInterface;

class GetUserByIdAction extends AbstractAction
{
    private AuthServiceInterface $authService;
    
    public function __construct(AuthServiceInterface $authService) {
        $this->authService = $authService;
    }

    public function __invoke(ServerRequestInterface $rq, ResponseInterface $rs, array $args): ResponseInterface {
        try {
            $user_id = $args['id'];

            $user = $this->authService->getUserById($user_id);
            
            $responseData = [
                'id' => $user->getId(),
                'email' => $user->getEmail(),
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
