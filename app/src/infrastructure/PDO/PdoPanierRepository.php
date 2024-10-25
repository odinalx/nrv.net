<?php
namespace nrv\infrastructure\PDO;

use nrv\core\repositoryInterfaces\PanierRepositoryInterface;
use nrv\core\domain\entities\panier\Panier;
use nrv\core\repositoryInterfaces\RepositoryEntityInvalidDataException;
use nrv\core\repositoryInterfaces\RepositoryEntityNotFoundException;
use PDO;

class PdoPanierRepository implements PanierRepositoryInterface
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    } 
    
    public function getPanierById($panierId): Panier {
        try {
        $query = "SELECT * FROM panier WHERE panier_id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['id' => $panierId]);
        $panierData = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($panierData) {
            $panier = new Panier($panierData['user_id']);
            $panier->setID($panierId);
            $valide = (bool)$panierData['is_validated'];
            $panier->setValidated($valide);    
            return $panier;
        } else {
            throw new RepositoryEntityNotFoundException("Panier $panierId non trouvé.");
        }

        } catch (\Exception $e) {
            throw new \Exception("Erreur PDO lors de la récupération du panier. " . $e->getMessage());
        }
    }

    public function getPanierByUserId(string $userid): Panier {
        try {
            // TODO: Tester si l'utilisateur existe avant de procéder
            $query = "SELECT * FROM panier WHERE user_id = :id";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(['id' => $userid]);
            
            $panierData = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($panierData === false) {
                throw new RepositoryEntityNotFoundException("Pas de panier pour l'utilisateur avec l'ID $userid");
            }
            $panier = new Panier($panierData['user_id']);
            $panier->setID($panierData['panier_id']);
            
            return $panier;
    
        } catch (\PDOException $e) {
            throw new \Exception("Erreur PDO lors de la récupération du panier : " . $e->getMessage());
        }
    }
    

    public function createPanier(string $userid): Panier {    
        try {  
            $query = "INSERT INTO panier (user_id) VALUES (:id) RETURNING panier_id";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(['id' => $userid]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $panier = new Panier($userid);
            $panier->setID($result['panier_id']);
            return $panier;
        } catch (\PDOException $e) {
            throw new \Exception("Erreur PDO lors de la création du panier. " . $e->getMessage());
        }
    }

    public function panierExistant(string $userId): ?Panier {
        try{
            $stmt = $this->pdo->prepare("SELECT * FROM panier WHERE user_id = :user_id AND is_validated = FALSE");
            $stmt->execute(['user_id' => $userId]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
        
            if ($data) {
                $panier = new Panier($data['user_id'], $data['is_validated']);     
                $panier->setID($data['panier_id']);
                return $panier;
            }                
            return null;
        } catch (\PDOException $e) {
            throw new \Exception("Erreur PDO lors de la vérification de l'existence du panier. " . $e->getMessage());
        }
    }       

    public function createCommande(string $userId, string $panierId, float $prixTotal, string $status): string {
        try {

            if ($prixTotal <= 0) {
                throw new RepositoryEntityInvalidDataException("Le prix total doit être positif.");
            }
            $query = "INSERT INTO commande (user_id, panier_id, prix_total, status) VALUES (:user_id, :panier_id, :prix_total, :status) RETURNING commande_id";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([
                'user_id' => $userId,
                'panier_id' => $panierId,
                'prix_total' => $prixTotal,
                'status' => $status
            ]);

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result && isset($result['commande_id'])) {
                return $result['commande_id'];
            } else {
                throw new \Exception("Erreur lors de la création de la commande ou commande_id non retourné.");
            }

        } catch (\PDOException $e) {
            throw new \Exception("Erreur PDO lors de la création de la commande. " . $e->getMessage());
        }
    }

    public function getUserByPanier(string $panierId): string {
        try {
            $query = "SELECT user_id FROM panier WHERE panier_id = :panier_id";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(['panier_id' => $panierId]);
            
            $userId = $stmt->fetchColumn();

            if ($userId === false) {
                throw new RepositoryEntityNotFoundException("Aucun panier trouvé pour l'ID : $panierId");
            }

            return $userId;

        } catch (\PDOException $e) {
            throw new \Exception("Erreur PDO lors de la récupération de l'utilisateur associé au panier : " . $e->getMessage());
        }
    }
   

    public function prixTotal(string $panierId): float {
        try {
            $query = "SELECT SUM(prix * quantite) AS total FROM billet_panier WHERE panier_id = :panier_id";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(['panier_id' => $panierId]);
            
            $total = $stmt->fetchColumn();
    
            if ($total === false || $total === null) {
                throw new RepositoryEntityNotFoundException("Aucun billet trouvé pour le panier ID : $panierId, ou panier vide.");
            }
    
            return (float) $total;
    
        } catch (\PDOException $e) {
            throw new \Exception("Erreur PDO lors du calcul du prix total pour le panier : " . $e->getMessage());
        }
    }
    

    public function validerPanier(string $panierId): bool {
        try {
            $query = "UPDATE panier SET is_validated = TRUE WHERE panier_id = :panier_id";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(['panier_id' => $panierId]);
    
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }    
        } catch (\PDOException $e) {
            throw new \Exception("Erreur PDO lors de la validation du panier : " . $e->getMessage());
        }   
    }

    public function issetPanier(string $panierId): bool {
        $stmt = $this->pdo->prepare("SELECT * FROM panier WHERE panier_id = :panier_id");
        $stmt->execute(['panier_id' => $panierId]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if($data) {
            return true;
        }

        return false;
    }

    
    
    

}
