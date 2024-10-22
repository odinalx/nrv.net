<?php
namespace nrv\core\services\spectacle;

use nrv\core\dto\SpectacleDTO;
use nrv\core\repositoryInterfaces\SpectacleRepositoryInterface;

class ServiceSpectacle implements ServiceSpectacleInterface
{
    private SpectacleRepositoryInterface $spectacleRepository;

    public function __construct(SpectacleRepositoryInterface $spectacleRepository)
    {
        $this->spectacleRepository = $spectacleRepository;
    }

    
    public function getSpectacleById(string $id): SpectacleDTO
    {
        return $this->spectacleRepository->getSpectacleById($id)->toDTO();
    }

    
}
