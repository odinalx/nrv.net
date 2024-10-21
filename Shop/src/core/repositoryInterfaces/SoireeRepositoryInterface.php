<?php

namespace nrv\src\core\repositoryInterfaces;

use nrv\core\domain\entities\soiree\Soiree;

interface SoireeRepositoryInterface
{
    public function getSoireeById(int $id): ?Soiree; 
    public function getSpectaclesBySoireeId (int $soireeId): array; 
}
