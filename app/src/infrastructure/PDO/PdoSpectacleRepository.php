<?php
namespace nrv\infrastructure\PDO;

use nrv\core\repositoryInterfaces\SpectacleRepositoryInterface;
use nrv\core\domain\entities\spectacle\Spectacle;
use nrv\core\repositoryInterfaces\RepositoryEntityNotFoundException;
use PDO;

class PdoSpectacleRepository implements SpectacleRepositoryInterface
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    } 
    
    public function getSpectacleById(string $id): Spectacle
    {   try {
            $query = "SELECT * FROM spectacle WHERE spectacle_id = :id";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(['id' => $id]);
            $spectacle = $stmt->fetch();
            if ($spectacle === false) {
                throw new RepositoryEntityNotFoundException("Spectacle $id non trouvé");
            }

            $spectacle = new Spectacle($spectacle['titre'], $spectacle['description'], $spectacle['style'], $spectacle['horaire_prev'], $spectacle['soiree_id'], $spectacle['url_video']);
            $spectacle->setID($id);
            return $spectacle;
        } catch (\PDOException $e) {
            throw new \Exception("Erreur PDO lors de la récupération du spectacle $id", $e->getMessage());
        }
    }

    public function getSpectacles(): array
    {
        try {
            $query = "SELECT * FROM spectacle";
            $stmt = $this->pdo->query($query);
            $spectacles = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($spectacles === false) {
                throw new RepositoryEntityNotFoundException("Aucun spectacle trouvé.");
            }

            $spectaclesEntities = [];
            foreach ($spectacles as $spectacle) {
                $spectacleEntity = new Spectacle(
                    $spectacle['titre'],
                    $spectacle['description'],
                    $spectacle['style'],
                    $spectacle['horaire_prev'],
                    $spectacle['soiree_id'],
                    $spectacle['url_video']
                );
                $spectacleEntity->setID($spectacle['spectacle_id']);
                $spectaclesEntities[] = $spectacleEntity;
            }

            return $spectaclesEntities;

        } catch (\PDOException $e) {
            throw new \Exception("Erreur PDO lors de la récupération des spectacles : " . $e->getMessage());
        }
    }


    public function getImagesSpectacle(string $id): array
    {   try {
            $query = "
                SELECT image
                FROM spectacleimage img
                INNER JOIN spectacle2spectacleimage spi ON img.spectacleimage_id = spi.spectacleimage_id
                WHERE spi.spectacle_id = :id
            ";    
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(['id' => $id]);
            $images = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $images;
        } catch (\PDOException $e) {
            throw new \Exception("Erreur PDO lors de la récupération des images du spectacle " . $e->getMessage());
        }
    }

    public function getArtistes(string $id): array
    {   try {
            $query = "
                SELECT nom,prenom
                FROM artiste a
                INNER JOIN spectacle2artiste sa ON a.artiste_id = sa.artiste_id
                WHERE sa.spectacle_id = :id
            ";    
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(['id' => $id]);
            $artistes = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $artistes;
        } catch (\PDOException $e) {
            throw new \Exception("Erreur PDO lors de la récupération des artistes du spectacle " . $e->getMessage());
        }
    }

}