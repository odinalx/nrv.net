<?php
namespace nrv\core\services\auth;

use nrv\core\dto\AuthDTO;
use nrv\core\dto\CredentialsDTO;
use nrv\core\repositoryInterfaces\UserRepositoryInterface;
use nrv\core\services\auth\AuthenticationException;

class AuthService implements AuthServiceInterface
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function authenticate(CredentialsDTO $authDTO): AuthDTO
    {
        $user = $this->userRepository->findByEmail($authDTO->email);
        // il faut utiliser le password en clair et non le hash
        if (!$user || !password_verify($authDTO->password, $user->getHashedPassword())) {
            throw new AuthenticationException('Invalid credentials');
        }

        return new AuthDTO($user->getId(), $user->getEmail(), $user->getHashedPassword(), $user->getRole());
    }

    public function register(CredentialsDTO $credentials, string $role, string $nom, string $prenom): void
    {
        $this->userRepository->save($credentials, $role, $nom, $prenom);
    }

    public function findByEmail(string $email): ?AuthDTO
    {
        return $this->userRepository->findByEmail($email);
    }


    public function getUserById(string $id): AuthDTO
    {
        $user = $this->userRepository->findById($id);

        if (!$user) {
            throw new AuthenticationException('User not found');
        }

        return new AuthDTO($user->getId(), $user->getEmail(), $user->getHashedPassword(), $user->getRole());
    }
}