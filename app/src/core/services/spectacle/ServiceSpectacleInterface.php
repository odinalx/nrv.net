<?php
namespace nrv\core\services\spectacle;

use nrv\core\dto\SpectacleDTO;

interface ServiceSpectacleInterface
{
    public function getSpectacleById(string $id): SpectacleDTO;
}
