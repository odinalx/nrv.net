<?php
namespace app\providers;
use app\providers\JWTManager;
use app\providers\AuthProviderInterface;
use nrv\core\dto\CredentialsDTO;
use nrv\core\dto\AuthDTO;
use app\providers\Token;
use nrv\core\services\auth\AuthService;
use nrv\core\repositoryInterfaces\UserRepositoryInterface;

class JwtAuthProvider extends JWTManager implements AuthProviderInterface {
    private $authService;
    private $userRepository;
    

    public function __construct( AuthService $authService,
        UserRepositoryInterface $userRepository) {
        parent::__construct();
        $this->userRepository = $userRepository;
        $this->authService = $authService;
    }

    // Authentifie un utilisateur avec des credentials et retourne un DTO d'authentification
    public function signin(CredentialsDTO $credentials): AuthDTO {
        $user = $this->authService->authenticate($credentials);

        if (!$user) {
            throw new \Exception('Invalid credentials');
        }

        // Crée les tokens JWT
        $accessToken = $this->createAccessToken([
            'sub' => $user->id,
            'role' => $user->role,
            'email' => $user->email,
            'exp' => time() + 3600, // Access token valable 1 heure
        ]);

        $refreshToken = $this->createRefreshToken([
            'sub' => $user->id,
            'role' => $user->role,
            'email' => $user->email,
            'exp' => time() + 86400, // Refresh token valable 24 heures
        ]);

        return new AuthDTO(
            $user->getId(),
            $user->getEmail(),
            $user->getHashedPassword(),
            $user->getRole(),
            $accessToken,
            $refreshToken
        );
    }


    public function refresh(Token $token): AuthDTO {
        $decodedToken = $this->decodeToken($token->getToken());

        $userId = $decodedToken['sub'];
        $user = $this->authService->getUserById($userId);

        if (!$user) {
            throw new \Exception('Invalid token');
        }

        // Générer un nouveau Access Token
        $newAccessToken = $this->createAccessToken([
            'sub' => $user->id,
            'role' => $user->role,
            'email' => $user->email,
            'exp' => time() + 3600,
        ]);

        // Retourner un nouvel AuthDTO avec le nouveau token
        return new AuthDTO(
            $user->getId(),
            $user->getEmail(),
            $user->getHashedPassword(),
            $user->getRole(),
            $newAccessToken,
            $token->getValue()
        );
    }

    public function getSignedInUser(Token $token): AuthDTO {
        $decoded = $this->decodeToken($token->getToken());
        $user = $this->userRepository->findByEmail($decoded['email']);
        if ($user) {
            return new AuthDTO(
                $user->getId(),
                $user->getEmail(),
                $user->getHashedPassword(),
                $user->getRole(),
                $this->createAccessToken(['email' => $user->getEmail()]), 
                $token->getToken()
            );
        }
        throw new \Exception("User not found");
    }

}