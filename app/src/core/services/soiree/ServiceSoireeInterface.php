<?php
namespace nrv\core\services\soiree;

use nrv\core\dto\SoireeDTO;

interface ServiceSoireeInterface
{
    public function getSoireeById(string $id): SoireeDTO;
    public function getSpectaclesBySoireeId(string $id): array;
}
