<?php

namespace nrv\core\repositoryInterfaces;

use nrv\core\domain\entities\lieu\Lieu;

interface LieuRepositoryInterface
{
    public function getLieuById(string $id): Lieu;
}
