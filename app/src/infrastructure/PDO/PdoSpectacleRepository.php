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
    {
        $query = "SELECT * FROM spectacle WHERE spectacle_id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['id' => $id]);
        $spectacle = $stmt->fetch();
        // if ($spectacle === false) {
        //     throw new ServiceSpectacleNotFoundException("Spécialité $id non trouvée");
        // }

        $spectacle = new Spectacle($spectacle['titre'], $spectacle['description'], $spectacle['style'], $spectacle['horaire_prev'], $spectacle['soiree_id']);
        $spectacle->setID($id);
        return $spectacle;
    }

    public function getSpectacles(): array
    {
        $query = "SELECT * FROM spectacle";
        $stmt = $this->pdo->query($query);
        $spectacles = $stmt->fetchAll();
        $spectaclesEntities = [];
        foreach ($spectacles as $spectacle) {
            $spectacleEntity = new Spectacle($spectacle['titre'], $spectacle['description'], $spectacle['style'], $spectacle['horaire_prev'], $spectacle['soiree_id']);
            $spectacleEntity->setID($spectacle['spectacle_id']);
            $spectaclesEntities[] = $spectacleEntity;
        }
        return $spectaclesEntities;
    }

    public function getImagesSpectacle(string $id): array
{
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
}

}