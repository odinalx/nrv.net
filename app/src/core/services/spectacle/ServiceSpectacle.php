<?php
namespace nrv\core\services\spectacle;

use nrv\core\dto\SpectacleDTO;
use nrv\core\repositoryInterfaces\RepositoryEntityNotFoundException;
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
        try {
            return $this->spectacleRepository->getSpectacleById($id)->toDTO();
        } catch(RepositoryEntityNotFoundException $e) {
            throw new ServiceSpectacleNotFoundException($e->getMessage());
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function getSpectacles(): array
    {   try {
            $spectacles = $this->spectacleRepository->getSpectacles();
            $spectaclesDTO = [];
            foreach ($spectacles as $spectacle) {
                $spectaclesDTO[] = $spectacle->toDTO();
            }
            return $spectaclesDTO;
        } catch(RepositoryEntityNotFoundException $e) {
            throw new ServiceSpectacleNotFoundException($e->getMessage());
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function getImagesSpectacle(string $id): array
    {   try {
            $images = $this->spectacleRepository->getImagesSpectacle($id);
            return array_map(function ($image) {
                return $image['image']; 
            }, $images);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
    
    public function getArtistes(string $id): array
    {   try {
        $artistes = $this->spectacleRepository->getArtistes($id);
        return array_map(function ($artiste) {
            return [
                'nom' => $artiste['nom'],
                'prenom' => $artiste['prenom']
            ];
        }, $artistes);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
    
}
