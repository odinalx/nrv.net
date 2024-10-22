<?php
namespace nrv\infrastructure\PDO;

use nrv\core\repositoryInterfaces\SpectacleRepositoryInterface;
use nrv\core\domain\entities\spectacle\Spectacle;
use PDO;

class PdoPraticienRepository implements SpectacleRepositoryInterface
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    } 
    
    public function getSpectacleById(string $id): Spectacle
    {
        $stmt = $this->pdo->prepare('SELECT * FROM spectacle WHERE id = :id');
        $stmt->execute(['id' => $id]);
        $spectacle = $stmt->fetchObject(Spectacle::class);
        if (!$spectacle) {
            throw new RepositoryEntityNotFoundException("Spectacle with ID {$id} not found.");
        }
        return $spectacle;
    }

}
