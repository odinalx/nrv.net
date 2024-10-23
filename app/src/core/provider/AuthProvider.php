<?php

namespace nrv\core\provider;

use nrv\core\services\auth\AuthService;
use nrv\core\dto\AuthDTO;
use Firebase\JWT\JWT;
use DateTimeImmutable;

class AuthProvider
{
    private AuthService $authService;
    private string $jwtSecret;

    public function __construct(AuthService $authService, string $jwtSecret)
    {
        $this->authService = $authService;
        $this->jwtSecret = $jwtSecret;
    }

    public function signin(string $email, string $password): AuthDTO
    {
        $authDTO = $this->authService->verifyCredentials($email, $password);

        #TODO testear la vigencia de tokens
        $issuedAt = new DateTimeImmutable();
        $expire = $issuedAt->modify('+1 hour')->getTimestamp();
        $serverName = "nrv.com";

        $data = [
            'iat'  => $issuedAt->getTimestamp(),
            'iss'  => $serverName,
            'nbf'  => $issuedAt->getTimestamp(),
            'exp'  => $expire,
            'userId' => $authDTO->getId(),
            'role' => $authDTO->getRole(),
        ];

        $accessToken = JWT::encode($data, $this->jwtSecret, 'HS256');
        $refreshToken = JWT::encode($data, $this->jwtSecret, 'HS256');

        // Set tokens in DTO
        $authDTO->setAccessToken($accessToken);
        $authDTO->setRefreshToken($refreshToken);

        return $authDTO;
    }
}
