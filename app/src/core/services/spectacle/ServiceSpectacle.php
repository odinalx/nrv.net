<?php
namespace nrv\core\services\spectacle;

use nrv\core\repositoryInterfaces\SpectacleRepositoryInterface;
use nrv\core\exceptions\RepositoryEntityNotFoundException;

class ServiceSpectacle implements ServiceRDVInterface
{
    private SpectacleRepositoryInterface $spectacleRepository;

    public function __construct(SpectacleRepositoryInterface $spectacleRepository)
    {
        $this->spectacleRepository = $spectacleRepository;
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
