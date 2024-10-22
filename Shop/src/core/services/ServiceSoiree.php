<?php
namespace nrv\scr\core\services;

use nrv\core\domain\entities\soiree\Soiree;
use nrv\core\repositoryInterfaces\SoireeRepositoryInterface;
use nrv\core\repositoryInterfaces\RepositoryEntityNotFoundException;

class ServiceSoiree
{
    private SoireeRepositoryInterface $soireeRepository;

    public function __construct(SoireeRepositoryInterface $soireeRepository)
    {
        $this->soireeRepository = $soireeRepository;
    }

    /**
     *
     * @param int $id
     * @return Soiree|null
     * @throws RepositoryEntityNotFoundException
     */
    public function getSoireeById(int $id): Soiree
    {
        $soiree = $this->soireeRepository->findById($id);
        if (!$soiree) {
            throw new RepositoryEntityNotFoundException("Soirée with ID {$id} not found.");
        }
        return $soiree;
    }

    /**
     *
     * @param int $soireeId
     * @return array
     */

    public function getSpectaclesBySoireeId(int $soireeId): array
    {
        return $this->soireeRepository->findSpectaclesBySoireeId($soireeId);
    }

    
}
