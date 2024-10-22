<?php

namespace nrv\core\repositoryInterfaces;

use nrv\core\domain\entities\soiree\Soiree;

interface SoireeRepositoryInterface
{
    public function getSoireeById(string $id): Soiree;
}
