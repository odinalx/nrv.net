<?php

namespace nrv\core\repositoryInterfaces;

use nrv\core\domain\entities\soiree\Soiree;

interface SoireeRepositoryInterface
{
    public function getSoireeById(string $id): Soiree;
    public function getSpectaclesBySoireeId(string $id): array;
    public function decrementPlaces(string $soireeId, int $quantite): void;
}
