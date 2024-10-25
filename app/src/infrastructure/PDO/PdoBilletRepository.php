<?php
namespace nrv\infrastructure\PDO;

use nrv\core\repositoryInterfaces\BilletRepositoryInterface;
use nrv\core\domain\entities\billet\BilletPanier;
use nrv\core\domain\entities\billet\Billet;
use nrv\core\repositoryInterfaces\RepositoryEntityNotFoundException;
use nrv\core\repositoryInterfaces\RepositoryEntityInvalidDataException;
use PDO;

class PdoBilletRepository implements BilletRepositoryInterface
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    } 

    public function createBillet(string $commandeId, string $soireeId, int $quantite): array {
        try {
        $billets = [];
        $query = "INSERT INTO billet (commande_id, soiree_id) VALUES (:commande_id, :soiree_id)";
        $stmt = $this->pdo->prepare($query);        
        
            for ($i = 0; $i < $quantite; $i++) {
                $stmt->execute([
                    'commande_id' => $commandeId,
                    'soiree_id' => $soireeId
                ]);
            }
            // Si besoin d'afficher les billets qui viennent d'être créés
            // $billetId = $this->pdo->lastInsertId();
            // $billet = new Billet($commandeId, $soireeId);
            // $billet->setID($billetId);
    
            // $billets[] = $billet;
        } catch (\PDOException $e) {
            throw new \Exception("Erreur PDO lors de la création des billets.". $e->getMessage());
        }
    
        return $billets; 
    }
    
    
    public function getBilletsPanier(string $panierId): array {
        try {
            $query = "SELECT * FROM billet_panier WHERE panier_id = :panier_id";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(['panier_id' => $panierId]);
            $billets = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if(empty($billets)) {
                throw new RepositoryEntityNotFoundException("Aucun billet trouvé pour le panier ID : {$panierId}");
            }

            $billetsEntities = [];
            foreach ($billets as $billet) {
                $billetEntity = new BilletPanier($billet['panier_id'], $billet['soiree_id'], $billet['quantite'], $billet['prix']);
                $billetEntity->setID($billet['id']);
                $billetsEntities[] = $billetEntity;
            }        
            return $billetsEntities;
        } catch (\PDOException $e) {
            throw new \Exception("Erreur PDO lors de la récupération des billets.". $e->getMessage());
        }
    } 

    public function ajouterBillet(string $panierId, string $soireeId, int $quantite, float $prix): string {
        try {
            if ($quantite <= 0 || $prix < 0) {
                throw new RepositoryEntityInvalidDataException("Quantité et prix doivent être positifs.");
            }

            $query = "INSERT INTO billet_panier (panier_id, soiree_id, quantite, prix) VALUES (:panier_id, :soiree_id, :quantite, :prix) RETURNING id";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([
                'panier_id' => $panierId,
                'soiree_id' => $soireeId,
                'quantite' => $quantite,
                'prix' => $prix
            ]);

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result['id']; 

        } catch (\PDOException $e) {
            throw new \Exception("Erreur PDO lors de l'ajout du billet au panier.". $e->getMessage());       
        } 
    }

    public function supprimerBillet(string $billetId): BilletPanier
    {   
        try {
            $query = "DELETE FROM billet_panier WHERE id = :id RETURNING *";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(['id' => $billetId]);
            $billet = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($billet === false) {
                throw new RepositoryEntityNotFoundException("Le billet n'existe pas.");
            }

            $billetEntity = new BilletPanier($billet['panier_id'], $billet['soiree_id'], $billet['quantite'], $billet['prix']);
            $billetEntity->setID($billetId);
            return $billetEntity;
        } catch (\PDOException $e) {
            throw new \Exception("Erreur PDO lors de la suppression du billet.". $e->getMessage());
        }
    }

    public function getBilletsByUserId(string $userId): array {
        try {
            $query = "SELECT *
                    FROM billet b
                    JOIN commande c ON b.commande_id = c.commande_id
                    JOIN panier p ON c.panier_id = p.panier_id
                    JOIN utilisateur u ON p.user_id = u.user_id
                    WHERE u.user_id = :user_id";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(['user_id' => $userId]);
            $billets = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (empty($billets)) {
                throw new RepositoryEntityNotFoundException("Aucun billet trouvé pour l'utilisateur ID : {$userId}");
            }

            $billetsEntities = [];
            foreach ($billets as $billet) {
                $billetEntity = new Billet($billet['commande_id'], $billet['soiree_id']);
                $billetEntity->setID($billet['billet_id']);
                $billetsEntities[] = $billetEntity;
            }        
            return $billetsEntities;
        } catch (\PDOException $e) {
            throw new \Exception("Erreur PDO lors de la récupération des billets.". $e->getMessage());
        }
    }

            

}