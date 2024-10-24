<?php
namespace nrv\core\services\soiree;

use nrv\core\domain\entities\soiree\Soiree;
use nrv\core\dto\SoireeDTO;
use nrv\core\repositoryInterfaces\SoireeRepositoryInterface;
use nrv\core\repositoryInterfaces\RepositoryEntityNotFoundException;
use nrv\core\services\soiree\ServiceSoireeInterface;

class ServiceSoiree implements ServiceSoireeInterface
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
    public function getSoireeById(string $id): SoireeDTO
    {
        return $this->soireeRepository->getSoireeById($id)->toDTO();
    }  
    
    public function getSpectaclesBySoireeId(string $id): array
    {
        $spectacles = $this->soireeRepository->getSpectaclesBySoireeId($id);

        return array_map(function ($spectacle) {
            return [
                'self' => "/spectacles/{$spectacle->getID()}",
                'titre' => $spectacle->getTitre(),
                'description' => $spectacle->getDescription(),
                'style' => $spectacle->getStyle(),
                'horaire_prev' => $spectacle->getHorairePrev(),
                'url_video' => $spectacle->getUrlVideo()
            ];
        }, $spectacles);
    }

    
}
