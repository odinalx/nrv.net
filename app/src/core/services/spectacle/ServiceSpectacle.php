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
        //ToDO: Add try catch
        return $this->spectacleRepository->getSpectacleById($id)->toDTO();
    }

    public function getSpectacles(): array
    {
        $spectacles = $this->spectacleRepository->getSpectacles();
        $spectaclesDTO = [];
        foreach ($spectacles as $spectacle) {
            $spectaclesDTO[] = $spectacle->toDTO();
        }
        return $spectaclesDTO;
    }

    public function getImagesSpectacle(string $id): array
    {
        $images = $this->spectacleRepository->getImagesSpectacle($id);
        return array_map(function ($image) {
            return $image['image']; 
        }, $images);
    }
    
    public function getArtistes(string $id): array
    {
        $artistes = $this->spectacleRepository->getArtistes($id);
        return array_map(function ($artiste) {
            return [
                'nom' => $artiste['nom'],
                'prenom' => $artiste['prenom']
            ];
        }, $artistes);
    }
    
}
