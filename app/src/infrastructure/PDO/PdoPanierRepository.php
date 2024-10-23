<?php
namespace nrv\infrastructure\PDO;

use nrv\core\repositoryInterfaces\PanierRepositoryInterface;
use nrv\core\domain\entities\panier\Panier;
use PDO;

class PdoPanierRepository implements PanierRepositoryInterface
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    } 
    
    public function getPanierByUserId(string $userid): Panier {
        $query = "SELECT * FROM panier WHERE user_id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['id' => $userid]);
        $panier = $stmt->fetch();
        $panier = new Panier($panier['user_id']);
        $panier->setID($panier['panier_id']);
        return $panier;
    }

    public function createPanier(string $userid): Panier {       
        $query = "INSERT INTO panier (user_id) VALUES (:id) RETURNING panier_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['id' => $userid]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $panier = new Panier($userid);
        $panier->setID($result['panier_id']);
        return $panier;
    }

    public function panierExistant(string $userId): ?Panier {
        $stmt = $this->pdo->prepare("SELECT * FROM panier WHERE user_id = :user_id AND is_validated = FALSE");
        $stmt->execute(['user_id' => $userId]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($data) {
            $panier = new Panier($data['user_id'], $data['is_validated']);     
            $panier->setID($data['panier_id']);
            return $panier;
        }                
        return null;
    }       

    public function createCommande(string $userId, string $panierId, float $prixTotal, string $status): bool {
        $query = "INSERT INTO commande (user_id, panier_id, prix_total, status) VALUES (:user_id, :panier_id, :prix_total, 'pending') RETURNING commande_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            'user_id' => $userId,
            'panier_id' => $panierId,
            'prix_total' => $prixTotal
        ]);
        
        return $stmt->fetchColumn();
    }

    public function getUserByPanier(string $panierId): string {
        $query = "SELECT user_id FROM panier WHERE panier_id = :panier_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['panier_id' => $panierId]);
        
        return $stmt->fetchColumn();
    }    

    public function prixTotal(string $panierId): float {
        $query = "SELECT SUM(prix * quantite) FROM billet_panier WHERE panier_id = :panier_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['panier_id' => $panierId]);
        
        return (float) $stmt->fetchColumn() ?: 0;
    }

    public function validerPanier(string $panierId): bool {
        $stmt = $this->pdo->prepare("SELECT is_validated FROM panier WHERE panier_id = :panier_id");
        $stmt->execute(['panier_id' => $panierId]);
        $panierData = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($panierData && $panierData['is_validated']) {
            return false;
        }
    
        // Mettre à jour l'état du panier
        $this->updateStatusPanier($panierId);
    
        return true;
    }

    private function updateStatusPanier(string $panierId): void {
        $query = "UPDATE panier SET is_validated = TRUE WHERE panier_id = :panier_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['panier_id' => $panierId]);
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
