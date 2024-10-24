<?php
namespace nrv\application\actions;

use nrv\application\actions\AbstractAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use app\providers\JwtAuthProvider;
use nrv\core\dto\CredentialsDTO;
use nrv\core\services\auth\AuthService;
use nrv\core\services\auth\AuthServiceInterface;

class AuthRegisterAction extends AbstractAction {
    private AuthServiceInterface $authService;

    public function __construct(AuthServiceInterface $authService) {
        $this->authService = $authService;
    }

    public function __invoke(Request $request, Response $response, array $args): Response {
        $data = $request->getParsedBody();

        if (!isset($data['email']) || !isset($data['password'])) {
            return $this->respondWithError($response, 'Email and password are required', 400);
        }

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            return $this->respondWithError($response, 'Invalid email format', 400);
        }

        if(!isset($data['role']) || !isset($data['nom']) || !isset($data['prenom'])) {
            return $this->respondWithError($response, 'Role, nom and prenom are required', 400);
        }

        try {
            $authDTO = new CredentialsDTO($data['email'], $data['password']);
            if ($this->authService->findByEmail($authDTO->email)) {
                return $this->respondWithError($response, 'Email already exists', 400);
            }
            $newUser = $this->authService->register($authDTO, $data['role'], $data['nom'], $data['prenom']);
            return $response->withStatus(201);
        } catch (\Exception $e) {
            return $this->respondWithError($response, 'Error : ' . $e, 401);
        }
    }

    private function respondWithError(Response $response, string $message, int $status): Response {
        $responseData = ['error' => $message];
        $response->getBody()->write(json_encode($responseData));
        return $response->withHeader('Content-Type', 'application/json')->withStatus($status);
    }
}