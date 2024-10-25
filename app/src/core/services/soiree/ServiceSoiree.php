<?php
namespace nrv\core\services\soiree;

use nrv\core\domain\entities\spectacle\Spectacle;
use nrv\core\dto\SoireeDTO;
use nrv\core\repositoryInterfaces\SoireeRepositoryInterface;
use nrv\core\services\soiree\ServiceSoireeInterface;
use nrv\core\services\soiree\ServiceSoireeNotFoundException;
use nrv\core\repositoryInterfaces\RepositoryEntityNotFoundException;
use nrv\core\repositoryInterfaces\SpectacleRepositoryInterface;

class ServiceSoiree implements ServiceSoireeInterface
{
    private SoireeRepositoryInterface $soireeRepository;
    private SpectacleRepositoryInterface $spectacleRepository;

    public function __construct(SoireeRepositoryInterface $soireeRepository, SpectacleRepositoryInterface $spectacleRepository)
    {
        $this->soireeRepository = $soireeRepository;
        $this->spectacleRepository = $spectacleRepository;
    }

    /**
     * Récupère une soirée par son id
     * 
     * @param string $id id de la soirée
     * @throws ServiceSoireeNotFoundException
     * @return SoireeDTO la soiree
     */
    public function getSoireeById(string $id): SoireeDTO
    {   
        try {
            return $this->soireeRepository->getSoireeById($id)->toDTO();
        } catch (RepositoryEntityNotFoundException $e) {
            throw new ServiceSoireeNotFoundException($e->getMessage());
        } catch (\Exception $e) {
            throw new \Exception("Erreur PDO lors de la récupération de la soirée : " . $e->getMessage());
        }
    }  
    
    /**
     * Récupère les spectacles d'une soirée
     * 
     * @param string $id identifiant de la soirée
     * @throws ServiceSoireeNotFoundException
     * @return SpectacleDTO[] les spectacles de la soirée
     */
    public function getSpectaclesBySoireeId(string $id): array
    {   
        try {
            $spectacles = $this->soireeRepository->getSpectaclesBySoireeId($id);

            return array_map(function ($spectacle) {
                $artistes = $this->spectacleRepository->getArtistes($spectacle->getID());
                return [
                    'self' => "/spectacles/{$spectacle->getID()}",
                    'titre' => $spectacle->getTitre(),
                    'description' => $spectacle->getDescription(),
                    'style' => $spectacle->getStyle(),
                    'horaire_prev' => $spectacle->getHorairePrev(),
                    'url_video' => $spectacle->getUrlVideo(),
                    'artistes' => $artistes
                ];
            }, $spectacles);
        } catch (\Exception $e) {
            throw new \Exception("Erreur PDO lors de la récupération des spectacles : " . $e->getMessage());
        }
    }

    
}
