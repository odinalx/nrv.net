<?php   

namespace nrv\core\repositoryInterfaces;

use nrv\core\domain\entities\spectacle\Spectacle;

interface SpectacleRepositoryInterface
{
    public function getSpectacleById(string $id): Spectacle;
}
