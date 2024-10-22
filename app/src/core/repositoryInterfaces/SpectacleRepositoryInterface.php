<?php   

namespace nrv\core\repositoryInterfaces;

use nrv\core\domain\entities\spectacle\Spectacle;

interface SpectacleRepositoryInterface
{
    public function getSpectacleById(string $id): Spectacle;
    public function getSpectacles(): array;
    public function getImagesSpectacle(string $id): array;
}
