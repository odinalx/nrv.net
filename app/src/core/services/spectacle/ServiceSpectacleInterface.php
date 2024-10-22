<?php
namespace nrv\core\services\spectacle;

use nrv\core\dto\SpectacleDTO;

interface ServiceRDVInterface
{
    public function getSpectacleById(string $id): SpectacleDTO;
}
