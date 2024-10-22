<?php
namespace nrv\core\services\spectacle;

use nrv\core\dto\SpectacleDTO;

interface ServiceSpectacleInterface
{
    public function getSpectacleById(string $id): SpectacleDTO;
    public function getSpectacles(): array;
    public function getImagesSpectacle(string $id): array;
}
