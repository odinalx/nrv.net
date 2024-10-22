<?php   

namespace nrv\src\core\repositoryInterfaces;

use nrv\core\domain\entities\spectacle\Spectacle;

interface SpectacleRepositoryInterface
{
    public function getAllSpectacles(): array; 
    public function getSpectacleById (int $id): ?Spectacle; 
}
