<?php
namespace nrv\infrastructure\PDO;


use nrv\core\domain\entities\soiree\Soiree;
use nrv\core\repositoryInterfaces\SoireeRepositoryInterface;
use nrv\core\domain\entities\spectacle\Spectacle;
use nrv\core\repositoryInterfaces\RepositoryEntityInvalidDataException;
use nrv\core\repositoryInterfaces\RepositoryEntityNotFoundException;
use PDO;

class PdoSoireeRepository implements SoireeRepositoryInterface
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    } 
    
    public function getSoireeById(string $id): Soiree
    {   try {
            $query = "SELECT * FROM soiree WHERE soiree_id = :id";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(['id' => $id]);
            $soiree = $stmt->fetch();

            if (!$soiree) {
                throw new RepositoryEntityNotFoundException("Soirée non trouvée.");
            }
            
            $date = new \DateTimeImmutable($soiree['date']);
            $soiree = new Soiree($soiree['nom'], $date, $soiree['theme'], $soiree['lieu_id'], $soiree['horaire_debut'], $soiree['tarif_normal'], $soiree['tarif_reduit']);
            $soiree->setID($id);
            return $soiree;
        } catch (\PDOException $e) {
            throw new \Exception("Erreur PDO lors de la récupération de la soirée : " . $e->getMessage());
        }
    }

    public function getSpectaclesBySoireeId(string $id): array
    {   try {
            $query = "SELECT * FROM spectacle WHERE soiree_id = :id";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(['id' => $id]);
            $spectacles = $stmt->fetchAll();
            $spectaclesEntities = [];
            foreach ($spectacles as $spectacle) {
                $spectacleEntity = new Spectacle($spectacle['titre'], $spectacle['description'], $spectacle['style'], $spectacle['horaire_prev'], $spectacle['soiree_id'], $spectacle['url_video']);
                $spectacleEntity->setID($spectacle['spectacle_id']);
                $spectaclesEntities[] = $spectacleEntity;
            }
            return $spectaclesEntities;
        } catch (\PDOException $e) {
            throw new \Exception("Erreur PDO lors de la récupération des spectacles : " . $e->getMessage());
        }
    }

    public function decrementPlaces(string $soireeId, int $quantite): void
    {   try {
            if ($quantite < 0) {
                throw new RepositoryEntityInvalidDataException("La quantité à décrémenter ne peut pas être négative.");
            }
            $query = "UPDATE soiree SET places_dispo = places_dispo - :quantite WHERE soiree_id = :soireeId";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(['quantite' => $quantite, 'soireeId' => $soireeId]);
        } catch (\PDOException $e) {
            throw new \Exception("Erreur PDO lors de la mise à jour des places disponibles : " . $e->getMessage());
        }
    }
    

}
