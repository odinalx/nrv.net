<?php

namespace nrv\core\services\auth;

use nrv\core\dto\AuthDTO;
use nrv\core\dto\CredentialsDTO;
use nrv\core\repositoryInterfaces\UserRepositoryInterface;
use nrv\core\exceptions\AuthenticationException;

interface AuthServiceInterface
{
    public function authenticate(CredentialsDTO $authDTO): AuthDTO;
    public function register(CredentialsDTO $credentials, string $role, string $nom, string $prenom): void;
    public function findByEmail(string $email): ?AuthDTO;
}