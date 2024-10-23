<?php

namespace nrv\core\services\auth;

use nrv\core\repositoryInterfaces\UtilisateurRepositoryInterface;
use nrv\core\dto\AuthDTO;
use InvalidArgumentException;
use nrv\core\domain\entities\utilisateur\Utilisateur;

class AuthService
{
    private UtilisateurRepositoryInterface $userRepository;

    public function __construct(UtilisateurRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function verifyCredentials(string $email, string $password): AuthDTO
    {
        $user = $this->userRepository->findByEmail($email);

        if (!$user || !password_verify($password, $user->getPassword())) {
            throw new InvalidArgumentException('Invalid credentials');
        }

        return new AuthDTO(
            $user->getId(),
            $user->getEmail(),
            $user->getRole(),
            '',
            ''  
        );
    }
}
