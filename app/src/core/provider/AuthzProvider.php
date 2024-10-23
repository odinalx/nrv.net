<?php

namespace nrv\core\services\auth;

use nrv\core\dto\AuthDTO;

class AuthzService
{
    const ROLE_CLIENT = 10;
    const ROLE_ADMIN = 5;

    

    public function isPraticienOrAdmin(AuthDTO $authDTO): bool
    {
        return in_array($authDTO->getRole(), [self::ROLE_CLIENT, self::ROLE_ADMIN]);
    }

    public function canAccessPraticienProfile(AuthDTO $authDTO, string $praticienId): bool
    {
        return $authDTO->getRole() === self::ROLE_CLIENT && $authDTO->getId() === $praticienId;
    }
}
