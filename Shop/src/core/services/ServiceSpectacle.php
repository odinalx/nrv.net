<?php
namespace nrv\src\core\services;

use nrv\core\domain\entities\spectacle\Spectacle;
use nrv\src\core\repositoryInterfaces\SpectacleRepositoryInterface;
use nrv\core\exceptions\RepositoryEntityNotFoundException;

class ServiceSpectacle implements spectacle
{
    private SpectacleRepositoryInterface $spectacleRepository;

    public function __construct(SpectacleRepositoryInterface $spectacleRepository)
    {
        $this->spectacleRepository = $spectacleRepository;
    }

    /**
     *
     * @return array
     */
    public function getAllSpectacles(): array
    {
        return $this->spectacleRepository->findAll();
    }

    /**
     *
     * @param int $id
     * @return Spectacle|null
     * @throws RepositoryEntityNotFoundException
     */

    public function getSpectacleById(int $id): Spectacle
    {
        $spectacle = $this->spectacleRepository->findById($id);
        if (!$spectacle) {
            throw new RepositoryEntityNotFoundException("Spectacle with ID {$id} not found.");
        }
        return $spectacle;
    }

    
}
