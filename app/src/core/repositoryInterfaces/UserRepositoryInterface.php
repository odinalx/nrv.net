<?php

namespace nrv\core\repositoryInterfaces;

use nrv\core\dto\AuthDTO;
use nrv\core\dto\CredentialsDTO;

interface UserRepositoryInterface {
    public function findByEmail(string $email): ?AuthDTO;
    public function save(CredentialsDTO $credentials, string $role, string $nom, string $prenom): void;
    public function findById(string $id): ?AuthDTO;
}