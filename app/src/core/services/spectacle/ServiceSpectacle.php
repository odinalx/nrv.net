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

    /**
     * Récupère un spectacle par son id
     * 
     * @param string $id identifiant du spectacle
     * @throws ServiceSpectacleNotFoundException
     * @return SpectacleDTO le spectacle
     */
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

    /**
     * Récupère tous les spectacles
     * 
     * @throws ServiceSpectacleNotFoundException
     * @return SpectacleDTO[] tableau des spectacles
     */
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

    /**
     * Récupère les images d'un spectacle
     * 
     * @param string $id identifiant du spectacle
     * @throws ServiceSpectacleNotFoundException
     * @return string[] tableau des images
     */
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
    
    /**
     * Récupère les artistes d'un spectacle
     * 
     * @param string $id identifiant du spectacle
     * @throws ServiceSpectacleNotFoundException
     * @return array tableau des artistes
     */
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
